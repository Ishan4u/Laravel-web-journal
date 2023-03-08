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

# Scope Resolution Operator (::)
> It is used to access static methods, static properties, and constants of a class without creating an instance of the class.

*Here are some common uses of the double colon in PHP:*  
1. Accessing a static method of a class: `ClassName::staticMethodName()`
2. Accessing a static property of a class: `ClassName::$staticPropertyName`
3. Accessing a constant of a class: `ClassName::CONSTANT_NAME`

# HTTP request methods 
- GET
> This method is used to request a resource from a web server
- POST
> This method is used to submit data to be processed by a web server
- PUT
- DELETE
- PATCH

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

## Controller
*create controller*
```
php artisan make:controller ExamplerController
```

## View
blade = template engine  
> blade directive ` {{ }} `
- used for php dynammic flexiblity
- The {{ }} directive is used to print out the value of a variable or the result of an expression in the HTML code.


