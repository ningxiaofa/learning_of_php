<?php

// https://www.php.net/manual/zh/reserved.variables.server.php
// $_SERVER [web and cli]
var_dump($_SERVER);

// PHP 8.1
// CLI -- CLI SAPI 
// ➜  learning_of_php git:(master) ✗ php 变量/超级全局变量/_SERVER.php arg1 arg2 arg3
// array(34) {
//   ["TERM_PROGRAM"]=>
//   string(14) "Apple_Terminal"
//   ["SHELL"]=>
//   string(8) "/bin/zsh"
//   ["TERM"]=>
//   string(14) "xterm-256color"
//   ["TMPDIR"]=>
//   string(49) "/var/folders/t9/btl9s_gs24322kcq5dy5n2t80000gn/T/"
//   ["TERM_PROGRAM_VERSION"]=>
//   string(3) "443"
//   ["TERM_SESSION_ID"]=>
//   string(36) "ED6F9D6F-FA4A-4F8A-8611-FEF78ACC10B6"
//   ["USER"]=>
//   string(4) "kumu"
//   ["SSH_AUTH_SOCK"]=>
//   string(51) "/private/tmp/com.apple.launchd.HqKR1Nh80y/Listeners"
//   ["PATH"]=>
//   string(157) "/opt/homebrew/sbin:/opt/homebrew/bin:/Applications/Sublime Text.app/Contents/SharedSupport/bin:/usr/local/bin:/usr/bin:/bin:/usr/sbin:/sbin:/usr/local/go/bin"
//   ["__CFBundleIdentifier"]=>
//   string(18) "com.apple.Terminal"
//   ["PWD"]=>
//   string(55) "/Users/kumu/Documents/code/php-projects/learning_of_php"
//   ["XPC_FLAGS"]=>
//   string(3) "0x0"
//   ["XPC_SERVICE_NAME"]=>
//   string(1) "0"
//   ["SHLVL"]=>
//   string(1) "1"
//   ["HOME"]=>
//   string(11) "/Users/kumu"
//   ["LOGNAME"]=>
//   string(4) "kumu"
//   ["OLDPWD"]=>
//   string(62) "/Users/kumu/Documents/code/php-projects/learning_of_php/变量"
//   ["ZSH"]=>
//   string(22) "/Users/kumu/.oh-my-zsh"
//   ["PAGER"]=>
//   string(4) "less"
//   ["LESS"]=>
//   string(2) "-R"
//   ["LSCOLORS"]=>
//   string(22) "Gxfxcxdxbxegedabagacad"
//   ["HOMEBREW_BOTTLE_DOMAIN"]=>
//   string(44) "https://mirrors.ustc.edu.cn/homebrew-bottles"
//   ["LANG"]=>
//   string(11) "zh_CN.UTF-8"
//   ["_"]=>
//   string(18) "/usr/local/bin/php"
//   ["__CF_USER_TEXT_ENCODING"]=>
//   string(15) "0x1F5:0x19:0x34"
//   ["PHP_SELF"]=>
//   string(37) "变量/超级全局变量/_SERVER.php"
//   ["SCRIPT_NAME"]=>
//   string(37) "变量/超级全局变量/_SERVER.php"
//   ["SCRIPT_FILENAME"]=>
//   string(37) "变量/超级全局变量/_SERVER.php"
//   ["PATH_TRANSLATED"]=>
//   string(37) "变量/超级全局变量/_SERVER.php"
//   ["DOCUMENT_ROOT"]=>
//   string(0) ""
//   ["REQUEST_TIME_FLOAT"]=>
//   float(1648864429.611093)
//   ["REQUEST_TIME"]=>
//   int(1648864429)
//   ["argv"]=>
//   array(4) {
//     [0]=>
//     string(37) "变量/超级全局变量/_SERVER.php"
//     [1]=>
//     string(4) "arg1"
//     [2]=>
//     string(4) "arg2"
//     [3]=>
//     string(4) "arg3"
//   }
//   ["argc"]=>
//   int(4)
// }
// array(4) {
//   [0]=>
//   string(37) "变量/超级全局变量/_SERVER.php"
//   [1]=>
//   string(4) "arg1"
//   [2]=>
//   string(4) "arg2"
//   [3]=>
//   string(4) "arg3"
// }

// 关于$_SERVER['argv']的使用与优化，见./argv.php

// Web Serve [PHP internal server]
// array(17) {
//     ["DOCUMENT_ROOT"]=>
//     string(39) "/Users/kumu/Documents/code/kumu-api/web"
//     ["REMOTE_ADDR"]=>
//     string(3) "::1"
//     ["REMOTE_PORT"]=>
//     string(5) "63368"
//     ["SERVER_SOFTWARE"]=>
//     string(29) "PHP 7.2.34 Development Server"
//     ["SERVER_PROTOCOL"]=>
//     string(8) "HTTP/1.1"
//     ["SERVER_NAME"]=>
//     string(9) "localhost"
//     ["SERVER_PORT"]=>
//     string(4) "8000"
//     ["REQUEST_URI"]=>
//     string(1) "/"
//     ["REQUEST_METHOD"]=>
//     string(3) "GET"
//     ["SCRIPT_NAME"]=>
//     string(10) "/index.php"
//     ["SCRIPT_FILENAME"]=>
//     string(49) "/Users/kumu/Documents/code/kumu-api/web/index.php"
//     ["PHP_SELF"]=>
//     string(10) "/index.php"
//     ["HTTP_HOST"]=>
//     string(14) "localhost:8000"
//     ["HTTP_USER_AGENT"]=>
//     string(11) "curl/7.77.0"
//     ["HTTP_ACCEPT"]=>
//     string(3) "*/*"
//     ["REQUEST_TIME_FLOAT"]=>
//     float(1648865676.3313)
//     ["REQUEST_TIME"]=>
//     int(1648865676)
//   }

// 对比两者，发现
// 1. 返回的数组元素数量不同，cli下比较多，原因是很多配置项在cli下是硬编码开启的，但是在web下则是需要显式配置开启
// 2. web下有些配置，在cli并没有，因为web下，走的路径不同，通过http协议进行通信，但是cli下，则是直接在服务器上进行执行，并没有走网络通信。 -- 这里是同一个主机下做测试，所以会有误解。

// /usr/local/opt/php@7.2/bin/php yii fix-db-timeline-data/fix-timeline-feed-channel-id-empty


// 补充 -- 公司项目中
// PHP 7.2
// ➜  kumu-api git:(hotfix/20220401_fix_feed_channel_id) ✗ /usr/local/opt/php@7.2/bin/php yii fix-db-timeline-data/fix-timeline-feed-channel-id-empty
// 2022-04-02 02:25:09.825643	fix-db-timeline-data/fix-timeline-feed-channel-id-empty, Step 1 | Start
// array(34) {
//   ["TERM_PROGRAM"]=>
//   string(14) "Apple_Terminal"
//   ["SHELL"]=>
//   string(8) "/bin/zsh"
//   ["TERM"]=>
//   string(14) "xterm-256color"
//   ["TMPDIR"]=>
//   string(49) "/var/folders/t9/btl9s_gs24322kcq5dy5n2t80000gn/T/"
//   ["TERM_PROGRAM_VERSION"]=>
//   string(3) "443"
//   ["TERM_SESSION_ID"]=>
//   string(36) "EA86CD64-4B46-4ED1-8452-706306BD7AD5"
//   ["USER"]=>
//   string(4) "kumu"
//   ["SSH_AUTH_SOCK"]=>
//   string(51) "/private/tmp/com.apple.launchd.HqKR1Nh80y/Listeners"
//   ["PATH"]=>
//   string(99) "/opt/homebrew/sbin:/opt/homebrew/bin:/usr/local/bin:/usr/bin:/bin:/usr/sbin:/sbin:/usr/local/go/bin"
//   ["__CFBundleIdentifier"]=>
//   string(18) "com.apple.Terminal"
//   ["PWD"]=>
//   string(35) "/Users/kumu/Documents/code/kumu-api"
//   ["XPC_FLAGS"]=>
//   string(3) "0x0"
//   ["XPC_SERVICE_NAME"]=>
//   string(1) "0"
//   ["SHLVL"]=>
//   string(1) "1"
//   ["HOME"]=>
//   string(11) "/Users/kumu"
//   ["LOGNAME"]=>
//   string(4) "kumu"
//   ["OLDPWD"]=>
//   string(26) "/Users/kumu/Documents/code"
//   ["ZSH"]=>
//   string(22) "/Users/kumu/.oh-my-zsh"
//   ["PAGER"]=>
//   string(4) "less"
//   ["LESS"]=>
//   string(2) "-R"
//   ["LSCOLORS"]=>
//   string(22) "Gxfxcxdxbxegedabagacad"
//   ["HOMEBREW_BOTTLE_DOMAIN"]=>
//   string(44) "https://mirrors.ustc.edu.cn/homebrew-bottles"
//   ["LANG"]=>
//   string(11) "zh_CN.UTF-8"
//   ["_"]=>
//   string(30) "/usr/local/opt/php@7.2/bin/php"
//   ["__CF_USER_TEXT_ENCODING"]=>
//   string(15) "0x1F5:0x19:0x34"
//   ["PHP_SELF"]=>
//   string(3) "yii"
//   ["SCRIPT_NAME"]=>
//   string(3) "yii"
//   ["SCRIPT_FILENAME"]=>
//   string(3) "yii"
//   ["PATH_TRANSLATED"]=>
//   string(3) "yii"
//   ["DOCUMENT_ROOT"]=>
//   string(0) ""
//   ["REQUEST_TIME_FLOAT"]=>
//   float(1648866309.791)
//   ["REQUEST_TIME"]=>
//   int(1648866309)
//   ["argv"]=>
//   array(2) {
//     [0]=>
//     string(3) "yii"
//     [1]=>
//     string(55) "fix-db-timeline-data/fix-timeline-feed-channel-id-empty"
//   }
//   ["argc"]=>
//   int(2)
// }