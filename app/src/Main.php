<?php

use Request_\Request;

class Main {
    private Request $request;

    public function main() : void
    {
        echo "Run Successful \n\n";
        $this->init();

        $namespace = $this->request->getRoute ()->getParentPath();
        $base = $this->request->getRoute ()->getBase();

        if ($base) {
            $class = 'Controllers\\' . implode('\\', $namespace) . '\\' . $base[0];

            $object = new $class();

            print_r ($object);

//            if ($this->request->getServer ()->isGet ()) {
//                echo $object->getRequest($this->request->getGet ());
//            } elseif ($this->request->getServer ()->isPst ()) {
//                echo $object->postRequest($this->request->getPost ());
//            }
        }
    }

    private function init() : void
    {
        include ('../src/Autoload.php');
        Autooload::registrate ();

        $this->request = new Request();
    }
}