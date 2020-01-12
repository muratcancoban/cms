<?php
//post olarak gelen bilgiler
$name = post('name');
$email = post('email');
$post_id = post('post_id');
$comment = post('comment');

if (session('user_id')) {//user_idsi varsa
    $name = session('user_name');//ismini ve mailini alacak
    $email = session('user_email');
}

if (!$name || !$email || !$post_id) {//boş ise
    $json['error'] = 'Lütfen adınızı ve e-posta adresinizi belirtin.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {//eğer mail geçersizse
    $json['error'] = 'Lütfen geçerli bir e-posta adresi belirtin.';
} elseif (!$comment){//yorum yoksa
    $json['error'] = 'Lütfen yorumunuzu belirtin.';
} else {

    if (session('user_id')) {//üye yorumları açıksa girilen yorum görünecek değilse gözükmeyecek
        $status = setting('user_comment') == 1 ? 1 : 0;
    } else {
        $status = setting('visitor_comment') == 1 ? 1 : 0;//ziyaretçi yorumu onaylıysa gözükecek
    }

    // ilgili blog konusunu bul
    $row = Blog::findPostById($post_id);
    if (!$row) {
        $json['error'] = 'Beklenmedik bir sorun oluştu, lütfen sayfayı yenileyin.';
    } else {//veri tabanı

        $comment = [
            'comment_user_id' => session('user_id'),
            'comment_post_id' => $post_id,
            'comment_name' => $name,
            'comment_email' => $email,
            'comment_content' => $comment,
            'comment_status' => $status
        ];

        // yorumu ekle
        $insert = $db->insert('comments')//yorumlar tablosuna set metoduyla ekliyoruz
            ->set($comment);

        if ($insert){

            if ($status == 0){//statü 0'a eşitse
                $json['success'] = 'Yorumunuz gönderildi. Onaylandıktan sonra yayınlanacaktır. Teşekkürler.';
            } else {//eğer yorum onaylı ise

                $comment['comment_date'] = date('Y-m-d H:i:s');

                ob_start();
                require view('static/comment');
                $output = ob_get_clean();

                $json['comment'] = $output;

            }

        } else {
            $json['error'] = 'Yorumunuzu eklerken bir sorun oluştu.';
        }

    }

}