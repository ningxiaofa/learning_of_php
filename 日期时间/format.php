<?php

function format_api_datetime($datetime) {
	return isset($datetime) ? date(DateTime::RFC3339, strtotime($datetime)) : NULL;
}

$datetime = "2011-12-31";

echo date_default_timezone_get();  // UTC

echo "<br/>";

echo format_api_datetime($datetime);  // 2011-12-31T00:00:00+00:00 可以看到默认为UTC 格林威治 世界标准时间 0时区


// php.ini-development

// [Date]
// ; Defines the default timezone used by the date functions
// ; http://php.net/date.timezone
// ;date.timezone =

// 更多信息:
// https://www.php.net/manual/zh/function.date-default-timezone-get.php
// https://www.php.net/manual/zh/datetime.configuration.php#ini.date.timezone

