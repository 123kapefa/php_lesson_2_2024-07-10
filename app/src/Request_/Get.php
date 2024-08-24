<?php

namespace Request_;
use Exception;

class Get {
    private static $instance;

    private array $data;

    public static function getInstance($data) : Get {
        if (self::$instance === null) {
            self::$instance = new Get($data);
        }
        return self::$instance;
    }

    private function __construct(array $data) {
        $this->data = $data;
    }

    public function has(string $key) : bool {
        return array_key_exists($key, $this->data);
    }

    public function get(string $key) : mixed {
        if ($this->has($key)) {
            return $this->data[$key];
        }
        throw new Exception("Unable to get key [$key]!");
    }

    public function all() : array {
        return $this->data;
    }
}