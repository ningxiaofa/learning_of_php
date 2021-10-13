<?php

// 就是利用这种方式进行更加方便的编程，但是具体优缺点TBD

$mockData = [
    ['image' => 'just for test']
];

$res['imgurls'] = json_encode($mockData);

try {
    $img = json_decode($res['imgurls'], true);
    $feed_img = $img[0]['image'] ?? "";
}catch (\Exception $e) {
    $feed_img = "";
}

var_dump($feed_img);


