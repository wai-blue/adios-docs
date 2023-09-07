#!/bin/bash

# 1.
# Generate source code using the ADIOS Prototype Builder
# based on the index.yml prototype definition
# The source code will be generated in the same directory
# in which this script will be launched.

# IMPORTANT: Review the arguments and modify them to fit
# your environment.

php ./vendor/wai-blue/adios/src/CLI/build-prototype.php \
  --salt adios-docs-examples \
  --input ./prototype-builder-yaml/index.yml \
  --rewrite-base /adios-docs-examples/ \
  --root-url http://localhost/adios-docs-examples \
  --output-folder . \
  --db-host localhost \
  --db-port 3306 \
  --db-user root \
  --db-name adios_docs_examples \
  --admin-password admin \

# 2.
# Install the default database structures and data
# after the application's source code is generated.

php ./install.php

# 3.
# Follow the instructions shown by the install.php script