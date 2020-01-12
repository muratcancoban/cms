<?php

if (!permission('users', 'edit')){
    permission_page();
}

$id = get('id');
if (!$id){//eğer id yoksa users kısmına geri döndür
    header('Location:' . admin_url('users'));
    exit;
}

$row = $db->from('users')//users tablosundan user_id colonu idsine eşit olan 
    ->where('user_id', $id)
    ->first();//ilk üye
if (!$row){
    header('Location:' . admin_url('users'));
    exit;
}

if (post('submit')){//eğer viewdeki submit butonu aracılığıyla böyle bir form gönderildiyse form boş olsa bile butonumuz gelecek

    if ($data = form_control('user_permissions')){//user_email zorunlu olmasın 

        $data['user_url'] = permalink($data['user_name']);//kullanıcı adı değiştirildiğinde user_url'nin değişmesi için yapıyoruz (Sef Link)
        $data['user_permissions'] = json_encode($_POST['user_permissions']);//json çeviriyoruz
        $query = $db->update('users')//basicdb ile gelen kullanıcıyı güncelliyoruz
            ->where('user_id', $id)//user_id şu id ye eşit olan üyenin
            ->set($data);//bilgilerini güncelle

        if ($query){//sorgu geçerliliği
            header('Location:' . admin_url('users'));//başarılıysa users kısmına geri dön
        } else {
            $error = 'Bir sorun oluştu.';//sorun var
        }

    } else {
        $error = 'Eksik alanlar var, lütfen kontrol edin.';//gelen form bilgilerinde boş kısımlar olduğunda alınan hata
    }

}
$permissions = json_decode($row['user_permissions'], true);//veritabanındaki izinleri diziye çeviriyor
require admin_view('edit-user');