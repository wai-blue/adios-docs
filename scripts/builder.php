<?php

/*
  - recursively scandir "Documentation"
  - pre kazdy .md vytvorit ekvivalent .html v peknom dizajne
  - zistit, ako pouzivat relativne URL v .md
*/

file_put_contents(__DIR__ . '/../html/index.html', 'Toto je akoze staticka stranka. ' . date('Y-m-d H:i:s'));