<?php
    $url="http://localhost:8081//admin_goods/getAllCategory";
    $curl=curl_init($url);
    curl_setopt($curl,);
    $curlRes=curl_exec($curl);
        curl_close($curl);

    echo "---------------------\r\n";
    var_dump($curlRes);
