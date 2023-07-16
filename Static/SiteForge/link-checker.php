        <?php include ('includes/header.php'); ?>

        <div class="container wide-container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 column-login-full-height" id="side-column">
                    <!-- framework name-->
                    <h1 id="framework-name-header">ADIOS</h1>
                    <p>Link checker</p>
                    <hr>

                    <!-- table of contents -->
                    <form action="">
                        <label for="files">Choose a file:</label>
                        <select name="files" id="docs-files">
                            <?php
                            $repositoryRootURL = 'https://wai-blue.github.io/adios-docs/';
                            $staticPageRoot = '../../Documentation';
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
                                                echo '<optgroup label="' . $file . '">';
                                                listFiles($path, $indentation . " "); // Recursively call for subdirectories
                                                echo '</optgroup>';
                                            } else {
                                                // Link data
                                                // serves aj variable, that is later used to loading content
                                                $filePath = str_replace("../../", '', $path);

                                                //Link title
                                                $fileName = pathinfo($file, PATHINFO_FILENAME);

                                                // Display link to options
                                                echo '<option value="' . $filePath . '">' . $fileName . '</option>';
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
                        </select>
                    </form>

                    <div id="formContainer"></div>

                    <?php
                        // Process form
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            foreach ($_POST as $key => $value) {
                                // Extract the link ID from the input name
                                $linkId = substr($key, strpos($key, '-') + 1);
                                
                                // Process and echo the new link
                                echo "New link for $linkId: $value";
                                echo "<br>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <script>
        $(document).ready(function(){
            $('#docs-files').change(function(){
                var selectedValue = $('#docs-files').val();
                alert(selectedValue);

                const fileName = selectedValue;
                const rootURL = 'https://wai-blue.github.io/adios-docs/';
                let markdownPath = rootURL + fileName;

                if (fileName !== null) {
                    fetch(markdownPath)
                        .then(response => response.text())
                        .then(text => {
                            // [Getting started](#getting-started)
                            // [ Getting started ] ( #getting-started )
                            // \[
                            // uppercase and lowercase alphabetic characters, digits, underscores, or periods
                            // ([a-zA-Z0-9_\.]+)
                            // \]
                            // \(
                            // one or more characters except the closing parenthesis
                            // ([^\)]+)
                            // \)
                            // /g
                            const linkRegExp = /\[([^\]]+)\]\(([^)]+)\)/g;

                            const links = [];
                            let match;

                            //let result = 5;
                            // search for link in content until there is some text
                            //let result = text.match(linkRegExp);
                            //let result = linkRegExp.exec(text)[0];
                            while ((match = linkRegExp.exec(text)) !== null) {
                                // match[0] = whole link
                                // match[1] = link text
                                // match[2] = link url
                                // better to insert it this way, because whole match contains even more data.
                                const linkOriginal = match[0];
                                const linkText = match[1];
                                const linkURL = match[2];
                                links.push({ linkOriginal, linkText, linkURL });
                            }

                            //render form with found links
                            const formContainer = document.getElementById("formContainer");

                            // row containing link data and input for new link suggestion
                            const generateMiddleRow = (link) => `
                                <div class="row" style="margin-top: 2rem;">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        <p><b>Old link:</b> ${link.linkText}</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        <p><b>Old target:</b> ${link.linkURL}</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 col-xxl-10">
                                        <label for="link-${link.linkText}">New link:</label>
                                        <input list="links-${link.linkText}" name="link-${link.linkText}" id="link-${link.linkText}" style="width: 70%;">
                                        <datalist id="links-${link.linkText}">
                                            <option value="Script for generation of suggestions is coming soon...">
                                        </datalist> 
                                    </div>
                                </div>
                                `;

                            const generateForm = () => {
                                const formHTML = `
                                    <form action="link-checker.php" method="post" style="margin-top: 3rem;">
                                    <div class="container" style="padding: 0; margin: 0;">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        ${links.map(link => generateMiddleRow(link)).join("")}
                                        </div>
                                    </div>
                                    <input type="submit">
                                    </form>
                                `;

                                formContainer.innerHTML = formHTML;
                            };

                            generateForm();
                        })
                        .catch(error => {
                            alert("Something went wrong");
                        });
                }
            });
        });
        </script>

        <?php include ('includes/footer.php'); ?>
