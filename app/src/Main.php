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
        include include ('../src/Autoload.php');
        Autooload::registrate ();

        $this->request = new Request();
    }
}