@echo off

if "%1" == "" (
  echo Provide a commit message.
  goto end
)

php %~dp0builder.php
git add .
git commit -m %1
git push

:end