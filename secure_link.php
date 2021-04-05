<?php
function buildSecureLink($baseUrl, $path, $secret, $ttl, $userIp)
{
    $expires = time() + $ttl;
    $md5 = md5("$expires$path$userIp $secret", true);
    $md5 = base64_encode($md5);
    $md5 = strtr($md5, '+/', '-_');
    $md5 = str_replace('=', '', $md5);
    return $baseUrl . $path . '?md5=' . $md5 . '&expires=' . $expires;
}

$secret = 'secretword';                      // matches with nginx config
$baseUrl = 'https://mydomain.com';           // no trailing slash
$path = '/data/videos/file.mp4';             // path to your mp4 file
$ttl = 15;                                   // IMPORTANT: ttl 15 seconds for testing the expires!!!
                                             // 3600 seconds equals 1 hour, change as you require it
$userIp = $_SERVER["HTTP_CF_CONNECTING_IP"]; // if behind cloudflare nginx & CF https://tinyurl.com/58h3s3et
                                             // normally from something like $_SERVER['REMOTE_ADDR'];

echo $vidurl = buildSecureLink($baseUrl, $path, $secret, $ttl, $userIp); // link built
