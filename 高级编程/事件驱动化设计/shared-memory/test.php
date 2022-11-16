<?php

$shm_key = ftok(__FILE__, 't');
$shid = shmop_open($shm_key, "c", 0666, 100);
if (!empty($shid)) {
    echo "... shared memory exists";
} else {
    echo "... shared memory doesn't exist";
}


