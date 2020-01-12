<?php

if (!permission('categories', 'show')){
    permission_page();
}

$query = $db->from('categories')
   ->orderby('category_order', 'ASC')//küçükten büyüğe dopru sıralama yapılacak
    ->all();

require admin_view('categories');