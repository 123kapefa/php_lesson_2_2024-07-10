<?php

namespace Routing;

class Route {
    private string $requestUri = '/';

    private array $pathUri;

    private static Route $instance;

    public static function getInstance(string $requestUri): self {
        if(!isset(self::$instance)){
            self::$instance = new self($requestUri);
        }
        return self::$instance;
    }

    private function __construct(string $requestUri)
    {
        if (preg_match('/^\/(?<request>[0-9a-zA-Z_\/-]*[0-9a-zA-Z_-]+)/', $requestUri, $match)) {
            $this->requestUri = $match['request'];
        }

        $this->pathUri = explode('/', $this->requestUri);

        $this->pathUri = array_filter($this->pathUri, fn ($item) => !empty($item));

        $this->pathUri = array_map([$this, 'transformPathSegment'], $this->pathUri);
    }

    private function transformPathSegment(string $segment): string {
        $segment = preg_replace_callback('/[-_](.)/',
            function($matches) {
                return strtoupper($matches[1]);
            },
            $segment);

        return ucfirst($segment);
    }

    public function getParentPath() : array
    {
        return array_slice($this->pathUri, 0, -1);
    }

    public function getBase() : array
    {
        return array_slice($this->pathUri, -1);
    }
}