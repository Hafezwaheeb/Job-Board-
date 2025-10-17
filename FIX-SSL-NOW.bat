@echo off
echo ========================================
echo SSL FIX FOR LARAVEL HERD
echo ========================================
echo.
echo Step 1: Download cacert.pem
echo Open browser and go to: https://curl.se/ca/cacert.pem
echo Save file to: C:\Users\L\.config\herd\bin\php84\cacert.pem
echo.
pause
echo.
echo Step 2: Adding SSL config to php.ini...
echo curl.cainfo = "C:\Users\L\.config\herd\bin\php84\cacert.pem" >> "C:\Users\L\.config\herd\bin\php84\php.ini"
echo 1
echo.
echo Done! Now restart Herd and try: composer require tymon/jwt-auth
echo.
pause
