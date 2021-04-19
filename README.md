Test apirest en laravel


Instalación
Luego de clonar
* ejecutar el comando composer install dentro del proyecto
* configurar en  el archivo .env los datos/credenciales de la base de datos
* ejecutar las migraciones con el comando php artisan migrate
* cargamos alguns datos iniciales php artisan db:seed (opcional)
* iniciar la app con el comando php artisan serve
los endpoints deberian estar en http://127.0.0.1:8000/api

Probar los test
Dentro del proyecto ejecutar el comando vendor/bin/phpunit


Nota
Algunas excepciones/errores esta en Handler.php
Algunas validaciones en UserStoreRequest UserUpdateRequest

