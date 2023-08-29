<?php

/*
  - recursively scandir "Documentation"
  - pre kazdy .md vytvorit ekvivalent .html v peknom dizajne
  - zistit, ako pouzivat relativne URL v .md
*/
$documentationPath = __DIR__ . '/../Documentation';

require 'vendor/autoload.php';

function buildSidebarArrayRecursive(string $basePath) {
  $sidebarArray = [];

  if (is_dir($basePath)) {
    $items = scandir($basePath);

    foreach ($items as $item) {
      if ($item !== '.' && $item !== '..') {
        $path = $basePath . DIRECTORY_SEPARATOR . $item;

        if (is_file($path)) {
          $sidebarArray[] = $item;
        } elseif (is_dir($path)) {
          $subSidebar = buildSidebarArrayRecursive($path);
          $sidebarArray[$item] = $subSidebar;
        }
      }
    }
  }

  return $sidebarArray;
}

function buildSidebarHtmlRecursive(array $sidebarArray) {
  $html = "";

  foreach ($sidebarArray as $key => $value) {
    if (is_array($value)) {
      $html .= "<li class='dropdown'>";
      $html .= "
        <a 
          href='#$key' class='dropdown-toggle' data-toggle='dropdown'>
          {$key} <small style='float:right';padding-top:5px>﹀</small>
        </a>"
      ;
      $html .= "<ul class='dropdown-menu animated fadeInLeft' role='menu'>";
      $html .= buildSidebarHtmlRecursive($value); // Recursive call for subitems
      $html .= "</ul>";
      $html .= "</li>";
    } else {
      $html .= "<li><a href='#$value'>$value</a></li>";
    }
  }

  $html .= "";

  return $html;
}

function listFilesRecursively(string $documentationPath, int $depth = 0) {
  if (!is_dir($documentationPath)) {
    return ['files' => [], 'dirs' => []];
  }

  $results = [
    'files' => [],
    'dirs' => []
  ];

  $items = scandir($documentationPath);
  foreach ($items as $item) {
    if ($item !== '.' && $item !== '..') {
      $path = $documentationPath . DIRECTORY_SEPARATOR . $item;
      if (is_file($path)) {
        $results['files'][] = ['path' => $path, 'depth' => $depth];
      } elseif (is_dir($path)) {
        $results['dirs'][] = $path;
        $subResults = listFilesRecursively($path, $depth + 1);
        //var_dump($subResults['files']);
        $results['files'] = array_merge($results['files'], $subResults['files']);
        $results['dirs'] = array_merge($results['dirs'], $subResults['dirs']);
      }
    }
  }

  return $results;
}


function renderHtml(string $markdownPathToRender, string $sidebarsItemsHtml) {
  $parsedown = new Parsedown();

  $markdown = file_get_contents($markdownPathToRender);

  $mdHtml = $parsedown->text($markdown);

  $html = "
    <!DOCTYPE html>
    <html lang='en'>
      <head>
        <meta charset='UTF-8'>
        <title>ADIOS</title>
        <link rel='stylesheet' href='../scripts/assets/css/style.css'>
      </head>
      <body>
      <div id='wrapper'>
        <div class='overlay'></div>
        <nav class='navbar navbar-inverse fixed-top' id='sidebar-wrapper' role='navigation'>
          <ul class='nav sidebar-nav'>
            <div class='sidebar-header'>
              <div class='sidebar-brand'>
                <img class='logo-img' src='../scripts/assets/adios.jpeg' />
                <a href='#'>ADIOS</a>
              </div>
            </div>
            {$sidebarsItemsHtml}
          </ul>
        </nav>

        <div id='page-content-wrapper'>
          <button 
            type='button' 
            class='hamburger animated fadeInLeft is-closed' 
            data-toggle='offcanvas'
          >
            <span class='hamb-top'></span>
            <span class='hamb-middle'></span>
            <span class='hamb-bottom'></span>
          </button>

          <div class='container'>
            <div class='row'>
              <div class='col-lg-8 col-lg-offset-2'>
                {$mdHtml}
              </div>
            </div>
          </div>
        </div>
      </div>
      </body>
    </html>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var trigger = document.querySelector('.hamburger');
        var overlay = document.querySelector('.overlay');
        var isClosed = false;

        trigger.addEventListener('click', function () {
            hamburger_cross();
        });

        function hamburger_cross() {
          if (isClosed) {
            overlay.style.display = 'none';
            trigger.classList.remove('is-open');
            trigger.classList.add('is-closed');
            isClosed = false;
          } else {
            overlay.style.display = 'block';
            trigger.classList.remove('is-closed');
            trigger.classList.add('is-open');
            isClosed = true;
          }
        }


        var offcanvasToggle = document.querySelectorAll('[data-toggle=\'offcanvas\']');
        var wrapper = document.getElementById('wrapper');

        for (var i = 0; i < offcanvasToggle.length; i++) {
          offcanvasToggle[i].addEventListener('click', function () {
            wrapper.classList.toggle('toggled');
          });
        }

        var dropdown = document.getElementsByClassName('dropdown-toggle');
        var i;

        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener('click', function() {
            this.classList.toggle('active');
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === 'block') {
              dropdownContent.style.display = 'none';
            } else {
              dropdownContent.style.display = 'block';
            }
          });
        } 
      });  
    </script>
  ";

  $filePath = preg_replace('/\.md$/', '.html', $markdownPathToRender);
  $filePath = str_replace('Documentation', 'html', $filePath);
  
  if (!is_file($filePath)) {
    $directory = dirname($filePath);
    if (!is_dir($directory)) {
      mkdir($directory, 0777, true);
    }
  }

  file_put_contents("../html/index.html", $html);exit;
  file_put_contents($filePath, $html);exit;
}

$files = listFilesRecursively($documentationPath);

$sidebarItems = buildSidebarArrayRecursive($documentationPath);
$sidebarsItemsHtml = buildSidebarHtmlRecursive($sidebarItems);

foreach ($files['files'] as $file) {
  renderHtml($file['path'], $sidebarsItemsHtml);
}

