<?php

// -- 主要是借鉴代码实现思路



// Yii框架中使用
/**
 * 判断Url地址是否是Xss地址
 * @param $url
 * @param string $scene
 * @return bool
 */
function isXssUrl($url, $scene = 'image'): bool
{
    if (empty($url)) return true;
    $url = strip_tags($url);
    $url = htmlspecialchars($url);
    $urlInfo = parse_url($url);
    switch ($scene) {
        case 'video':
            $cdnUrl = Yii::$app->params['aws']['video_cdn'] ?? '';
            if (ManageFeedResource::videoType == 'ali') {
                $cdnUrl = Yii::$app->params["ali"]["video_cdn"] ??
                    "https://outin-113d4dfc9bfe11ea911000163e00e7a2.oss-ap-southeast-1.aliyuncs.com";
            }
            break;
        default:
            $cdnUrl = Yii::$app->params['aws']['url'] ?? '';
    }
    $cdnUrlInfo = parse_url($cdnUrl);
    // 验证域名主体
    $urlHost = $urlInfo['host'] ?? '';
    $cdnHost = $cdnUrlInfo['host'] ?? '';
    // 验证url方案(https)
    $urlPrefix = $urlInfo['scheme'] ?? "";
    $cdnPrefix = $cdnUrlInfo['scheme'] ?? "";
    return empty($urlHost) || empty($cdnHost) || $urlHost != $cdnHost || $urlPrefix != $cdnPrefix;
}
