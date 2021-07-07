# Simple parking app
simple parking app with laravel and lumen as REST API

## Install Laravel As Client/ Frontend / Interface<br>
1.cd laravel<br>
2.composer install<br>
3.cp .env-example .env<br>
5.php key:generate<br>
6.php artisan serve --port=8000<br>


## Install Lumen As REST API<br>
1.cd lumen<br>
2.composer install<br>
3.cp .env-example .env<br>
4.sesuikan konfigurasi database<br>
5.php key:generate<br>
6.php artisan migrate
7.php artisan serve --port=9000<br>

## Requiretment
1.php versi 7.4 with laravel/ lument requretment extension default<br>
2.database Mysql/ Mariadb<br>

## Todo
1.membuat konfigurasi docker untuk menjalankan 2 project ini secara bersamaan dengan perintah docker compose-up.<br>
2.memastikan codebase laravel bisa di akses menggunakan port 8000 ( expose port ) dari luar container.<br>
2.memastikan codebase laravel bisa di akses menggunakan port 9000 ( expose port ) dari luar container.<br>
3.memastikan laravel bisa mengconsume API dari lument yang berbeda container<br>
