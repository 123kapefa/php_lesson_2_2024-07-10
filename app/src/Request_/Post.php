<?php

namespace Request_;

use Exception;

class Post {
    public static Post $instance;

    private array $data;

    /**
     * @param array $data
     */
    private function __construct (array $data) {
        $this->data = $data;
    }

    /**
     * @param $data
     * @return Post|null
     */
    public static function getInstance($data) : self {
        if (!isset(self::$instance)) {
            self::$instance = new self($data);
        }
        return self::$instance;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has (string $key) : bool {
        return array_key_exists ($key, $this->data);
    }

    /**
     * @param string $key
     * @return mixed
     * @throws Exception
     */
    public function get (string $key) : mixed {
        if ($this->has ($key)) {
            return $this->data[$key];
        }
        throw new Exception("Unable to get key [$key]!");
    }

    /**
     * @return array
     */
    public function all () : array {
        return $this->data;
    }
}