# Generate Form using command in Laravel + MySQL

## How to Run :
### git clone https://github.com/yogga/form-entry.git
### cd form-entry
### composer install
### php artisan key:generate
### cp .env.example .env
### php artisan migrate
### php artisan serve


### To generate form mahasiswa : 
php artisan generate:form mahasiswa

### To generate form tenaga_kerja : 
php artisan generate:form tenaga_kerja

## Output :
### Make file create.blade.php in resources/views/mahasiswa/create.blade.php
### Make file create.blade.php in resources/views/tenaga_kerja/create.blade.php


## Link :
http://localhost:8000/mahasiswa/create

http://localhost:8000/tenaga-kerja/create

http://localhost:8000/upload
