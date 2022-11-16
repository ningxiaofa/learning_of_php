<?php

declare(ticks = 1);

function a() { echo "a\n"; }
function b() { echo "b\n"; }

register_tick_function('a'); // 触发事件
register_tick_function('b');
// register_tick_function('b');
// register_tick_function('b');

echo "hello\n";

// 输出优点凌乱，TBD
