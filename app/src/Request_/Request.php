<?php

namespace Request_;

class Request {
    private Get $get;
    private Post $post;
    private Files $files;
    private Server $server;

    public function __construct () {
        $this->get = Get::getInstance ($_GET);
        $this->post = Post::getInstance ($_POST);
        $this->files = Files::getInstance ($_FILES);
        $this->server = Server::getInstance ($_SERVER);
    }

    public function getGet () : Get {
        return $this->get;
    }

    public function getPost () : Post {
        return $this->post;
    }

    public function getServer () : Server {
        return $this->server;
    }

    public function getFiles () : Files {
        return $this->files;
    }
}