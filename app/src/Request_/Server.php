<?php

namespace Request_;
use Exception;

class Server {
    private const REQUEST_METHOD_GET = 'GET';
    private const REQUEST_METHOD_PORT = 'POST';

    public static Server $instance;

    private array $data;

    /**
     * @param array $data
     */
    private function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function getInstance(array $data) : self{
        if (!isset(self::$instance)) {
            self::$instance = new self($data);
        }
        return self::$instance;
    }


    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key) : bool
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * @param string $key
     * @return mixed
     * @throws Exception
     */
    public function get(string $key) : mixed
    {
        if ($this->has($key)) {
            return $this->data[$key];
        }
        throw new Exception("Unable to get key [$key]!");
    }

    /**
     * @return array
     */
    public function all() : array
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function requestMethod () : string {
        return $this->data['REQUEST_METHOD'] ?? '';
    }

    /**
     * @return bool
     */
    public function isGet () : bool {
        return $this->requestMethod () === self::REQUEST_METHOD_GET;
    }

    /**
     * @return bool
     */
    public function isPst () : bool {
        return $this->requestMethod () === self::REQUEST_METHOD_PORT;
    }
}