<?php

namespace Framework\Routes;

class RouteParser
{

    private $requestMethod;
    private $uri;
    private $callback;

    public function __construct($requestMethod , $uri , $callback)
    {
        $this->requestMethod    = $requestMethod;
        $this->uri              = $uri;
        $this->callback         = $callback;
    }

    public function getRequestMethod()
    {
        return $this->requestMethod;
    }

    public function find()
    {
        if( $this->uri === RouteHandle::getRequestPath() && $this->requestMethod === RouteHandle::getRequestMethod())
        {
            return true;
        }
        return false;
    }

    public function callFunc()
    {
        return call_user_func_array( $this->callback , []);
    }


}