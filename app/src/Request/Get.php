<?php

namespace Request;

class Get {
    private array $data;

    public function __constructor(array $data)
    {
        $this->data = $data;
    }
}