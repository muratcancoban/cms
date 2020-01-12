<?php

if (!permission('categories', 'add')){
    permission_page();
}

if (post('submit')){//form gönderildiğinde çalışacak

    $category_name = post('category_name');
    $category_url = permalink(post('category_url'));//posttan gelen url'e eşitliyoruz fakat
    if (!post('category_url')) {//yoksa 
        $category_url = permalink($category_name);//otomatik olarak ayarlanacak
    }
    $category_seo = json_encode(post('category_seo'));

    if (!$category_name || !$category_url){//boş
        $error = 'Lütfen kategori adını belirtin.';
    } else {

        // kategori var mı kontrol et
        $query = $db->from('categories')
            ->where('category_url', $category_url)
            ->first();

        if ($query){
            $error = '<strong>' . $category_name . '</strong> adında bir kategori zaten eklenmiş, lütfen başka bir isim deneyin.';
        } else {

            $query = $db->insert('categories')
                ->set([
                    'category_name' => $category_name,
                    'category_url' => $category_url,
                    'category_seo' => $category_seo
                ]);

            if ($query){
                header('Location:' . admin_url('categories'));
            } else {
                $error = 'Bir sorun oluştu.';
            }

        }

    }

}

require admin_view('add-category');