<?php
//post get fonksiyonları
function post($name)
{/*eğer bir array ise array_map ile bu array elemanlarını tek tek trim ve htmlspecialchars fonksiyonlarından geçiriyor */
    if (isset($_POST[$name])){
        if (is_array($_POST[$name]))
            return array_map(function($item){/*array_map fonksiyonu, bir dizinin her değerini kullanıcı tarafından oluşturulmuş bir fonksiyona gönderir ve 
                                            kullanıcı tarafından üretilen fonksiyon tarafından verilen yeni değerlerle bir dizi döndürür. */
                return htmlspecialchars(trim($item));//trim() fonksiyonu stringin başındaki ve sonundaki boşlukları veya silinmesini istediğiniz karakterleri siler.
            }, $_POST[$name]);
        return htmlspecialchars(trim($_POST[$name]));
    }
}
/*Htmlspecialchars komutu Php ile güvenlik sağlamak ve sayfada görüntülenecek içeriği filtrelemek için kullanılan bir fonksiyondur.
& karakteri, Tırnak ve <> gibi işaretleri HTML formatına uygun olarak dönüştürür.*/

function get($name)
{
    if (isset($_GET[$name])){
        if (is_array($_GET[$name]))
            return array_map(function($item){
                return htmlspecialchars(trim($item));
            }, $_GET[$name]);
        return htmlspecialchars(trim($_GET[$name]));
    }
}
function form_control(...$except_these){//...$except_these sınırsız eleman alan bir diziye aktarma işlemini yapıyor
    unset($_POST['submit']);//unset ile postlardan submiti siliyoruz
    $data = [];
    $error = false;//döngüde elemanın gelip gelmediğini kontrol edeceğiz
    foreach ($_POST as $key => $value){//key value =user_name ve değeri-user_mail ve değeri
        if (!in_array($key, $except_these) && !post($key)){//eğer gelen key except_these içinde değilse ve yoksa
            $error = true;//error true eşitle
        } else {
            $data[$key] = post($key);//değilse dataya post'un değerini aktar
        }
    }
    if ($error){// eğer error true ise geriye false döndürür form elemanlarından boş olanlar vardır
        return false;
    }
    return $data;//post datalarını geri döndürüyoruz
}