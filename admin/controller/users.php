<?php
if (!permission('users', 'show')){
    permission_page();
}

$totalRecord = $db->from('users')//toplam kaç üye olduğunu alıyor
    ->select('count(user_id) as total')
    ->total();

$pageLimit = 10;//sayfada 10 eleman(üye) gözükecek
$pageParam = 'page';//sayfa
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);//pagination metoduna toplam kayıt sayısı-sayfa limitini ve sayfa parametresinin ne olduğunu gönderiyoruz

$query = $db->from('users')//users tablosundan
    ->orderby('user_id', 'DESC')//son eklenen en başta gözükecek
    ->limit($pagination['start'], $pagination['limit'])//pagination bize başlama ve bitiş değerlerini gönderiyor
    ->all();//bütün üye bilgileri gelecek

require admin_view('users');