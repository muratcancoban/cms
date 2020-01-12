<?php

function admin_controller($controllerName){
    $controllerName = strtolower($controllerName);
    return PATH . '/admin/controller/' . $controllerName . '.php';
}

function admin_view($viewName){
    return PATH . '/admin/view/' . $viewName . '.php';
}


function admin_url($url = false)
{
    return URL . '/admin/' . $url;
}

function admin_public_url($url = false)
{
    return URL . '/admin/public/' . $url;
}

function user_ranks($rankId = null)//rank id yoksa null olsun 
{
    $ranks = [
        1 => 'Yönetici',
        2 => 'Editör',
        3 => 'Üye'
    ];
    return $rankId ? $ranks[$rankId] : $ranks;//rankid varsa ranks içerisindeki eşdeğer olanı döndür yoksa ranks'ı döndür
}

function permission($url, $action){//url ve action alınıyor
    $permissions = json_decode(session('user_permissions'), true);//json formatında diziye aktarıyoruz
    if (isset($permissions[$url][$action]))//action varsa
        return true;
    return false;
}

function permission_page(){
    die('Bu bölümü görüntüleme yetkiniz yok!');//yoksa hata verecek
    exit;
}