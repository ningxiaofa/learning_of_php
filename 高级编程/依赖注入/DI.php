<?php

// https://cloud.tencent.com/developer/inventory/1496/article/1520155
// https://blog.csdn.net/william_n/article/details/126370337

// 实现原理：
// 借助类的反射，很多PHP框架才能实现依赖注入自动解决类与类之间的依赖关系，这给我们平时的开发带来了很大的方便。
// 同时借助闭包机制，实现了延迟加载

// 再次声明这里实现的依赖注入非常简单，并不能应用到实际开发中去，可以参考后面的文章[服务容器(IocContainer)][2], 了解Laravel的服务容器是如何实现依赖注入的。

include_once("Point.php");
include_once("Circle.php");

// 依赖注入
// 好了接下来我们编写一个名为make的函数，传递类名称给make函数返回类的对象，在make里它会帮我们注入类的依赖，即在本例中帮我们注入Point对象给Circle类的构造方法。

// 构建类的对象
function make($className)
{
    $reflectionClass = new ReflectionClass($className);
    $constructor = $reflectionClass->getConstructor();
    $parameters = $constructor->getParameters();
    $dependencies = getDependencies($parameters);
    // var_dump($dependencies);
    // exit;
    return $reflectionClass->newInstanceArgs($dependencies);
}

//依赖解析
function getDependencies($parameters)
{
    $dependencies = [];
    foreach ($parameters as $parameter) {
        // getClass在PHP 8.1中已经被抛弃了,
        // /opt/homebrew/opt/php@7.2/bin/php 高级编程/依赖注入/DI.php
        $dependency = $parameter->getClass();
        if (is_null($dependency)) {
            if ($parameter->isDefaultValueAvailable()) {
                $dependencies[] = $parameter->getDefaultValue();
            } else {
                // 不是可选参数的, 为了简单, 直接赋值为字符串0
                // 针对构造方法的必须参数这个情况, laravel是通过service provider注册closure到IocContainer,
                // 在closure里可以通过return new Class($param1, $param2)来返回类的实例, 然后在make时回调这个closure即可解析出对象
                // 具体细节我会在另一篇文章里面描述
                $dependencies[] = '0';
            }
        } else {            
            // 递归解析出依赖类的对象
            $dependencies[] = make($parameter->getClass()->name);
        }
    }

    return $dependencies;
}

// 定义好make方法后我们通过它来帮我们实例化Circle类的对象:
// $circle = make('Circle');
$circle = make(Circle::class); // 可以看到，这里并不需要我们手动实例化 Point类型，也就是Circle 类的依赖，实现了自动依赖注入
$area = $circle->area();
// var_dump($circle, $area);
// Output:
// object(Circle)#5 (2) {
//     ["radius"]=>
//     int(1)
//     ["center"]=>
//     object(Point)#10 (2) {
//       ["x"]=>
//       int(0)
//       ["y"]=>
//       int(0)
//     }
//   }
//   float(3.14)

// 通过上面这个实例我简单描述了一下如何利用PHP类的反射来实现依赖注入，
// Laravel的依赖注入也是通过这个思路来实现的，只不过设计的更精密大量地利用了闭包回调来应对各种复杂的依赖注入。

