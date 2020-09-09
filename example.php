<?php

//include the Router.php file
include "src/kingofturkey38/router/Router.php";

//use it so we can directly call Router inplace of \kingofturkey38\router\Router
use kingofturkey38\router\Router;

//Router::addRoute(array | string, closure(array $urlParams, string $route))
Router::addRoute(["/", "/test"], function (array $params, string $route): void {
	echo "<br> <h1>called</h1>";
});

//Once you've added the routes call Router::init()
Router::init();

?>


<!DOCTYPE html>
<html>
<body>
</body>
</html>