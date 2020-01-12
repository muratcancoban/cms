<?php
//linkleme işlemi
function site_url($url = false)
{
    return URL . '/' . $url;
}

function public_url($url = false)
{
    return URL . '/public/' . setting('theme') . '/' . $url;
}

function error(){//global olarak error değişekinini alarak error olduğunda döndürüyor
    global $error;
    return isset($error) ? $error : false;
}

function success(){
    global $success;
    return isset($success) ? $success : false;
}

function menu($id){
    global $db;
    $query = $db->prepare('SELECT * FROM menu WHERE menu_id = :id');
    $query->execute([
        'id' => $id
    ]);
    $row = $query->fetch(PDO::FETCH_ASSOC);//veri tabanından çekiyor
    if ($row){
        $data = json_decode($row['menu_content'], true);//menü contentini alarak
        return $data;//dizi olarak döndürüyoruz
    }
    return false;
}

function cut_text($str, $limit = 220){//yazı ve limit
    $str = strip_tags(htmlspecialchars_decode($str));//yazıyı html taglarinden kurtarıyoruz
    $length = strlen($str);
    if ($length > $limit){//uzunluk 220den büyükse
        $str = mb_substr($str, 0, $limit, 'UTF8') . '..';// türkçe karakterler etkilenmemesi için
    }
    return $str;
}

function menu_url($url)//url değerimizi alıyoruz
{
    if (!strstr($url, 'http')) {//eğer bir !strstr url içerinde html olup olmadığını arayacak 
        $url = site_url($url);
    }
    return $url;
}