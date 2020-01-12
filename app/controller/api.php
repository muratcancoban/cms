<?php

$json = [];//json adlı dizi
$type = route(1);
if (!$type){//eğer 1. route yoksa sonlandır
    exit;
}

if (file_exists(controller('api/' . $type))){// eğer api altındaki type var ise sayfamıza çağırıyoruz
    require controller('api/' . $type);
}

echo json_encode($json);//döndürülüyor (api/contact.php)