<?php

$update_ql = array (
    'TableName' => 'dev_public_sig_members',
    'ExpressionAttributeNames' =>
    array (
      '#f0' => 'roles',
    ),
    'ExpressionAttributeValues' =>
    array (
      ':v0' =>
      array (
        'N' => '180',
      ),
    ),
    'Key' =>
    array (
      'nid' =>
      array (
        'S' => 'sig_u0geehchflnd3p65gu49ebq1f6',
      ),
      // 不能执行成功，因为排序键，不是uid
      'uid' =>
      array (
        'S' => 't19FBRttRXkBB5jw',
      ),
    ),
    'UpdateExpression' => 'SET  #f0=:v0 ',
);


