<?php

namespace Request_;

use Exception;

class Files {
    public static $instance = null;

    private array $files;

    private function __construct (array $files) {
        $this->files = $files;

        foreach ($files as $key => $file) {
            if (is_array ($file['name'])) {
                foreach ($file['name'] as $index => $value) {
                    $this->files['key'][] = new File([
                        'name' => $file['name'][$index],
                        'type' => $file['type'][$index],
                        'tmp_name' => $file['tmp_name'][$index],
                        'error' => $file['error'][$index],
                        'size' => $file['size'][$index],
                    ]);
                }
            } else {
                $this->files[$key] = new File($file);
            }
        }
    }

    /**
     * @param $files
     * @return Files|null
     */
    public static function getInstance($files) : ?Files {
        if (self::$instance === null) {
            self::$instance = new Files($files);
        }
        return self::$instance;
    }

    /**
     * @param $key
     * @return bool
     */
    public function has ($key) {
        return array_key_exists ($key, $this->files);
    }

    /**
     * @throws Exception
     */
    public function get ($key) {
        if ($this->has($key)) {
            return $this->files[$key];
        }
        throw new Exception("Unable to get key [$key]!");
    }

    /**
     * @throws Exception
     */
    public function moveTo (File $file, string $destination) {
        if (!is_dir ($destination)) {
            throw new Exception("Destination folder does not exist");
        }
        $targetPath = rtrim ($destination, '/') . '/' . $file->getName ();
        if (!move_uploaded_file ($file->getTmpName (), $targetPath)) {
            throw new Exception("Failed to move file to $targetPath");
        }
        return$targetPath;
    }
}
