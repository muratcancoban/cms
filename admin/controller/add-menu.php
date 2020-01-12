<?php
if (!permission('menu', 'add')){
    permission_page();
}

if (post('submit')) {

    $menu = [];
    $menu_title = post('menu_title');
    if (!$menu_title) {
        $error = 'Menü başlığını belirtin.';
    } elseif (count(array_filter(post('title'))) == 0) {
        $error = 'En az bir menü içeriği girmeniz gerekiyor!';
    } else {

        $urls = post('url');
        foreach (post('title') as $key => $title) {//title'nin bir keyi ve kendisi var
            $arr = [
                'title' => $title,
                'url' => $urls[$key]//urls içindeki urlye eş olan url
            ];
            if (post('sub_title_' . $key)) {//alt menü
                $submenu = [];
                $suburls = post('sub_url_' . $key);//gelen dinamik değeri alıyoruz
                foreach (post('sub_title_' . $key) as $k => $subtitle) {
                    $submenu[] = [//alt menü dizisi
                        'title' => $subtitle,
                        'url' => $suburls[$k]//suburls altındaki key'e eşit olan
                    ];
                }
                $arr['submenu'] = $submenu;//arr içerisine submenüyü ekliyoruz
            }
            $menu[] = $arr;
        }

        // menüyü veritabanına ekle
        $query = $db->prepare('INSERT INTO menu SET menu_title = :menu_title, menu_content = :menu_content');
        $result = $query->execute([
            'menu_title' => $menu_title,//menü başlığı
            'menu_content' => json_encode($menu)//json formatına çeviriyoruz
        ]);

        if ($result) {//eğer başarılıysa bizi admin urldeki menüye göndersin
            header('Location:' . admin_url('menu'));
        } else {
            $error = 'Bir sorun oluştu ve menü eklenemedi!';
        }

    }

}

require admin_view('add-menu');