<?php

use Shop\Customer\Order;

class Main {
    public function main() : void
    {
        echo "Run Successful ";
        $this->init();

        $order = new Order();

        print_r($order);
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
    }
}