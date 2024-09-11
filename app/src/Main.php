<?php

use Request\Request;

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

            if (class_exists($class)) {

                $login = new $class();

                if (method_exists($login, 'postRequest')) {
                    $user = $login->postRequest($this->request->getPost ());

                    if ($user) {
                        print_r($user);
                    } else {
                        echo "Пользователь не найден.";
                    }
                } else {
                    echo "Метод getUserByLogin не найден в классе $class.";
                }
            } else {
                echo "Контроллер $class не найден.";
            }
        } else {
            echo "Не удалось определить базовый путь.";
        }
    }

    private function init() : void
    {
        include ('../src/Autoload.php');
        Autooload::registrate ();

        $this->request = new Request();
    }
}