# learning-Laravel

# Run php
`php tes.php`

# CONCATENATE (.)
> The word CONCATENATE means to join or combine
```
<?php

$name = "ishan";
echo 'My name is ' . $name . " that is truth. ";
```
# Vs code
`ctrl + ,` = setting

# Run on browser (testing)
`php -S localhost:8000`

# Composer
> same like npm in nodejs
> - A Dependency Manager for PHP
> - pull all over dependencies  

*install:*  
```
brew install composer
```  

## use composer
`composer require cocur/slugify`  

> Reference  
[autoloading & Namespaces in PHP](https://www.daggerhartlab.com/autoloading-namespaces-in-php/)

# object operator (->)
> It is used to access methods and properties of an object.
> - In object-oriented programming, objects are instances of a class, which is a blueprint or a template for creating objects. When you create an object from a class, you can access its properties (variables) and methods (functions) using the object operator "->".
> - same as dot(.)

# Laravel
> Create project:  
> `composer create-project AuthorName/nameOftheProject nameOFfolder`

*Ex syntex:*
```
composer create-project laravel/laravel ourfirstapp
```
---  
> start a local development server :
```
php artisan serve
```  

