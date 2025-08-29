@echo off
:loop
php "E:\laragon\www\E-DEV\artisan" schedule:run
timeout /t 60
goto loop
