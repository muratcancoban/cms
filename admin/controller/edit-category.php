<?php

if (!permission('categories', 'edit')){
    permission_page();
}

$id = get('id');//get parametresinden gelen id
if (!$id){//yoksa geri yönlendir
    header('Location:' . admin_url('categories'));
    exit;
}

$row = $db->from('categories')//kateroriler tablosunda bu id ye eşit olan 
    ->where('category_id', $id)//id bulunuyor
    ->first();
if (!$row){
    header('Location:' . admin_url('categories'));
    exit;
}

if (post('submit')){

    $category_name = post('category_name');
    $category_url = permalink(post('category_url'));
    if (!post('category_url')) {
        $category_url = permalink($category_name);
    }
    $category_seo = json_encode(post('category_seo'));

    if (!$category_name || !$category_url){
        $error = 'Lütfen kategori adını belirtin.';
    } else {

        // kategori var mı kontrol et
        $query = $db->from('categories')
            ->where('category_url', $category_url)
            ->where('category_id', $id, '!=')//kategori idsi şuan düzenlenen kategoriye eşit olmayan diyerek hatanın önüne geçmiş oluyoruz
            ->first();

        if ($query){
            $error = '<strong>' . $category_name . '</strong> adında bir kategori zaten eklenmiş, lütfen başka bir isim deneyin.';
        } else {

            $query = $db->update('categories')//güncelleme yapcak
                ->where('category_id', $id)
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

$category_seo = json_decode($row['category_seo'], true);//veritabanındaki json tründe tutulan veriyi diziye çeviriyoruz

require admin_view('edit-category');