<?php


namespace app\components\redis;

use app\components\Limit;
use app\components\RedisClient;

class ApiLimitRedis
{
    const key_sms_ip = "limit:sms:ip:";
    const key_sms_country = "limit:sms:country:";
    const key_sms_ip_whitelist = "limit:sms:ip:whitelist:";
    const key_user_follow_pop_up_limit = "limit:follow:";

    public static $redis_client;

    private static $_redis_pool = 'api-limit';

    public static function LimitRedisKey($user_id, $path)
    {
        return "limit:" . $user_id . ":" . $path;
    }

    public static function LimitSmsPhoneKey($cellphone)
    {
        $time =  date("Y-m-d");
        return "limit:sms:phone:" . $time . ":" . $cellphone;
    }

    private static function _getInstance()
    {
        if (self::$redis_client instanceof RedisClient) {
            return self::$redis_client;
        }
        self::$redis_client = new RedisClient(self::$_redis_pool);
        return self::$redis_client;
    }

    public static function SetApiLimit($user_id, $path, $ts = 1)
    {
        $key = self::LimitRedisKey($user_id, $path);
        return self::_getInstance()->set($key, 1, ["NX", "EX" => $ts]);
    }

    public static function ExistApiLimit($user_id, $path)
    {
        $key = self::LimitRedisKey($user_id, $path);
        return self::_getInstance()->exists($key);
    }

    // 短信ip限制
    public static function SmsIpLimit($ip)
    {
        $key = self::key_sms_ip . $ip;
        $limitNum = self::_getInstance()->incr($key, 1);
        if ($limitNum == 1) {
            self::_getInstance()->expire($key, Limit::SmsIpExpire);
        }
        return $limitNum;
    }

    public static function SetSmsIpWhitelist($ip)
    {
        $key = self::key_sms_ip_whitelist . $ip;
        $ip = self::_getInstance()->get($key);
        if (!$ip) {
            self::_getInstance()->set($key, "1");
        }
        self::_getInstance()->expireat($key, strtotime('tomorrow'));

        return true;
    }

    public static function GetSmsIpWhitelist($ip)
    {
        return self::_getInstance()->get(self::key_sms_ip_whitelist . $ip);
    }


    // 短信phone限制
    public static function SmsPhoneLimit($phone)
    {
        $key = self::LimitSmsPhoneKey($phone);
        $limitNum = self::_getInstance()->incr($key, 1);
        if ($limitNum == 1) {
            self::_getInstance()->expire($key, 115200);
        }
        return $limitNum;
    }


    /**
     * @param $country_code
     * @return mixed
     */
    public static function SmsCountryMaxLimit($country_code)
    {
        $Ymd = date("Y-m-d", time() + 28800);
        $key = self::key_sms_country . $Ymd . ":" . $country_code;
        return self::_getInstance()->incr($key, 1);
    }
    
    public static function CheckSmsCountryMaxLimit($country_code)
    {
        $Ymd = date("Y-m-d", time() + 28800);
        $key = self::key_sms_country . $Ymd . ":" . $country_code;
        return self::_getInstance()->get($key);
    }


    /**
     * Used for follow/operation
     * Limit for showing the banner for an hour if the user plays with follow button of a specific streamer
     * @param string $user_guid
     * @param string $streamer_guid
     * @return mixed
     */
    public static function SetFollowUpcomingLsLimit(string $user_guid, string $streamer_guid)
    {
        $key = self::key_user_follow_pop_up_limit . $user_guid . ':' . $streamer_guid;
        $limitNum = self::_getInstance()->incr($key, 1);
        if ($limitNum == 1) {
            self::_getInstance()->expire($key, Limit::FollowPopupExpire);
        }
        return $limitNum;
    }

    /**
     *  Used for follow/operation
     *  Limit for showing the banner for an hour if the user plays with follow button of a specific streamer
     * @param string $user_guid
     * @param string $streamer_guid
     * @return mixed
     */
    public static function checkIfExistFollowUpcomingLsLimit(string $user_guid, string $streamer_guid)
    {
        $key = self::key_user_follow_pop_up_limit . $user_guid . ':' . $streamer_guid;
        return self::_getInstance()->exists($key);
    }
}
