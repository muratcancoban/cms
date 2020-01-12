<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Üye Düzenle
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="box-">
        <form action="" method="post" class="form label">
            <ul>
                <li>
                    <label>Kullanıcı Adı</label>
                    <div class="form-content">
                        <input type="text" name="user_name"
                               value="<?= post('user_name') ? post('user_name') : $row['user_name'] //eğer post edilen değer varsa onu alsın yoksa halen kayıtlı ve veritabanında bulunan kayıt yerine geçsin?>">
                    </div>
                </li>
                <li>
                    <label>E-Posta</label>
                    <div class="form-content">
                        <input type="text" name="user_email"
                               value="<?= post('user_email') ? post('user_email') : $row['user_email'] ?>">
                    </div>
                </li>
                <li>
                    <label>Rütbe</label>
                    <div class="form-content">
                        <select name="user_rank">
                            <option value="">- Rütbe Seçin -</option>
                            <?php foreach (user_ranks() as $id => $rank):?>
                                <option <?=(post('user_rank') ? post('user_rank') : $row['user_rank']) == $id ? ' selected' : null?> value="<?= $id ?>"><?= $rank ?></option>
                            <?php endforeach; //eğer post edilen değer varsa onu yaz yoksa veritabanındaki değerni çek ?>
                        </select>
                    </div>
                </li>
                <li>
                    <label>İzinler</label>
                    <div class="form-content">
                        <div class="permissions">
                            <?php foreach ($menus as $url => $menu): //menü listesi?>
                                <div>
                                    <h3><?= $menu['title'] //menü başlıklarını yazdırıyoruz?></h3>
                                    <div class="list">
                                        <?php foreach ($menu['permissions'] as $key => $val): //menü altındaki izinleri döngüye sokuyoruz?>
                                            <label>
                                                <input <?=(isset($permissions[$url][$key]) && $permissions[$url][$key] == 1 ? ' checked' : null)?> name="user_permissions[<?=$url?>][<?=$key?>]" value="1" type="checkbox">
                                                <?=$val //izinler içerisinde url key var ise ve bunun değeri 1 e eşitse checked yap yoksa null değer alsın ?>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <style>
                        .permissions {
                            border: 1px solid #ccc;
                            background: #fff;
                            max-width: 400px;
                            padding: 10px;
                        }

                        .permissions h3 {
                            font-weight: bold;
                        }
                        .permissions .list{
                            padding-bottom: 15px;
                        }
                        .permissions div:last-child .list {
                            padding-bottom: 0;
                        }
                        .permissions .list label {
                            float: none !important;
                            display: inline-block;
                            width: auto !important;
                            font-weight: normal !important;
                            margin-right: 10px;
                        }
                    </style>
                </li>
                <li class="submit">
                    <button name="submit" value="1" type="submit">Kaydet</button>
                </li>
            </ul>
        </form>
    </div>

<?php require admin_view('static/footer') ?>