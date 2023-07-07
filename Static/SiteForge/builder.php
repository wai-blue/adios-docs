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
                //$staticPageRoot = '../Source';
                $notNeccessaryToOpenFolders = array("Assets");

                function listFiles($directory, $indentation = "") {
                  global $repositoryRootURL;
                  global $staticPageRoot;
                  global $notNeccessaryToOpenFolders;

                  if (is_dir($directory)) {
                    $handle = opendir($directory);
                    
                    if ($handle !== false) {
                    // Directory is valid and successfully opened
                    closedir($handle);
                      // folder opened successfully
                      $files = scandir($directory);

                      //foreach of all files and folders from $files
                      foreach ($files as $file) {
                        // skip special entries
                        if ($file === '.' || $file === '..') {
                          continue;
                        }

                        // check file or directory
                        if (!in_array($file, $notNeccessaryToOpenFolders)) {
                          $path = $directory . '/' . $file;

                          if (is_dir($path)) {
                            echo '<ul class="layer" style="--custom-padding: 0rem;">';
                            echo '<li>' . "# " . $file . '</li>';
                            echo '<ul class="layer" style="--custom-padding: 2rem;">';
                            listFiles($path, $indentation . " "); // Recursively call for subdirectories
                            echo "     </ul>";
                            echo "</ul>";
                          } else {
                            // Link data
                            // serves aj variable, that is later used to loading content
                            $filePath = str_replace("../../", '', $path);

                            //Link title
                            $fileName = pathinfo($file, PATHINFO_FILENAME);

                            // Display link to markdown content
                            echo '<li onclick="redirectTo(\'' . $filePath . '\')">' . $fileName . '</li>';
                          }
                        }
                      }
                    } else {
                      echo "Failed to open the directory.";
                    }
                  } else {
                    echo "Directory does not exist.";
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

// Outout html version of static page
$output = ob_get_clean();

$file = '../index.html';
file_put_contents($file, $output);
?>
