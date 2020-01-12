<?php

if (!permission('posts', 'add')){
    permission_page();
}

$categories = $db->from('categories')//categori tablosundan
    ->orderby('category_name', 'ASC')//ismine göre a dan z ye hepsini
    ->all();

$allTags = $db->from('tags')
    ->orderby('tag_id', 'DESC')
    ->all();
$tagsArr = [];
foreach ($allTags as $allTag){
    $tagsArr[] = trim(htmlspecialchars($allTag['tag_name']));
}

if (post('submit')){

    $post_title = post('post_title');
    $post_url = permalink(post('post_url'));
    if (!post('post_url')) {
        $post_url = permalink($post_title);
    }
    $post_content = post('post_content');
    $post_short_content = post('post_short_content');
    $post_categories = post('post_categories');
    $post_status = post('post_status');
    $post_tags = post('post_tags');
    $post_seo = json_encode(post('post_seo'));

    if (!$post_url || !$post_content || !$post_status || !$post_categories ){
        $error = 'Lütfen tüm alanları doldurun.';
    } else {

        $post_categories = implode(',', $post_categories);

        // konu var mı kontrol et
        $query = $db->from('posts')
            ->where('post_url', $post_url)
            ->first();

        if ($query){
            $error = '<strong>' . $post_title . '</strong> adında bir konu zaten eklenmiş, lütfen başka bir isim deneyin.';
        } else {

            $query = $db->insert('posts')
                ->set([
                    'post_title' => $post_title,
                    'post_url' => $post_url,
                    'post_content' => $post_content,
                    'post_short_content' => $post_short_content,
                    'post_categories' => $post_categories,
                    'post_seo' => $post_seo,
                    'post_status' => $post_status
                ]);

            if ($query){

                $postID = $db->lastId();

                // etiketleri kontrol et ve ekle
                $post_tags = explode("\n", $post_tags);//post tagımızı n karakterinden bölerek döngüye sokuyoruz
                $post_tags = array_filter($post_tags);
                if (count($post_tags) > 0) {
                    foreach ($post_tags as $tag) {

                        // etiket var mı kontrol et
                        $row = $db->from('tags')//tags tablosunda tanımlanan taglar post_tags tablosuna id si ile işlenerek daha sonra rahatlıkla kullanıma sunulacak
                            ->where('tag_url', permalink($tag))
                            ->first();

                        if (!$row) {
                            $tagInsert = $db->insert('tags')//eklenecek
                                ->set([
                                    'tag_name' => $tag,
                                    'tag_url' => permalink($tag)
                                ]);
                            $tagId = $db->lastId();
                        } else {
                            $tagId = $row['tag_id'];
                        }

                        // konuya ait etiket var mı?
                        $row = $db->from('post_tags')//etiketin ait olduğu konu
                            ->where('tag_post_id', $postID)
                            ->where('tag_id', $tagId)
                            ->first();

                        if (!$row) {//yoksa eklenecek

                            $db->insert('post_tags')
                                ->set([
                                    'tag_post_id' => $postID,
                                    'tag_id' => $tagId
                                ]);

                        }

                    }
                }

                header('Location:' . admin_url('posts'));

            } else {

                $error = 'Bir sorun oluştu.';

            }

        }

    }

}

require admin_view('add-post');