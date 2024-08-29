<?php

use Request_\Request;

class Main {
    private Request $request;

    public function main() : void
    {
        echo "Run Successful \n\n";
        $this->init();

        $pathTo = '/app/public';
        $file = $this->request->getFiles ()->get ('uploadedFile');

        print_r ($file);

        $result = $this->request->getFiles ()->moveTo ($file, $pathTo);
        print_r ($result);
    }

    private function init() : void
    {
        include include ('../src/Autoload.php');
        Autooload::registrate ();

        $this->request = new Request();
    }
}