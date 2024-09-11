<?php

namespace Request;

class File {
    private $name;
    private $type;
    private $tmpName;
    private $error;
    private $size;

    public function __construct($file) {
        $this->name = $file['name'];
        $this->type = $file['type'];
        $this->tmpName = $file['tmp_name'];
        $this->error = $file['error'];
        $this->size = $file['size'];
    }

    public function getName () { return $this->name; }
    public function getType () { return $this->type; }
    public function getTmpName () { return $this->tmpName; }
    public function getError () { return $this->error; }
    public function getSize () { return $this->size; }
}