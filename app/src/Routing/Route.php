<?php

namespace Routing;

class Route {
    private string $requestUri = '/';

    private array $pathUri;

    public function __construct(string $requestUri)
    {
        if (preg_match('/^\/(?<request>[0-9a-zA-Z_\/-]*[0-9a-zA-Z_-]+)/', $requestUri, $match)) {
            //print_r($match);
            $this->requestUri = $match['request'];
        }

        $this->pathUri = explode('/', $this->requestUri);

        $this->pathUri = array_filter($this->pathUri, fn ($item) => !empty($item));

        print_r($this->pathUri);
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