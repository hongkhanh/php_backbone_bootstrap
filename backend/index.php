<?php

// public/index.php

error_reporting(E_ALL);

class Application extends \Phalcon\Mvc\Application
{
    private static $modules;

    /**
     * Set application modules
     */
    public function __construct()
    {
        static::$modules = array(

            'user' => array(
                'className' => 'Camera\User\Module',
                'path' => __DIR__ . '/modules/user/Module.php'
            ),
            'cart' => array(
                'className' => 'Camera\Cart\Module',
                'path' => __DIR__ . '/modules/cart/Module.php'
            ),
            'camera' => array(
                'className' => 'Camera\Ticket\Module',
                'path' => __DIR__ . '/modules/ticket/Module.php'
            ),
        );
    }

    /**
     * Register the services here to make them general or register in
     * the ModuleDefinition to make them module-specific.
     */
    protected function _registerServices()
    {
        $loader = new \Phalcon\Loader();

        /**
         * register directories
         */

        $loader->registerDirs(
            array(
                __DIR__ . '/libraries/'
            )
        )->register();

        // Init a DI
        $di = new \Phalcon\DI\FactoryDefault();

        // Registering a router:
        $modules = self::$modules;
        $di['router'] = function() use ($modules) {

            $router = new \Phalcon\Mvc\Router();

            foreach ($modules as $moduleName => $module) {

                $router->add('#^/'.$moduleName.'(|/)$#', array(
                    'module' => $moduleName,
                    'controller' => 'index',
                    'action' => 'index',
                ));

                $router->add('#^/'.$moduleName.'/([a-zA-Z0-9\_]+)[/]{0,1}$#', array(
                    'module' => $moduleName,
                    'controller' => 1,
                ));

                $router->add('#^/'.$moduleName.'[/]{0,1}([a-zA-Z0-9\_]+)/([a-zA-Z0-9\_]+)(/.*)*$#', array(
                    'module' => $moduleName,
                    'controller' => 1,
                    'action' => 2,
                    'params' => 3,
                ));
            }

            return $router;
        };

        /**
         * The URL component is used to generate all kind of urls in the application
         */
        $di['url'] = function() {
            $url = new \Phalcon\Mvc\Url();
            $url->setBaseUri('/api');
            return $url;
        };

        /**
         * Start the session the first time some component request the session service
         */
        $di['session'] = function() {
            $session = new \Phalcon\Session\Adapter\Files();
            $session->start();
            return $session;
        };

        $this->setDI($di);
    }

    public function main()
    {
        try {
            $this->registerModules(self::$modules);
            $this->_registerServices();

            echo $this->handle()->getContent();

        } catch (Exception $e) {

            /*$logger = new \Phalcon\Logger\Adapter\File(__DIR__ . '/../logs/'.date('Y-m-d').'.log');
            $logger->log($e->getMessage(), \Phalcon\Logger::ERROR);

            // remove view contents from buffer
            ob_clean();

            $errorCode = 500;
            $errorView = 'errors/500.html';

            switch (true) {
                // 401 UNAUTHORIZED
                case $e->getCode() == 401:
                    $errorCode = 401;
                    $errorView = 'errors/401.html';
                    break;

                    // 403 FORBIDDEN
                case $e->getCode() == 403:
                    $errorCode = 403;
                    $errorView = 'errors/403.html';
                    break;

                    // 404 NOT FOUND
                case $e->getCode() == 404:
                case ($e instanceof Phalcon\Mvc\View\Exception):
                case ($e instanceof Phalcon\Mvc\Dispatcher\Exception):
                    $errorCode = 404;
                    $errorView = 'errors/404.html';
                    break;
            }

            // Get error view contents. Since we are including the view
            // file here you can use PHP and local vars inside the error view.
            ob_start();
            include_once $errorView;
            $contents = ob_get_contents();
            ob_end_clean();

            // send view to header
            $response = $this->getDI()->getShared('response');
            $response->resetHeaders()
                ->setStatusCode($errorCode, null)
                ->setContent($contents)
                ->send();
            */
            echo $e->getMessage();
        }
    }
}

// Run application:
$app = new Application();
$app->main();