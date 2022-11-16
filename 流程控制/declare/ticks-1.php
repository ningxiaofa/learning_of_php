<?php

// https://www.laruence.com/2008/04/21/101.html#comment-388654

function getStatus($arg)
{
    print_r(connection_status());
    debug_print_backtrace();
}

register_tick_function("getStatus", true);

declare(ticks=1) {
    for ($i = 1; $i < 999; $i++) {
        echo "hello $i -- ";
    }
}
unregister_tick_function("getStatus");
