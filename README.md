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
- `ctrl + ,` = setting  
- `ctrl + p` =easily navigate files  
- install extension `php namespace resolver`

# Run php on browser (testing)
command:  
`php -S localhost:8000`

# Composer
- same like npm in nodejs
- A Dependency Manager for PHP
- pull all over dependencies  

install:  
```
brew install composer
```  

use composer: 
`composer require cocur/slugify`  

> Reference  
[autoloading & Namespaces in PHP](https://www.daggerhartlab.com/autoloading-namespaces-in-php/)

# object operator (->)
 It is used to access methods and properties of an object.
 - In object-oriented programming, objects are instances of a class, which is a blueprint or a template for creating objects. When you create an object from a class, you can access its properties (variables) and methods (functions) using the object operator "->".
 - same as dot(.)

# Scope Resolution Operator (::)
- It is used to access static methods, static properties, and constants of a class without creating an instance of the class.

*Here are some common uses of the double colon in PHP:*  
1. Accessing a static method of a class: `ClassName::staticMethodName()`
2. Accessing a static property of a class: `ClassName::$staticPropertyName`
3. Accessing a constant of a class: `ClassName::CONSTANT_NAME`

# HTTP request methods 
- GET : *This method is used to request a resource from a web server*
- POST: *This method is used to submit data to be processed by a web server*
- PUT
- DELETE
- PATCH

# Laravel
Create project:  
`composer create-project AuthorName/nameOftheProject nameOFfolder`

*Example syntex:*
```
composer create-project laravel/laravel ourfirstapp
```
---  
## start a local development server
*Terminal command :*
```
php artisan serve
```  

## Controller
*create controller command :*
```
php artisan make:controller ExamplerController
```

## View
- blade = template engine  
#learnmore

### blade directive ` {{ }} `
---
- used for php dynammic flexiblity
- The {{ }} directive is used to print out the value of a variable or the result of an expression in the HTML code.  

### blade directive `@`
- *several Blade directives that start with* "@" symbol
1. `@if, @elseif, and @else`: Used to conditionally display content based on a given condition.

2. `@foreach`: Used to loop over an array or collection of data and output the values.

3. `@switch and @case`: Used to implement switch-case logic in your templates.

4. `@include`: Used to include a sub-view within your main view.

5. `@extends`: Used to define a template that can be extended by other views.

6. `@yield`: Used to define a section in a template that can be replaced by a child view.

7. `@section and @endsection`: Used to define a named section in a view that can be used in a parent template with the @yield directive.

### Adding css 
---
- past css file to public folder

- Str::markdown();   
     #learnmore 

# Database

## Create databse
---
*command:*
```
php artisan migrate
```
## update table  
---  
### 1. drop all the table and recreate freshly   

 *command :*
```
php artisan migrate:fresh
```  

### 2. without losing table data modify table
- create new migration file  

*command:*
```
php artisan make:migration add_favorite_color_column
```

## Create Controller 
--- 
*terminal command:*
```
php artisan make:controller userController
```
*file loclation:*  
 [app/Http/Controllers/userController.php] 
 
---
## constrained();
- intergrity check  
#learnmore
---

## onDelete();  
#learnmore 

---
## {!! !!}  
#learnmore

---

## strip_tags(a,b);  
```
strip_tags(Str::markdown($post->body), '<p><ul><ol><li><strong><em><h3><br>
```
>#learnmore

---
##  belongsTo(a, b);
- a = the class blog post belongsto
- b = collumn name poweredby
> #learnmore

---
## Rule::unique(a,b)
- a = table in the database
- b = field or collumn
---
## $request->session()->regenerate();
> #learnmore
---
## auth()->user()->username
- this showing logged user name

## csrf
- CSRF (Cross-Site Request Forgery) is a type of security vulnerability that occurs when a malicious actor tricks a user into performing an action on a website without their knowledge or consent. This is usually achieved by sending a request to a website that the user is currently logged into, using the user's existing session cookie.

- To prevent CSRF attacks, web developers can implement several measures, including:

    1. Implementing CSRF tokens: A unique token is generated for each user session and included in the HTML form or request. When the form is submitted or the request is made, the server verifies that the token is correct before executing the action.

    2. Implementing SameSite cookies: SameSite cookies restrict the cookies to being sent only to the same domain as the website that set the cookie. This can prevent CSRF attacks from external websites.

    3. Using HTTP headers: The CSRF token can also be included in the HTTP header of the request, rather than in the HTML form.

    4. Ensuring secure coding practices: Developers should ensure that their code is secure, and avoid any vulnerabilities that could be exploited by attackers.

By implementing these measures, developers can greatly reduce the risk of CSRF attacks and ensure the security of their users' data.

---
## with(a,b)
- a = type of message
- b = actual text user see
---
## session()
> #learnmore
---
## has()
> #learnmore

---
## hasmany(a, b);
- a = postclass
- b = collumn name in database powering the relationship  
*code:*
```
```

## format('n/j/Y');
> #learnmore
---
# middleware
## create middleware  
*terminal:* 
```
php artisan make:middleware MustBeLoggedIn
```
---
# Policy
- In Laravel, a policy is a class that specifies authorization rules for a model or resource to determine whether an authenticated user is authorized to perform a specific action on it.

## create a new policy for the "Post" model:
```terminal

php artisan make:policy PostPolicy --model=post
```

# $imgData = Image::make($request->file('avatar'))->fit(120)->encode('jpg');
> #learnmore
        

# Storage::put(a,b);
> #learnmore

# ternary operator 
- (condition) ? value_if_true : value_if_false;
- For example:
```
$age = 25;
$is_old_enough = ($age >= 18) ? "Yes" : "No";
echo $is_old_enough;
```

# migration follow table
```php
public function up(): void
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('followeduser');
            $table->foreign('followeduser')->references('id')->on('users');
            $table->timestamps();
        });
    }
```


# Create blog post Steps:
1. Go Routes file (web.php)
- create Route
2. Create Controller (PostController)
```
php artisan make:controller PostController
```
3. Create function (showCreateForm)
4. Create Views
- create-post.blade.php
5. Make Database  

# User Profile Steps
1. Routes file (web.php)  
    > 1. Create Route
    > - Go to routes (web.php)
    ```
    Route::get('/profile/{ishan}', [userController::class, 'profile']);
    ```
    > get(a, b);
    > - a = url
    > - b = function   
    ---   
    2. Controllers file   
    > 1. Create Function 
    > -  Go to UserController.php (Controllers)  

    *profile*
    ```
    public function profile() {
        return view('profile-posts');
    }
    ```  
    ---  
    3. views file
    > 1. Create new file  
    > - profile-posts.blade.php  
    ---
    4. Models file  
    > 1. Create function




*define*
```
php artisan make:migration create_posts_table
```
*Excute and create databse*
```
php artisan migrate
```

# Gate::define(a,b)
#learnmore


# Stop following user
1. UserController.php
- 
2. profile-posts.blade.php

# Commit References
> Conect html frontend form to Database Step2  
- intro about validate
- intro about Models
