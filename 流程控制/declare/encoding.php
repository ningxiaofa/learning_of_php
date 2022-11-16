<?php

declare(encoding='ISO-8859-1'); // 不过还是推荐都统一使用utf-8编码格式
// 在这里写代码

echo 123;

// 出现报错：
// PHP Warning:  declare(encoding=...) ignored because Zend multibyte feature is turned off by settings in /Users/huangbaoyin/Documents/Code/php/learning_of_php/流程控制/declare/encoding.php on line 2

// Warning: declare(encoding=...) ignored because Zend multibyte feature is turned off by settings in /Users/huangbaoyin/Documents/Code/php/learning_of_php/流程控制/declare/encoding.php on line 2
// 123%     

// 根据报错信息，可以初步判断：
// 因为仅仅只是warning，并不是错误，说明不是什么很严重的问题，不是语法问题，
// 加上自己没有使用过，通常是配置的问题，然后查看php.ini文件，搜索相关内容，关键字
// Zend multibyte


// ; If enabled, scripts may be written in encodings that are incompatible with
// ; the scanner.  CP936, Big5, CP949 and Shift_JIS are the examples of such
// ; encodings.  To use this feature, mbstring extension must be enabled.
// ;zend.multibyte = Off

// ; Allows to set the default encoding for the scripts.  This value will be used
// ; unless "declare(encoding=...)" directive appears at the top of the script.
// ; Only affects if zend.multibyte is set.
// ;zend.script_encoding =

// 解决办法:
// zend.multibyte = On
// 正常输出：
// ➜  declare git:(master) ✗ php encoding.php
// 123%                                                                                                                         
// ➜  declare git:(master) ✗ 

// 或者

// ➜  declare git:(master) ✗ php  -d zend.multibyte=On encoding.php 
// 123%                                                                                                                                            
// ➜  declare git:(master) ✗ 


// 问题扩展:
// 鸟哥 - 2011
// https://www.laruence.com/2011/11/18/2305.html
// https://serverfault.com/questions/145413/php-what-is-enable-zend-multibyte-configure-option-for
