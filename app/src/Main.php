<?php

use Request_\Request;

class Main {
    private Request $request;

    public function main() : void
    {
        echo "Run Successful \n\n";
        $this->init();

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
    }
}