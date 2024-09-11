<?php

namespace Request_;

use Exception;

class Post {
    private static Post $instance;
    private array $data;

    public static function getInstance($data) : self {
        if (!isset(self::$instance)) {
            self::$instance = new self($data);
        }
        return self::$instance;
    }

    private function __construct (array $data) {
        $this->data = $data;
    }

    public function has (string $key) : bool {
        return array_key_exists ($key, $this->data);
    }

    public function get (string $key) : mixed {
        if ($this->has ($key)) {
            return $this->data[$key];
        }
        throw new Exception("Unable to get key [$key]!");
    }

    public function all () : array {
        return $this->data;
    }
}