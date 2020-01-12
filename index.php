<?php

require __DIR__ . '/app/init.php';
//server degişkenindeki request urlyi link yapısındaki değerleri aldık
$routeExplode = explode('?', $_SERVER['REQUEST_URI']);
$route = array_values(array_filter(explode('/', $routeExplode[0])));//herzaman routenin 0. elemanı
if (SUBFOLDER_NAME != '/'){//eğer subfolder_name / eşit değilse yaptıklarımız sorunsuzca çalışacak
    array_shift($route);
}

if (!route(0)){
    $route[0] = 'index';//0. elemanımız yok ise routenin 0. elemanını index olarak ayarladık
}

if (!file_exists(controller(route(0)))){
    $route[0] = '404';//olmayan bir controller dosyası acılmaya calısılıyor ise 404.php ye gidiyor
}

if (setting('maintenance_mode') == 1 && route(0) != 'admin'){//bakım bodu eğer 1'e eşitse ve admine eşit değilse yani evet ise o zaman 0. routemizi maintence mod yani bakım modu yap
    $route[0] = 'maintenance-mode';//admine eşit olursa admin paneline giremeyiz
}

require controller(route(0));//controller dosyasını çağırıyoruz