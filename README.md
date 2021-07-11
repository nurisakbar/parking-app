# Simple parking app
simple parking app with laravel and lumen as REST API

# Simple Running dengan docker
1.git clone https://github.com/nurisakbar/parking-app.git<br>
2.cd parking-app/images/php/laravel && composer install && php artisan key:generate
3.cd parking-app/images/php/lumen && composer install && php artisan key:generate
4.cd parking-app && docker-compose up -d build<br>



CLient : http://localhost:9090/ <br>
REST API : http://localhost:8080/

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