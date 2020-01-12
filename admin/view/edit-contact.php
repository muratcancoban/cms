<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            İletişim Mesajları
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="box-container container-50">

    <div class="box-">

        <form action="" method="post" class="form label">
            <ul>
                <li>
                    <label>Ad-Soyad</label>
                    <div class="form-content" style="padding-top: 12px">
                        <?= $row['contact_name'] ?>
                    </div>
                </li>
                <li>
                    <label>E-posta</label>
                    <div class="form-content" style="padding-top: 12px">
                        <?= $row['contact_email'] ?>
                    </div>
                </li>
                <?php if ($row['contact_phone']): ?>
                    <li>
                        <label>Telefon</label>
                        <div class="form-content" style="padding-top: 12px">
                            <?= $row['contact_phone'] ?>
                        </div>
                    </li>
                <?php endif; ?>
                <li>
                    <label>Konu</label>
                    <div class="form-content" style="padding-top: 12px">
                        <?= $row['contact_subject'] ?>
                    </div>
                </li>
                <li>
                    <label>Mesaj</label>
                    <div class="form-content" style="padding-top: 12px">
                        <?= nl2br($row['contact_message']) //n12br alt satıra geçilme varsa daha güzgün görüntüleme alırız?>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</div>

<?php require admin_view('static/footer') ?>