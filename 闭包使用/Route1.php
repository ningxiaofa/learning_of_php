<?php

// 经常用于框架之中，Laravel应是如此实现路由功能
// 关于闭包的bindTo的用法详情，可以参考<<现代PHP模式>>第32页

class Route
{
    protected $routes = [];
    protected $responseStatus = '200 OK';
    protected $responseContentType = 'text/html';
    protected $responseBody = 'Hello world';

    public function addRoute($routePath, $routeCallback)
    {
        // bindTo中的第一个参数$this是获取闭包内的对象状态
        // 第二个参数则是将闭包的状态绑定到当前类上，闭包中就可以调用当前的方法和属性【即便是受保护，或者私有属性方法】
        // 简单说，就是改变$this的上下文环境，实现指向指定的对象，从而完成我们需要的功能[同JS]

        // var_dump($this); exit;
        // object(Route)#1 (4) {
        //     ["routes":protected]=>
        //     array(0) {
        //     }
        //     ["responseStatus":protected]=>
        //     string(6) "200 OK"
        //     ["responseContentType":protected]=>
        //     string(9) "text/html"
        //     ["responseBody":protected]=>
        //     string(11) "Hello world"
        //   }

        // var_dump(__CLASS__); exit;
        // string(3) "Route"

        // var_dump($routeCallback); exit;
        // object(Closure)#2 (0) { }
        $this->routes[$routePath] = $routeCallback->bindTo($this, __CLASS__);
    }

    public function dispatch($currentPath)
    {
        // var_dump($this->routes); exit;
        // array(3) {
        //     ["/users/william"]=>
        //     object(Closure)#3 (2) {
        //       ["static"]=>
        //       array(1) {
        //         ["route"]=>
        //         string(14) "/users/william"
        //       }
        //       ["this"]=>
        //       object(Route)#1 (4) {
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
        //     ["/users/will"]=>
        //     object(Closure)#4 (2) {
        //       ["static"]=>
        //       array(1) {
        //         ["route"]=>
        //         string(11) "/users/will"
        //       }
        //       ["this"]=>
        //       object(Route)#1 (4) {
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
        //     ["/users/ning"]=>
        //     object(Closure)#5 (2) {
        //       ["static"]=>
        //       array(1) {
        //         ["route"]=>
        //         string(11) "/users/ning"
        //       }
        //       ["this"]=>
        //       object(Route)#1 (4) {
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

        foreach ($this->routes as $route => $callback) {
            if ($currentPath == $route) {
                $callback();
                break;
            }
        }

        // 执行
        // var_dump($this->routes); exit('执行之后');
        // array(3) {
        //     ["/users/william"]=>
        //     object(Closure)#3 (2) {
        //       ["static"]=>
        //       array(1) {
        //         ["route"]=>
        //         string(14) "/users/william"
        //       }
        //       ["this"]=>
        //       object(Route)#1 (4) {
        //         ["routes":protected]=>
        //         *RECURSION*
        //         ["responseStatus":protected]=>
        //         string(6) "200 OK"
        //         ["responseContentType":protected]=>
        //         string(29) "application/json;charset=utf8"
        //         ["responseBody":protected]=>
        //         string(23) "{"name": "/users/ning"}"
        //       }
        //     }
        //     ["/users/will"]=>
        //     object(Closure)#4 (2) {
        //       ["static"]=>
        //       array(1) {
        //         ["route"]=>
        //         string(11) "/users/will"
        //       }
        //       ["this"]=>
        //       object(Route)#1 (4) {
        //         ["routes":protected]=>
        //         *RECURSION*
        //         ["responseStatus":protected]=>
        //         string(6) "200 OK"
        //         ["responseContentType":protected]=>
        //         string(29) "application/json;charset=utf8"
        //         ["responseBody":protected]=>
        //         string(23) "{"name": "/users/ning"}"
        //       }
        //     }
        //     ["/users/ning"]=>
        //     object(Closure)#5 (2) {
        //       ["static"]=>
        //       array(1) {
        //         ["route"]=>
        //         string(11) "/users/ning"
        //       }
        //       ["this"]=>
        //       object(Route)#1 (4) {
        //         ["routes":protected]=>
        //         *RECURSION*
        //         ["responseStatus":protected]=>
        //         string(6) "200 OK"
        //         ["responseContentType":protected]=>
        //         string(29) "application/json;charset=utf8"
        //         ["responseBody":protected]=>
        //         string(23) "{"name": "/users/ning"}"
        //       }
        //     }
        //   }

        //   执行之后
        // 可以看到，打印结果，数组的value是闭包，同时也可以看到，在执行闭包函数前后，value发生了变化，可以知道，当改变对象的属性/方法时，是会改变原来的对象的【这一点JS也是如此】。但实际上与引用类型还是有区别。

        header('HTTP/1.1' . $this->responseStatus);
        header('Content-Type: ' . $this->responseContentType);
        header('Content-length: ' . mb_strlen($this->responseBody)); // 这个设置，将会控制输出的内容长度，也就是说，如果在调试打印其他变量过程中，有可能没有打印出所有的内容，因为被截取[解决办法：调试时，先注释该行代码，完毕后，再打开]
        echo $this->responseBody;
        // 后续一些清理工作.
    }
}

// 实例化路有组件
$routeIns = new Route();

// 定义App的路由列表
$routes = [
    '/users/william',
    '/users/will',
    '/users/ning',
];

// 注册定义的路有列表到路有组件实例
foreach ($routes as $route) {
    $routeIns->addRoute($route, function () use ($route) {
        // var_dump($this); exit(); // 可以看到即便是这里打印和终止脚本运行，其中routes的value是所有的注册的路由，因为执行时机.

        // object(Route)#1 (4) {
        //     ["routes":protected]=>
        //     array(3) {
        //       ["/users/william"]=>
        //       object(Closure)#3 (2) {
        //         ["static"]=>
        //         array(1) {
        //           ["route"]=>
        //           string(14) "/users/william"
        //         }
        //         ["this"]=>
        //         *RECURSION*
        //       }
        //       ["/users/will"]=>
        //       object(Closure)#4 (2) {
        //         ["static"]=>
        //         array(1) {
        //           ["route"]=>
        //           string(11) "/users/will"
        //         }
        //         ["this"]=>
        //         *RECURSION*
        //       }
        //       ["/users/ning"]=>
        //       object(Closure)#5 (2) {
        //         ["static"]=>
        //         array(1) {
        //           ["route"]=>
        //           string(11) "/users/ning"
        //         }
        //         ["this"]=>
        //         *RECURSION*
        //       }
        //     }
        //     ["responseStatus":protected]=>
        //     string(6) "200 OK"
        //     ["responseContentType":protected]=>
        //     string(9) "text/html"
        //     ["responseBody":protected]=>
        //     string(11) "Hello world"
        //   }

        $this->responseContentType = 'application/json;charset=utf8';
        $this->responseBody = '{"name": "' . $route . '"}';
    });
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
// http://localhost:9000/Route1.php?route=/users/william
// 如期响应