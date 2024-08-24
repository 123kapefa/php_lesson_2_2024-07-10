<?php

namespace Request_;
use Exception;

class Get {
    private static Get $instance;

    private array $data;

    /**
     * @param $data
     * @return self
     */
    public static function getInstance($data): self {
        if(!isset(self::$instance)){
            self::$instance = new self($data);
        }
        return self::$instance;
    }

    /**
     * @param array $data
     */
    private function __construct(array $data) {
        $this->data = $data;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key) : bool {
        return array_key_exists($key, $this->data);
    }

    /**
     * @throws Exception
     */
    public function get(string $key) : mixed {
        if ($this->has($key)) {
            return $this->data[$key];
        }
        throw new Exception("Unable to get key [$key]!");
    }

    /**
     * @return array
     */
    public function all() : array {
        return $this->data;
    }
}