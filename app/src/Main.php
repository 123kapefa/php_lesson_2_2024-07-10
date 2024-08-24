<?php

use Request_\Request;

class Main {
    private Request $request;

    /**
     * @throws Exception
     */
    public function __construct ()
    {
        echo "Run Successful \n\n";
        $this->init();

        $this->request = new Request();

        $pathTo = '/app/public';
        $file = $this->request->getFiles ()->get ('uploadedFile');

        print_r ($file);

        $result = $this->request->getFiles ()->moveTo ($file, $pathTo);
        print_r ($result);
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
        });
    }
}