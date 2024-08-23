<?php

use Shop\Customer\Order;
use Request\Get;
use Request\Post;
use Request\Server;
use Routing\Route;

class Main {
    private Get $get;

    private Post $post;

    private Server $server;

    private Route $route;

    public function main() : void
    {
        echo "Run Successful \n\n";
        $this->init();

        $namespace = $this->route->getParentPath();
        $base = $this->route->getBase();

        if ($base) {
            $class = 'Controllers\\' . implode('\\', $namespace) . '\\' . $base[0];

            $object = new $class();

            if ($this->server->isGet ()) {
                echo $object->getRequest($this->get);
            } elseif ($this->server->isPst ()) {
                echo $object->postRequest($this->post);
            }
        }
    }

    private function init() : void
    {
        spl_autoload_register(function ($class) {
            $file = __DIR__ . "/" . str_replace('\\', '/', $class) . ".php";

            if (file_exists($file)) {
                include ($file);
                return true;
            }
            else {
                return false;
            }

            print_r($file);
            exit;
        });

        $this->get = new Get($_GET);
        $this->post = new Post($_POST);
        $this->server = new Server($_SERVER);

        $this->route = new Route($_SERVER['REQUEST_URI']);
    }
}