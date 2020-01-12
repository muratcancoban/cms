<?php

if (post('submit')){
    if ($data = form_control()){

        $row = $db->from('users')//kullanıcılar tablosundan 
            ->where('user_url', permalink($data['user_name']))//user urli eşleşeni buluyoruz
            ->where('user_rank', 3, '!=')
            ->first();

        if (!$row){//böyle bir üye yoksa
            $error = 'Girdiğiniz bilgiler hatalı, lütfen kontrol edin.';
        } else {

            $password_verify = password_verify($data['user_password'], $row['user_password']);//datadan gelen password ve veritabanından gelen şifrenin geçerlilik kontrolü
            if ($password_verify){
                if ($row['user_rank'] == 3){//user rank 3 e eşitse giremez
                    $error = 'Bu bölüme girmek için yetkiniz bulunmuyor!';
                } else {
                    User::Login($row);//üye bilgilerini gönderiyoruz
                    header('Location:' . admin_url());//yönlendir
                }
            } else {
                $error = 'Girdiğiniz şifre hatalı, lütfen kontrol edin.';
            }

        }

    } else {
        $error = 'Lütfen bilgileriniz girin.';
    }
}

require admin_view('login');