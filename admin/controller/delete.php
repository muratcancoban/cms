<?php
//silme işlemi (tablo, kolon ve idsini vererek genel silme işlemi yapılıyor)
$table = get('table');
$column = get('column');
$id = get('id');

if (!permission($table, 'delete')){//silme action var mı 
    permission_page();
}

$query = $db->delete($table)
    ->where($column, $id)
    ->done();

if ($table == 'posts'){
    if ($query){
        
        // konuya ait etiketleri sil
        $db->delete('post_tags')//post_tags tablosunda
            ->where('tag_post_id', $id)//tags_post_id kendi idsine eşit olan hepsini sil
            ->done();

        // konuya ait yorumları sil
        $db->delete('comments')
        ->where('comment_post_id', $id)//comment_post_id bu id ye eşit olan yorumu sil
        ->done();
    }
}

if ($table == 'tags'){
    if ($query){//başarıyla silinmiş ise

        // etikete ait konu etiketlerini sil
        $db->delete('post_tags')
            ->where('tag_id', $id)//tablodaki tag_idsi silinen id ye eşit olanları sil
            ->done();

    }
}

header('Location:' . $_SERVER['HTTP_REFERER']);//ve işlemin yapıldığı yere dönüyoruz
exit;