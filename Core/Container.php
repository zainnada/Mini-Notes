<?php

namespace Core;

class Container
{
    protected $bindings = [];

    public function bind($key, $resolver)  // (add) to add things into container
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key) // (remove) to grab things out of the container
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("NO matching binding found for {$key}");
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);

    }
}
