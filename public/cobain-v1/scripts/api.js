function contact(formId){
    var data = $(formId).serialize();//form içerisindeki bütün elemanlar alınacak
    $.post(api_url + '/contact', data, function (response) {//api_url atındaki contact'a data gönderilecek ve 3. parametre olarak cevabı alıyoruz
        if (response.error){//responsive' de error değeri varsa
            $('#contact-success-msg').hide();
            $('#contact-error-msg').show().html(response.error);//cobain-v1 header içerinde bulunan hata raporunu göster ve hrml içerisine gelen hatayı yazdır
        } else{
            $('#contact-error-msg').hide();
            $('#contact-success-msg').show().html(response.success);//başarılı
            $(formId + ' input, ' + formId + ' textarea').val('');//mesaj gönderildiğinde formıd içerisindeki input ve textarea içerindeki değerler silinecek
        }
    }, 'json');//bilgiler json formatında alınacak
}

function add_comment(formId){//formidsini aldık
    var postID = $(formId).data('id'),//postid
        data = $(formId).serialize() + '&post_id=' + postID;
    $.post(api_url + '/add-comment', data, function (response) {//api_urlde add-commente gönderiyoruz
        if (response.error){//error varsa
            $('#comment-msg').removeClass().addClass('alert alert-danger').html(response.error).show();// bütün sınıflarını sil ve alert-danger sınıfını içerine yükle ve htmlin içerisine gelen error kodunu yaz
        } else if (response.success) {
            $('#comment-msg').removeClass().addClass('alert alert-success').html(response.success).show();
            $(formId + ' input, ' + formId + ' textarea').val('');//formid input ve text area içerindekileri sıfırlıyoruz
        } else {
            $('#no-comment').remove();
            $('#comment-msg').hide().removeClass().html('');
            $('#comments').append(response.comment);
        }
    }, 'json');//format bilgisi
}