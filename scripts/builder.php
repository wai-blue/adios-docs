<?php

/*
  - recursively scandir "Documentation"
  - pre kazdy .md vytvorit ekvivalent .html v peknom dizajne
  - zistit, ako pouzivat relativne URL v .md
*/
$documentationPath = __DIR__ . '/../Documentation';

require 'vendor/autoload.php';

function listFilesRecursively(string $documentationPath) {
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
        $results['files'][] = $path;
      } elseif (is_dir($path)) {
        $results['dirs'][] = $path;
        $subResults = listFilesRecursively($path);
        $results['files'] = array_merge($results['files'], $subResults['files']);
        $results['dirs'] = array_merge($results['dirs'], $subResults['dirs']);
      }
    }
  }

  return $results;
}

function renderHtml(string $markdownPathToRender) {
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
              <a href='#'>ADIOS docs</a></div></div>
            <li><a href='#home'>Home</a></li>
            <li><a href='#about'>About</a></li>
            <li><a href='#events'>Events</a></li>
            <li><a href='#team'>Team</a></li>
            <li class='dropdown'>
            <a href='#works' class='dropdown-toggle'  data-toggle='dropdown'>Works <span class='caret'></span></a>
          <ul class='dropdown-menu animated fadeInLeft' role='menu'>
          <div class='dropdown-header'>Dropdown heading</div>
          <li><a href='#pictures'>Pictures</a></li>
          <li><a href='#videos'>Videeos</a></li>
          <li><a href='#books'>Books</a></li>
          <li><a href='#art'>Art</a></li>
          <li><a href='#awards'>Awards</a></li>
          </ul>
          </li>
          <li><a href='#services'>Services</a></li>
          <li><a href='#contact'>Contact</a></li>
          <li><a href='#followme'>Follow me</a></li>
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
      });  
    </script>
  ";

  $filePath = preg_replace('/\.md$/', '.html', $markdownPathToRender);
  $filePath = str_replace('Documentation', 'html', $filePath);
  
  $directory = dirname($filePath);
  if (!is_dir($directory)) {
    mkdir($directory, 0777, true);
  }

  file_put_contents($filePath, $html);exit;
}

$files = listFilesRecursively($documentationPath);

foreach ($files['files'] as $file) {
  renderHtml($file);
}

