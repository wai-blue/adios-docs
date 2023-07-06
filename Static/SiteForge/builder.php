<?php
ob_start(); // Start output buffering
?>
      <?php include ('includes/header.php'); ?>

      <div class="container wide-container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-3 col-xxl-3 column-login-full-height" id="side-column">
            <!-- framework name-->
            <h1 id="framework-name-header">ADIOS</h1>
            <hr>

            <!-- table of contents -->
            <ul class="layer" style="--custom-padding: 0rem;">
              <?php
                $repositoryRootURL = 'https://wai-blue.github.io/adios-docs/';
                $staticPageRoot = '../../Documentation';
                $notNeccessaryToOpenFolders = array("Assets");

                function listFiles($directory, $indentation = "") {
                  global $repositoryRootURL;
                  global $staticPageRoot;
                  global $notNeccessaryToOpenFolders;

                  // can't open directory or there isn't any with that name
                  if (!is_dir($directory)) {
                    echo "Invalid directory: $directory";
                    return;
                  }

                  // Extract the directory name from the path
                  $dirName = basename($directory);

                  if (!in_array($dirName, $notNeccessaryToOpenFolders)) {
                    $explodedPath = explode('/', $staticPageRoot);
                    $lastFolderName = end($explodedPath);

                    if ($lastFolderName !== $dirName) {
                      //Directory name
                      //Serves as a chapter heading
                      echo '<ul class="layer" style="--custom-padding: 0rem;">';
                      echo '     <li>' . $dirName . '</li>';
                      echo '     <ul class="layer" style="--custom-padding: 2rem;">';
                    }

                    $files = scandir($directory);
                    foreach ($files as $file) {
                      if ($file === '.' || $file === '..') {
                        continue;
                      }

                      $path = $directory . '/' . $file;

                      if (is_dir($path)) {
                        listFiles($path, $indentation . " "); // Recursively call for subdirectories
                      } else {
                        // Link data
                        // serves aj variable, that is later used to loading content
                        $filePath = str_replace("../../", '', $path);

                        //Link title
                        $fileName = pathinfo($file, PATHINFO_FILENAME);

                        // Display link to markdown content
                        echo '     <li onclick="redirectTo(\'' . $filePath . '\')">' . $fileName . '</li>';
                      }
                    }

                    echo "     </ul>";
                    echo "</ul>";
                  }
                }

                // Usage:
                $rootDirectoryPath = $staticPageRoot;
                listFiles($rootDirectoryPath);
              ?>
            </ul>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-9 col-xxl-9 column-login-full-height" id="conntent-column">
            <div id="renderer"></div>
          </div>
        </div>
      </div>

      <script src="resources/js/builder-script.js"></script> 

      <?php include ('includes/footer.php'); ?>

<?php

function copyFolder($src, $dst) { 
  
    // open the source directory
    $dir = opendir($src); 
  
    // Make the destination directory if not exist with suppressed warnings
    @mkdir($dst); 
  
    // Loop through the files in source directory
    while( $file = readdir($dir) ) { 
  
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) 
            { 
  
                // Recursively calling copyFolder function
                copyFolder($src . '/' . $file, $dst . '/' . $file); 
  
            } 
            else { 
                copy($src . '/' . $file, $dst . '/' . $file); 
            } 
        } 
    } 
  
    closedir($dir);
} 
  
$src = "resources";
  
$dst = "../resources";
  
copyFolder($src, $dst);

$output = ob_get_clean();

$file = '../index.html';
file_put_contents($file, $output);
?>
