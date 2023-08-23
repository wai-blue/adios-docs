#!/bin/bash

if [ -z "$1" ]; then
  echo "Provide a commit message."
  exit 1
fi

php "$(dirname "$0")/builder.php"
#git add .
#git commit -m "$1"
#git push