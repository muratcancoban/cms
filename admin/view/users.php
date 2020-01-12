<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Üyeler
            <!--            <a href="#">Add New</a>-->
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Kullanıcı Adı</th>
                <th class="hide">E-posta</th>
                <th class="hide">Kayıt Tarihi</th>
                <th class="hide">Rütbe</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): //üye satırları?>
                <tr>
                    <td>
                        <a href="<?= admin_url('edit-user?id=' . $row['user_id']) ?>" class="title">
                            <?= $row['user_name'] ?>
                        </a>
                    </td>
                    <td class="hide">
                        <?= $row['user_email'] ?>
                    </td>
                    <td class="hide">
                        <?= $row['user_date'] ?>
                    </td>
                    <td class="hide">
                        <?= user_ranks($row['user_rank']) //user_ranks fonksiyonu içerisine id atandığında görünecek ?>
                    </td>
                    <td>
                    <?php if (permission('users', 'edit')): //users da edit var ise?>
                        <a href="<?= admin_url('edit-user?id=' . $row['user_id']) //veritabanında user_id aracılığıyla yapıyoruz?>" class="btn">Düzenle</a>
                        <?php endif; ?>
                        <?php if (permission('users', 'delete')): //delete actionu var ise?>
                        <a onclick="return confirm('Silme işlemine devam edilsin mi?')"
                           href="<?= admin_url('delete?table=users&column=user_id&id=' . $row['user_id']) ?>"
                           class="btn">Sil</a>
                           <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php if ($totalRecord > $pageLimit): //eğer toplam kayıt sayım büyükse sayfalamayı göster?>
    <div class="pagination">
        <ul>
            <?= $db->showPagination(admin_url(route(1) . '?' . $pageParam . '=[page]')) //(kaç sayfa olduğu 1-2 vb)sayfalama işlemi burada yapılıyor?>
        </ul>
    </div>
<?php endif; ?>

<?php require admin_view('static/footer') ?>