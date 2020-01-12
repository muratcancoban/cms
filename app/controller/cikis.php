<?php

session_destroy();//çıkış yapma
header('Location:' . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : site_url()));//çıkış komutu nereden geliyorsa oraya referer(yönlendirme) döndür. değilse anasayfaya döndürür
exit;