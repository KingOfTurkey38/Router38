<?php

declare(strict_types=1);

namespace kingofturkey38\router;

use ReflectionFunction;

class Router {
	/** @var array<string, array<callable>> */
	private static $routes = [];

	public static function addRoute($routes, callable $callable): bool {
		$reflection = new ReflectionFunction($callable);
		if(count($reflection->getParameters()) >= 2) {
			$param = $reflection->getParameters()[0];
			if($param->isArray() || $param->isOptional()) {

				if(is_array($routes)) {
					foreach($routes as $route){
						self::$routes[$route][] = $callable;
						if($route[strlen($route) - 1] !== "/") {
							self::$routes[$route . "/"][] = $callable;
						}
					}
					return true;
				} elseif(is_string($routes)) {
					self::$routes[$routes][] = $callable;
					if($routes[strlen($routes) - 1] !== "/") {
						self::$routes[$routes . "/"][] = $callable;
					}
					return true;
				}

			}
		}

		return false;
	}

	public static function init(): void {
		$route = parse_url($_SERVER["REQUEST_URI"])["path"];
		$route = str_replace(basename(__FILE__), "", $route);
		$route = str_replace('//', '/', $route);

		Router::callRoute($route, $_GET);
	}

	public static function callRoute(string $route, array $params): bool {
		if(isset(self::$routes[$route])) {
			foreach(self::$routes[$route] as $callable){
				$callable($params, $route);
			}

			return true;
		}

		return false;
	}

	public static function removeRoute(string $route) {
		unset(self::$routes[$route]);
	}

	public static function getRoutes(): array {
		return self::$routes;
	}
}