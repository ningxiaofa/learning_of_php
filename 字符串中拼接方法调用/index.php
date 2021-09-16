<?php

class JustTest {
    public function test(){
        return "world";
    }

    public function run(){
        echo "hello {$this->test()}";
    }
}

(new JustTest())->run();

// Output:
// hello world
