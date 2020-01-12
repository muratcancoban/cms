<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Konular
            <?php if (permission('posts', 'add')): ?>
                <a href="<?= admin_url('add-post') ?>">Yeni Ekle</a>
            <?php endif; ?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Konu Başlığı</th>
                <th class="hide">Yazım Tarihi</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td>
                        <?= $row['post_title'] ?>
                    </td>
                    <td class="hide" title="<?=$row['post_date']?>">
                        <?= timeConvert($row['post_date']) ?>
                    </td>
                    <td>
                        <?php if (permission('posts', 'edit')): ?>
                            <a href="<?= admin_url('edit-post?id=' . $row['post_id']) ?>"
                               class="btn">Düzenle</a>
                        <?php endif; ?>
                        <?php if (permission('posts', 'delete')): ?>
                            <a onclick="return confirm('Silme işlemine devam ediyorsunuz?')"
                               href="<?= admin_url('delete?table=posts&column=post_id&id=' . $row['post_id']) ?>"
                               class="btn">Sil</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php if ($totalRecord > $pageLimit): ?>
    <div class="pagination">
        <ul>
            <?= $db->showPagination(admin_url(route(1) . '?' . $pageParam . '=[page]')) ?>
        </ul>
    </div>
<?php endif; ?>

<?php require admin_view('static/footer') ?>