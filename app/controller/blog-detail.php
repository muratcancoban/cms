<?php

$row = Blog::findPost($post_url);
if (!$row){//eğer böyle bir url yoksa 404 göster
    header('Location:' . site_url('404'));
    exit;
}

$seo = json_decode($row['post_seo'], true);

$meta = [//seoda title varsa onu al yoksa post_title kullanılacak
    'title' => $seo['title'] ? $seo['title'] : $row['post_title'],
    'description' => $seo['description'] ? $seo['description'] : cut_text($row['post_short_content'])//seo description yoksa kısa içerik yazısını alacak
];

// yorumları listele
$comments = $db->from('comments')//yorumlar tablosundan
    ->where('comment_post_id', $row['post_id'])//post idsi bu post idye eşit olan tüm yorumları gösterecek
    ->where('comment_status', 1)//yorum statüsü 1 olan
    ->orderby('comment_id', 'ASC')
    ->all();//tümünü çekecek


require view('blog-detail');