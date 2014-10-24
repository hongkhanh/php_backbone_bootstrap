<?php

//user/Module.php

namespace Camera\User;

use Phalcon\Loader,
	Phalcon\Mvc\View,
	Phalcon\Mvc\Dispatcher,
	Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
	Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{

	/**
	 * Registers the module auto-loader
	 */
	public function registerAutoloaders()
	{

		$loader = new Loader();

		$loader->registerNamespaces(array(
			'Camera\User\Controllers' => __DIR__ . '/controllers/',
			'Camera\User\Models' => __DIR__ . '/models/'
		));

		$loader->register();
	}

	/**
	 * Registers the module-only services
	 *
	 * @param Phalcon\DI $di
	 */
	public function registerServices($di)
	{

		/**
		 * Read configuration
		 */
		$config = include __DIR__ . "/config/config.php";

		$di['dispatcher'] = function() {
		    $dispatcher = new Dispatcher();
		    $dispatcher->setDefaultNamespace("Camera\User\Controllers");
		    return $dispatcher;
		};

		/**
		 * Setting up the view component
         */

		$di['view'] = function() {
			$view = new View();
			return $view;
		};

        /**
         * Setting up default response
         */
        $di['response'] = function() {
            $response = new \Phalcon\Http\Response();

            $content_type = 'application/json';
            $status = 200;
            $description = 'OK';
            $status_header = 'HTTP/1.1 ' . $status . ' ' . $description;
            $response->setRawHeader($status_header);
            $response->setStatusCode($status, $description);
            $response->setContentType($content_type, 'UTF-8');
            $response->setHeader('Access-Control-Allow-Origin', '*');
            $response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With');
            $response->setHeader('Access-Control-Allow-Headers', 'Authorization');
            $response->setHeader('Content-type:', $content_type);
            $response->sendHeaders();

            return $response;
        };


		/**
		 * Database connection is created based in the parameters defined in the configuration file
		 */
		$di['db'] = function() use ($config) {
			return new DbAdapter(array(
				"host" => $config->database->host,
				"username" => $config->database->username,
				"password" => $config->database->password,
				"dbname" => $config->database->dbname
			));
		};

	}

}