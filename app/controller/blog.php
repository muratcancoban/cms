<?php

if (route(1) == 'kategori') {//eğer katagoriye eşitse 
    require controller('blog-category');
} else {

    if ($post_url = route(1)) {//blog detail'e gidecek
        require controller('blog-detail');
    } else {

        $meta = [
            'title' => setting('title'),
            'description' => setting('description'),
            'keywords' => setting('keywords')
        ];

        $totalRecord = $db->from('posts')
            ->select('count(post_id) as total')
            ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
            ->where('post_status', 1)
            ->groupby('posts.post_id')
            ->total();

        $pageLimit = 10;//1 sayfada 10 konu yer alacak
        $pageParam = 'sayfa';
        $pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);

        $query = $db->from('posts')
            ->select('posts.*, GROUP_CONCAT(category_name SEPARATOR ", ") as category_name, GROUP_CONCAT(category_url SEPARATOR ", ") as category_url')
            ->join('categories', 'FIND_IN_SET(categories.category_id, posts.post_categories)')
            ->where('post_status', 1)//post statüs eğer 1 ise gösterilecek
            ->groupby('posts.post_id')
            ->orderby('post_id', 'DESC')
            ->limit($pagination['start'], $pagination['limit'])
            ->all();

        require view('blog');

    }

}