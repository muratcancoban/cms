<!doctype html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <meta charset="UTF-8">
    <title>CobainSoft</title>
    
    <!--styles-->
    <link rel="stylesheet" href="<?= admin_public_url('styles/main.css?v=' . time()) ?>">
    <link rel="stylesheet" href="<?= admin_public_url('styles/extra.css?v=' . time()) ?>">

    <!--scripts-->
    <script src="<?= admin_public_url('scripts/jquery-1.12.2.min.js') ?>"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        var api_url = '<?=admin_url('api')?>',
            app_url = '<?=site_url('app')?>';
    </script>
    <script src="<?= admin_public_url('scripts/admin.js') ?>"></script>
    <script src="<?= admin_public_url('scripts/api.js') ?>"></script>
</head>
<body>
<?php if ( session('user_rank') && session('user_rank') != 3 ): //eğer user yetkili ise göster 3'e eşit olmama şartıyla?>
<!--navbar-->
<div class="navbar">
    <ul dropdown>
    <li>
    <a href="<?=site_url()?>" target="_blank">
                <span class="fa fa-home"></span>
                <span class="title">
            <?=setting('title')?>
        </span>
            </a>
        </li>
        <li>
            <a href="<?=admin_url('logout')?>">
                Çıkış Yap
            </a>
        </li>
<!--        <li>-->
<!--            <a href="#">-->
<!--                <span class="fa fa-comment"></span>-->
<!--                1-->
<!--            </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#">-->
<!--                <span class="fa fa-plus"></span>-->
<!--                <span class="title">New</span>-->
<!--            </a>-->
<!--            <ul>-->
<!--                <li>-->
<!--                    <a href="#">-->
<!--                        New Post-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">-->
<!--                        New Page-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">-->
<!--                        New Category-->
<!--                    </a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </li>-->
    </ul>
</div>

<!--sidebar-->
<div class="sidebar">

    <ul>
    <?php foreach ($menus as $mainUrl => $menu): if(!permission($mainUrl, 'show')) continue; //izinler mainurl show var mı?>
            <li class="<?=(route(1) == $mainUrl) || isset($menu['submenu'][route(1)]) ? 'active' : null?>"> <!--root1 mainurl (index,user,settings vb menüler)'ye eşit ise yada submenüsü içerisinde root1 var ise aktif ediyoruz-->
                <a href="<?=admin_url($mainUrl)?>">
                    <span class="fa fa-<?= $menu['icon'] ?>"></span>
                    <span class="title">
                        <?= $menu['title'] ?>
                    </span>
                </a>
                <?php if (isset($menu['submenu'])): //isset ile kontrol ettiriyoruz menü içerisinde submenu var ise gösterecek?>
                    <ul class="sub-menu">
                        <?php foreach ($menu['submenu'] as $url => $title): ?>
                        <li>
                            <a href="<?=admin_url($url)?>">
                                <?=$title?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        <li class="line">
            <span></span>
        </li>
    </ul>
    <a href="#" class="collapse-menu">
        <span class="fa fa-arrow-circle-left"></span>
        <span class="title">
    Daralt
</span>
    </a>

</div>

<!--content-->
<div class="content">

    <?php if (isset($error)): // eğer error değişkeni varsa burada göster?>
        <div class="message error box-">
            <?=$error?>
        </div>
    <?php endif; ?>
<?php endif; ?>