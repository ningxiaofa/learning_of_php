<?php

// for the protection from the leaking of resources // 防止资源泄漏
// see RFC https://wiki.php.net/rfc/generators#closing_a_generator

// and use finnaly

// sample code

function getLines($file) {
    $f = fopen($file, 'r');
    try {
        while ($line = fgets($f)) {
            yield $line;
        }
    } finally {
        fclose($f);
    }
}

foreach (getLines("file.txt") as $n => $line) {
    if ($n > 5) break;
    echo $line;
}