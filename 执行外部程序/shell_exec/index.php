<?php

$path = '/Users/mac/Documents/env/docker/docker-lnmp-dev-env-sh/html/solitaire/web/artisan';
$function = 'httpSend';
$param = '';
shell_exec("php74 $path/artisan background $function $param > /dev/null 2>&1 &");

//如何模拟呢？

