<?php

class CurlHelper
{
    public static function curl_request ($url, array $post = null): bool | string
    {
        $defaults = [
            CURLOPT_HEADER         => 0,
            CURLOPT_URL            => $url,
            CURLOPT_FRESH_CONNECT  => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FORBID_REUSE   => 1,
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_SSL_VERIFYPEER => false,
        ];

        if (isset($post)) {
            $defaults[CURLOPT_POST] = 1;
            $defaults[CURLOPT_POSTFIELDS] = $post;
        }
        $ch = curl_init();
        curl_setopt_array($ch, $defaults);
        $result = curl_exec($ch);

        if (!$result) {
            throw new Exception('Error reaching the url ' . $url . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

}
