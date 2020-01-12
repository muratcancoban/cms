<div class="media comment-box">
    <div class="media-left">
        <a href="#">
            <img class="img-responsive user-photo"
                 src="<?=get_gravatar($comment['comment_email'])?>">
        </a>
    </div>
    <div class="media-body">
        <h6 class="media-heading">
            <?=$comment['comment_name'] //yazan?>
            <span style="color: #999; font-size: 12px; float: right;" title="<?=$comment['comment_date']?>">
                <?=timeConvert($comment['comment_date']) //tarih?>
            </span>
        </h6>
        <p>
            <?=$comment['comment_content'] //içerik yazılacak?>
        </p>
    </div>
</div>