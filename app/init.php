<?php
//ayarlar burada olacak class helper vb.
session_start();//oturum baslatıyoruz uyelik sistemi olacagından
ob_start();//Çıktı tamponlamasını başlatır yönlendirmelerde sıkıntı olmaması icin
date_default_timezone_set('Europe/Istanbul');//zaman ayarı

error_reporting(E_ALL);
ini_set('display_errors', 1);

function loadClasses($className)//sınıfları otomatik yukletmemizi saglıyor
{
    require __DIR__ . '/classes/' . strtolower($className) . '.php';
}
spl_autoload_register('loadClasses');

$config = require __DIR__ . '/config.php';
//veritabanı baglantısı
try {
    //$db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'], $config['db']['user'], $config['db']['pass']);
    $db = new BasicDB($config['db']['host'], $config['db']['name'], $config['db']['user'], $config['db']['pass']);//tayfunerbilen'den alınan basicdb 
} catch (PDOException $e){//bir hata olursa pdo'nun kendi exceprionu aracılıgıyla calısmayacak kodlar
    die($e->getMessage());
}

require __DIR__ . '/settings.php';//settings.php'yi sayfamıza dahil ettik

foreach (glob(__DIR__ . '/helper/*.php') as $helperFile){//helper klasorunu icindekileri yüklüyoruz
    require $helperFile;
}