<?php

if (!route(1)){//route 1 yok ise index olarak ayarlıyoruz
    $route[1] = 'index';
}

if (!file_exists(admin_controller(route(1)))){
    $route[1] = 'index';
}

if (!session('user_rank') || session('user_rank') == 3){//eğer session user_rank yoksa ve 3'e eşitse logini göster
    $route[1] = 'login';//route login sayfasını getirsin
}

$menus = [//admin paneli menüsü
    'index' => [
        'title' => 'Anasayfa',
        'icon' => 'tachometer',
        'permissions' => [
            'show' => 'Görüntüleme'
        ]
    ],
    'users' => [
        'title' => 'Üyeler',
        'icon' => 'user',
        'permissions' => [
            'show' => 'Görüntüleme',
            'edit' => 'Düzenleme',
            'delete' => 'Silme'
        ]
       /* 'submenu' => [ üyeler kayıt oldukları için buna gerek yok
            'add-user' => 'Üye Ekle',
            'users' => 'Üyeleri Liste'
        ]*/
    ],
    'contact' => [
        'title' => 'İletişim Mesajları',
        'icon' => 'envelope',
        'permissions' => [
            'show' => 'Görüntüleme',
            'edit' => 'Düzenleme',
            'send' => 'Gönderme',
            'delete' => 'Silme'
        ]
    ],
    'posts' => [
        'title' => 'Konular',
        'icon' => 'rss',
        'permissions' => [
            'show' => 'Görüntüleme',
            'add' => 'Ekleme',
            'edit' => 'Düzenleme',
            'delete' => 'Silme'
        ]
    ],
    'tags' => [
        'title' => 'Etiketler',
        'icon' => 'tag',
        'permissions' => [
            'show' => 'Görüntüleme',
            'add' => 'Ekleme',
            'edit' => 'Düzenleme',
            'delete' => 'Silme'
        ]
    ],
    'categories' => [
        'title' => 'Kategoriler',
        'icon' => 'folder',
        'permissions' => [
            'show' => 'Görüntüleme',
            'add' => 'Ekleme',
            'edit' => 'Düzenleme',
            'delete' => 'Silme'
        ]
    ],
    'comments' => [
        'title' => 'Yorumlar',
        'icon' => 'comments',
        'permissions' => [
            'show' => 'Görüntüleme',
            'edit' => 'Düzenleme',
            'delete' => 'Silme'
        ]
    ],
    'pages' => [
        'title' => 'Sayfalar',
        'icon' => 'file',
        'permissions' => [
            'show' => 'Görüntüleme',
            'add' => 'Ekleme',
            'edit' => 'Düzenleme',
            'delete' => 'Silme'
        ]
    ],
    'menu' => [
        'title' => 'Menü Yönetimi',
        'icon' => 'bars',
        'permissions' => [
            'show' => 'Görüntüleme',
            'add' => 'Ekleme',
            'edit' => 'Düzenleme',
            'delete' => 'Silme'
        ]
    ],
    'settings' => [
        'title' => 'Ayarlar',
        'icon' => 'cog',
        'permissions' => [
            'show' => 'Görüntüleme',
            'edit' => 'Düzenleme'
        ]
    ]
];

require admin_controller(route(1));