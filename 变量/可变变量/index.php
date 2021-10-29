<?php

class BaseClass
{
    private static $_instance;

    public function __construct()
    {
        // TBD
    }

    public static function getInstance()
    {
        if(self::$_instance instanceof self){
            return self::$_instance;
        }

        return self::$_instance = new self();
    }
}

class DynamicVariable extends BaseClass
{
    public $fields_of_notifications = [
        'livestream_notification',
        'timeline_like_notification',
        'timeline_comment_notification',
        'sig_livestream_notification',
        'sig_timeline_like_notification',
        'sig_timeline_comment_notification',
        'quiz_notify',
    ];
}

class User extends BaseClass
{
    public $livestream_notification;
    public $timeline_like_notification;
    public $timeline_comment_notification;
    public $sig_livestream_notification;
    public $sig_timeline_like_notification;
    public $sig_timeline_comment_notification;
    public $quiz_notify;
}

// 代码执行
$postdata = [
    'sig_livestream_notification' => 1,
    'sig_timeline_like_notification' => 1,
    'sig_timeline_comment_notification' => 0,
];

$user = User::getInstance();
$dynamicVariable = new DynamicVariable();
foreach($dynamicVariable->fields_of_notifications as $field){
    if (isset($postdata[$field])) {
        // 使用到可变变量 作为临时变量
        $$field = trim($postdata[$field]);
        $user->$field = $$field;
    }
}

// // 这里使用$key作为临时变量
// foreach($dynamicVariable->fields_of_notifications as $key => $field){
//     if (isset($postdata[$field])) {
//         // $key作为临时变量
//         $key = trim($postdata[$field]);
//         $user->$field = $key;
//     }
// }

// // 这里因为只有一处使用临时变量，可以直接赋值，不需要临时变量
// foreach($dynamicVariable->fields_of_notifications as $field){
//     if (isset($postdata[$field])) {
//         $user->$field = $trim($postdata[$field]);
//     }
// }

// var_dump($user);

var_dump(array_merge(['1','2'], ['3']));

