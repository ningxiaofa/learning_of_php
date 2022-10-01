<?php

// 经常用于框架之中，Laravel应是如此实现路由功能
// 关于闭包的bindTo的用法详情，可以参考<<现代PHP模式>>第32页

class Route
{
    protected $routes = [];
    protected $responseStatus = '200 OK';
    protected $responseContentType = 'text/html';
    protected $responseBody = 'Hello world';

    public function addRoute($routeUri, $routeCallback)
    {
        $this->routes[$routeUri] = $routeCallback->bindTo($this, __CLASS__);
    }

    public function dispatch($currentPath)
    {
        foreach ($this->routes as $route => $callback) {
            if ($currentPath == $route) {
                $callback();
                break;
            }
        }

        header('HTTP/1.1' . $this->responseStatus);
        header('Content-Type: ' . $this->responseContentType);
        header('Content-length: ' . mb_strlen($this->responseBody));
        echo $this->responseBody;
    }
}

// 实例化路由组件
$routeIns = new Route();

// 定义App的路由列表
require_once "IndexController.php"; // 应该使用自动加载，TBD
$routes = [
    '/users/william' => function(){
        $this->responseContentType = 'application/json;charset=utf8';
        $this->responseBody = '{"name": "/users/william"}';
    },
    // '/users/will' => "IndexController::index", // 这个如何解决TBD
    '/users/ning' => function(){
        $this->responseContentType = 'text/html;charset=utf8';
        $this->responseBody = '{"name": "/users/ning"}';
    }
];

// 注册定义的路有列表 -> 路有组件实例
foreach ($routes as $route => $callback) {
    $routeIns->addRoute($route, $callback);
}

// $requestRoute：从前端url中动态实时获取的路由value
// 这里先通过QUERY_STRING方式
// var_dump($_SERVER['QUERY_STRING']); exit;// string(18) "route=william/ning"
$paramArr = require_once dirname(__DIR__) . '/http/获取查询字符串参数/index.php';
$currRoute = $paramArr['route'] ?? 'index/index'; // 'index/index'为缺省路由
// var_dump($currRoute); exit;
$routeIns->dispatch($currRoute);
// {"name": "/users/william"}

// 浏览器中访问
// http://localhost:9000/Route2.php?route=/users/william
// 如期响应.