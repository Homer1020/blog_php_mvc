# MVC blog with PHP, MYSQL and MVC architecture
Simple system that implements the MVC architecture using vanilla PHP. This repository implements the AdminLTE template with plugins like SweetAlert2 and DataTables. The repository offers a scalable code following a clean and easy to extend architecture being an excellent starting point to create amazing web systems.
> Requirements:
> - PHP 8
> - Composer
> - MySQL
##  Plugins and dependencies
 1. Bramus Router
 2. AdminLTE
 3. DataTables
 4. SweetAlert
## Setup
**Clone the repository**
```
git clone https://github.com/Homer1020/blog_php_mvc.git
```
**Install dependencies**
```
composer install
```
**Set enviroments**

Create an **.env** file inside at the root path
``` shell
# DATABASE
DB_HOST=localhost
DB_NAME=citas_mvc
DB_USER=root
DB_PASSWORD=
DB_CHARSET=utf8mb4
```
**Config the project in config.php file**
```php
# config.php

define('base_url', $yourHOST); // if you are using xampp $yourHOST must be http://citas_mvc/
```
## Run the App
Make sure Apache and MySQL are running and find the http://localhost/citas_mvc in your web browser if you are using WAMP or XAMPP.

Enjoy!!