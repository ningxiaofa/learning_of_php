<?php

$cache  = Cache::factory();
$cache->set('hello', 'world');
$cache->get('hello');
$cache->delete('hello');

// 上面还有一个优化↓
// 首先定义一个接口Cache, Cache类实现该接口,
// 接口主要用来约束, 接口/类的方法, 适用于团队/代码规模较大.
// 完整代码：共计三[也可以两]个文件[具体实现类文件，接口定义文件，工厂类]