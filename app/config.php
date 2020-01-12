<?php

define('PATH', realpath('.'));//gercek yolu bulmamızı sagliyor
define('SUBFOLDER_NAME', dirname($_SERVER['SCRIPT_NAME']));//klasöre ulaşıyoruz ve subfolder name ismimizi belirliyoruz
define('URL', 'http://' . $_SERVER['SERVER_NAME'] . (SUBFOLDER_NAME == '/' ? null : SUBFOLDER_NAME));//server_name ile localhostumuzun adını alabiliyoruz


//define('SUBFOLDER', true);//uygulamayı klasor altında yaptıgımız icin request urlsini düzeltiyoruz
//define('URL', 'http://localhost/cms'); dinamik olarak belirlemediğimiz için klasör değiştiğinde çalışmayacak
//define('SUBFOLDER_NAME', 'cms');

return [//init icindeki, config degiskenine atanıyor
    'db' => [
        'name' => 'cms',
        'host' => 'localhost',
        'user' => 'root',
        'pass' => 'usbw'//root
    ]
];