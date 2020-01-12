<?php

class Blog {

    public static function Categories()
    {//veritabanı değişkenimizi içeri alıyoruz
        global $db;
        $query = $db->from('categories')//kategori tablosundan kategorilerimizi alıyoruz
            ->select('categories.*, COUNT(post_id) as total')//kategoriler tablosunu verecek ve post id sayısını hesapla
            ->join('posts', 'FIND_IN_SET(category_id, post_categories)')//posts tablosuna join yapıyoruz
            ->orderby('category_order', 'ASC')
            ->groupby('category_id')//her grup için ayrı ayrı toplayacak
            ->all();
        return $query;
    }

    public static function findPost($post_url)
    {
        global $db;
        return $db->from('posts')
            ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
            ->join('categories', 'find_in_set(category_id, post_categories)')//kategoriler tablosuna bağlanarak işlem yapıyor
            ->where('post_url', $post_url)
            ->groupBy('post_id')//eğer post yoksa 404 hatası verecek
            ->where('post_status', 1)//bu url'ye eşitse ve post statüsü 1 ise
            ->first();
    }

    public static function findPostById($post_id)
    {
        global $db;
        return $db->from('posts')
            ->where('post_id', $post_id)
            ->where('post_status', 1)//statüsü 1 olmak zorunda
            ->first();
    }

}