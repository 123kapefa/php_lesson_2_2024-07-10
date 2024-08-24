<?php

namespace Request_;

class Request {
    private $get;
    private $post;
    private $files;
    private $method;

    public function __construct() {
        $this->get = Get::getInstance($_GET);
        $this->post = Post::getInstance($_POST);
        $this->files = Files::getInstance($_FILES);
        $this->method = $_SERVER['REQUEST_METHOD'];
    }
}