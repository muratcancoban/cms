<?php

if (!permission('pages', 'add')){
    permission_page();
}

if (post('submit')){

    $page_title = post('page_title');//gönderilen isim ve url
    $page_url = permalink(post('page_url'));
    if (!post('page_url')) {
        $page_url = permalink($page_title);//yoksa page title otomatik beirlensin
    }
    $page_content = post('page_content');//sayfa içeriği
    $page_seo = json_encode(post('page_seo'));

    if (!$page_url || !$page_content){//boş
        $error = 'Lütfen tüm alanları doldurun.';
    } else {

        // sayfa var mı kontrol et
        $query = $db->from('pages')
            ->where('page_url', $page_url)
            ->first();

        if ($query){//aynı isimde sayfa varsa
            $error = '<strong>' . $page_title . '</strong> adında bir sayfa zaten eklenmiş, lütfen başka bir isim deneyin.';
        } else {//kayıt işlemini gerçekleştiriyoruz

            $query = $db->insert('pages')
                ->set([
                    'page_title' => $page_title,
                    'page_url' => $page_url,
                    'page_content' => $page_content,
                    'page_seo' => $page_seo
                ]);

            if ($query){
                header('Location:' . admin_url('pages'));
            } else {
                $error = 'Bir sorun oluştu.';
            }

        }

    }

}

require admin_view('add-page');