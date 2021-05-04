<?php

// 测试用例来自：
// https://www.php.net/manual/zh/language.generators.overview.php 
// user - lubaev 7 years ago // 直接搜索定位即可

// 分别执行脚本
require_once('./with-gen.php');
require_once('./not-gen.php');

// Result: // 来自于 lubaev
// ----------------------------------
//            |  time  | memory, mb |
// ----------------------------------
// | not gen  | 2.1216 | 89.25      |
// |---------------------------------
// | with gen | 6.1963 | 8.75       |
// |---------------------------------
// | diff     | < 192% | > 90%      |


// Same example, different results: // 来自于dc at libertyskull dot com [dc@libertyskull.com]
// ----------------------------------
//            |  time  | memory, mb |
// ----------------------------------
// | not gen  | 0.7589 | 146.75     |
// |---------------------------------
// | with gen | 0.7469 | 8.75       |
// |---------------------------------

// Time in results varying from 6.5 to 7.8 on both examples.
// So no real drawbacks concerning processing speed.

// Here is result
// php 7.4
// ----------------------------------
//            |  time  | memory, mb |
// ----------------------------------
// | not gen  | 0.7589 | 146.75     |
// |---------------------------------
// | with gen | 0.7469 | 8.75       |
// |---------------------------------

// php 8.0 without jit