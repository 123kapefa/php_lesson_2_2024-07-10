<?php

use Request\Files;
use Request\Get;
use Request\Post;
use Request\Server;
use Routing\Route;

class Main {
    private Get $get;

    private Post $post;

    private Server $server;

    private Files $files;

    private Route $route;

    public function main() : void
    {
        echo "Run Successful \n\n";
        $this->init();

        print_f($this->files->get ());
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
            exit;
        });

        $this->get = new Get($_GET);
        $this->post = new Post($_POST);
        $this->server = new Server($_SERVER);
        $this->files = new Files($_POST);
        $this->route = new Route($_SERVER['REQUEST_URI']);
    }
}