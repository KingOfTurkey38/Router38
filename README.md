# Router38
**PHP Routing made simple**.


**How to use?**
* First you have to **include** the Router.php in your file.
```php
include "src/kingofturkey38/router/Router.php";
```

* Then to make your code short and clean let's **use** the router file .
```php
use kingofturkey38\router\Router;
```

* After that you can add your routes.
```php
//Router::addRoute("/router38", closure(array $urlParams, string $route))

Router::addRoute(["/", "/test"], function (array $urlParams, string $route): void {
	echo "<br> <h1>called</h1>";
});

Router::addRoute("/router38", function (array $urlParams, string $route): void {
	echo "<br> <h1>called</h1>";
});
```
**As you can see the first parameter of Router::addRoute() can accept an array and a string, it supports to assign multiple routes to 1 callable**.

* Once you've added all your routes you **HAVE** to call **Router::init()**.
```php
Router::init();
```  

Full code example:
```php
//include the Router.php file
include "src/kingofturkey38/router/Router.php";

//use it so we can directly call Router inplace of \kingofturkey38\router\Router
use kingofturkey38\router\Router;

//add your routes
Router::addRoute(["/", "/test"], function (array $urlParams, string $route): void {
	echo "<br> <h1>called</h1>";
});

Router::addRoute("router38", function (array $urlParams, string $route): void {
	echo "<br> <h1>called</h1>";
});

//Once you've added the routes call Router::init()
Router::init();
```  
