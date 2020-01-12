<?php

$meta = [
    'title' => 'Kayıt Ol'
];

if (post('submit')){//eğer post submit varsa aşağıdakileri alıyoruz

    $username = post('username');
    $email = post('email');
    $password = post('password');
    $password_again = post('password_again');
//eğer eksik gönderilmişse aşağıdaki error gözükecek
    if (!$username){
        $error = 'Lütfen kullanıcı adınızı yazın.';
    } elseif (!$email){
        $error = 'Lütfen e-posta adresinizi yazın.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){//e posta geçerliliğini kontrol ediyor
        $error = 'Lütfen geçerli bir e-posta adresi yazın.';
    } elseif (!$password || !$password_again){
        $error = 'Lütfen şifrenizi girin.';
    } elseif ($password != $password_again){
        $error = 'Girdiğiniz şifreler birbiriyle uyuşmuyor.';
    } else {

        // üye var mı kontrol et
        $row = User::userExist($username, $email);

        if ($row){//eğer böyle bir üye varsa hata mesajı ekrana gelecek
            $error = 'Bu kullanıcı adı ya da e-posta zaten kullanılıyor. Lütfen başka bir tane deneyin.';
        } else {//yoksa üye eklenecek

            // üyeyi ekle
            $result = User::Register([//kayıt işlemini user sınıfı içerisinden gerçekleştiriyoruz
                'username' => $username,
                'url' => permalink($username),
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)//hash çevirimi yapılıyor güvenlik amaçlı
            ]);

            if ($result){//üyelik oluşturulduğunda yönlendirme yapılıyor
                $success = 'Üyeliğiniz başarıyla oluşturuldu, yönlendiriliyorsunuz.';
                User::Login([//user logine user id ve name gidiyor
                    'user_id' => $db->lastInsertId(),//pdonun sunduğu komut aracılığıyla Son yerleştirilen satırın kimliğini döndürüyor
                    'user_name' => $username
                ]);
                header('Refresh:2;url=' . site_url());//2 saniye sonra site_url yönlendirmesini yapıcak
            } else {
                $error = 'Bir sorun oluştu, lütfen daha sonra tekrar deneyin.';
            }

        }

    }

}

require view('register');