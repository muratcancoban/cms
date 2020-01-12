<?php

if (!permission('settings', 'show')){
    permission_page();
}

$themes = [];//tema klasörlerinin ayarlar kısında görünmesini sağlıyoruz
foreach (glob(PATH . '/app/view/*/') as $folder){//glob — Bir kalıpla eşleşen dosya yollarını bulur
    $folder = explode('/', rtrim($folder, '/'));// */* karakterlerinden parçaladık
    $themes[] = end($folder);//son elemanı end ile alıyoruz böylelikle tema ayarlarında temamızın ismini gösterebiliyoruz 
}

if (post('submit')){
    if (!permission('settings', 'edit')){
        $error = 'Ayarları düzenleme yetkiniz bulunmuyor!!';
    } else {
    $html = '<?php'.PHP_EOL.PHP_EOL;//Sunucunun dosya sisteminde metin dosyaları okurken veya yazarken bu sabiti kullanıyoruz
    foreach (post('settings') as $key => $val){
        $html .= '$settings["' . $key . '"] = "' . $val . '";' . PHP_EOL;
    }
    file_put_contents(PATH . '/app/settings.php', $html);//file_put_contents — Bir dizgeyi bir dosyaya yazar
    header('Location:' . admin_url('settings'));//admin_url nin içerisindeki settings'e yönlendirme yaptık
}
}
require admin_view('settings');