<?php

// 经常用于框架之中，Laravel应是如此实现路由功能
// 关于闭包的bindTo的用法详情，可以参考<<现代PHP模式>>第32页

class App {
    protected $routes = [];
    protected $responseStatus = '200 OK';
    protected $responseContentType = 'text/html';
    protected $responseBody = 'Hello world';

    public function addRoute($routePath, $routeCallback){
        // bindTo中的第一个参数$this是获取闭包内的对象状态
        // 第二个参数则是将闭包的状态绑定到当前类上，闭包中就可以调用当前的方法和属性【即便是受保护，或者私有属性方法】
        $this->routes[$routePath] = $routeCallback->bindTo($this, __CLASS__);
    }

    public function dispatch($currentPath){
        // var_dump($this->routes);
        // array(1) {
        //     ["/users/william"]=>
        //     object(Closure)#3 (1) {
        //       ["this"]=>
        //       object(App)#1 (4) {
        //         ["routes":protected]=>
        //         *RECURSION*
        //         ["responseStatus":protected]=>
        //         string(6) "200 OK"
        //         ["responseContentType":protected]=>
        //         string(9) "text/html"
        //         ["responseBody":protected]=>
        //         string(11) "Hello world"
        //       }
        //     }
        //   }
        foreach($this->routes as $route => $callback){
            if($currentPath == $route){
                $callback();
            }
        }
        // var_dump($this->routes);
        // array(1) {
        //     ["/users/william"]=>
        //     object(Closure)#3 (1) {
        //       ["this"]=>
        //       object(App)#1 (4) {
        //         ["routes":protected]=>
        //         *RECURSION*
        //         ["responseStatus":protected]=>
        //         string(6) "200 OK"
        //         ["responseContentType":protected]=>
        //         string(29) "application/json;charset=utf8"
        //         ["responseBody":protected]=>
        //         string(24) "{"name": "william ning"}"
        //       }
        //     }
        //   }
        // 可以看到，打印结果，数组的value是闭包，同时也可以看到，在执行闭包函数前后，value发生了变化，可以知道，当改变对象的属性/方法时，是会改变原来的对象的【这一点JS也是如此】。但实际上于引用类型还是有区别，

        header('HTTP/1.1' . $this->responseStatus);
        header('Content-Type: ' . $this->responseContentType);
        header('Content-length: ' . mb_strlen($this->responseBody));
        echo $this->responseBody;
    }
}

$app = new App();
$requestRoute = '/users/william';
$app->addRoute($requestRoute, function(){
    $this->responseContentType = 'application/json;charset=utf8';
    $this->responseBody = '{"name": "william ning"}';
});
$app->dispatch($requestRoute);
// {"name": "william ning"}

// 浏览器中访问
// http://localhost/App.php
// 如期响应