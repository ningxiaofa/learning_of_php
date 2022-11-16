<?php
$aa = [1, 2];

if(in_array(1, $aa)){
    echo '1 is in array';
}elseif(in_array(2, $aa)){
    echo '2 is in array';
}else{
    echo 'none is in array';
}

// 有时候的的简写
true && exit('123');
// 相当于
if(true){
    exit('123');
}

null && exit('123');
if(null){
    exit('123');
}
