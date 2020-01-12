<?php
//jquery-ajax işlemleri
if ($data = form_control('phone')){//eğer bütün data geliyorsa (telefon isteğe bağlı)

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){//data içerinden gelen email geçerli bir eposta adresi geğilse
        $json['error'] = 'Lütfen geçerli bir e-posta adresi girin.';//hatalı mail
    } else {
//veri tabanı
        $query = $db->insert('contact')//db içerisindeki contact tabloma ekliyor
            ->set([
                'contact_name' => $data['name'],//data içerisindekiler
                'contact_email' => $data['email'],
                'contact_phone' => $data['phone'],
                'contact_subject' => $data['subject'],
                'contact_message' => $data['message']
            ]);

        if ($query) {//eğer başarılı ise
            $json['success'] = 'Mesajınız bize ulaştı, teşekkür ederiz.';
        } else {//hata
            $json['error'] = 'Bir sorun oluştu ve mesajınız gönderilemedi!';
        }

    }

} else {//alanlar boş
    $json['error'] = 'Lütfen tüm alanları doldurup tekrar deneyin.';
}