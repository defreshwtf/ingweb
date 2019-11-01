# Instalacion y configuracion de componentes requeridos por el proyecto



## Instalacion de Composer

### Descargar e instalar Composer
> ir al siguiente [enlace](https://getcomposer.org/download/)


## Instalacion de NodeJS

### Descargar e instalar NodeJS
> descargar el archivo de instalacion desde [aqui](https://nodejs.org/es/download/)


## Dependencias del proyecto

### Agregar sistema de autenticacion de Laravel 
> composer require laravel/ui
> php artisan ui vue --auth

### Dependencias de NodeJS
> npm install




*** importante ***
el proyecto por el momento esta pensado en funcionar en un servidor local, por ello se tiene que realizar los siguientes pasos para la creacion de la base de datos del proyecto

> crear una base de datos

> editar el archivo _.env_ del proyecto para la conexion de la base de datos

>> DB_CONNECTION=mysql
>> DB_HOST=127.0.0.1
>> DB_PORT=3306
>> DB_DATABASE=nameDB
>> DB_USERNAME=usernameDB
>> DB_PASSWORD=passsword