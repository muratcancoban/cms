<?php

$page_url = route(1);
if (!$page_url){//page url yoksa 
    header('Location:' . site_url('404'));
    exit;
}

$row = $db->from('pages')//sayfalar tablosundan
    ->where('page_url', $page_url)//tablodaki page_url şuanki page url eşit olan sayfayı alıyoruz
    ->first();

if (!$row){
    header('Location:' . site_url('404'));
    exit;
}

$seo = json_decode($row['page_seo'], true);//page_Seo dizi haline getirdik

$meta = [//tema headerında istenilen title ve description
    'title' => $seo['title'] ? $seo['title'] : $row['page_title'],//seo title girildiyse onu al yoksa sayfa ismini alacak
    'description' => $seo['description'] ? $seo['description'] : cut_text($row['page_content'], 210)
];

require view('page');