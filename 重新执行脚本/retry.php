<?php

function exception_error_handler($errno, $errstr, $errfile, $errline ) {
	throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}

set_error_handler("exception_error_handler");

$NUM_OF_ATTEMPTS = 5;
$attempts = 0;

do {
	try
	{
		executeCode();
	} catch (Exception $e) {
	$attempts++;
		sleep(1);
		continue; //直接跳转到while()
	}

	break;

} while($attempts < $NUM_OF_ATTEMPTS);

function executeCode(){
	echo "Hello world!";
}

// 方式二:

/*function doSomething($params, $try = 1){
    try{
        //do something
        return true;
    }
    catch(Exception $e){
        if($try <5){
             sleep(10);
             //optionnaly log or send notice mail with $e and $try
             doSomething($params, $try++);
        }
        else{ 
             return false;
        }
    }
}
*/
//方式三
/*public static function setCache($tag, $key, $data, $minutes, $refreshable_flag = true, $timezone_flag = true, $cache_driver = null)
{
    // Failed after retried, return to let API continue execution to prevent error
    if (static::$retry_failed_flag) {
        return;
    }

    list($cache_tag, $cache_key) = CacheModel::processTagKey($tag, $key, $refreshable_flag, $timezone_flag);

    $retries = 0;

    SET_RETRY:
    try {
        Cache::driver($cache_driver)->tags($cache_tag)->put($cache_key, $data, $minutes);
        static::$hits++;

        // Log succeed retry
        if ($retries > 0) {
            $message = "Redis set retry succeed after {$retries} retry for '{$cache_key}'";
            $message .= (isset($exception)) ? " ({$exception->getMessage()})" : '';
            AuditTrailModel::save(null, null, $message);
        }
    } catch (\Exception $exception) {
        if ($retries == static::$retry_limit) {
            // Log failed retry
            $message = "Redis set retry failed after {$retries} retry for '{$cache_key}' ({$exception->getMessage()})";
            ExceptionModel::doLog($message, E_USER_WARNING, __METHOD__);
            static::$retry_failed_flag = true;
            return;
        }
        ++$retries;
        goto SET_RETRY;
    }
}*/