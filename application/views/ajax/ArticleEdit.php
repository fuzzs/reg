<?php

?>
<div class="artEditFrame">
    <div class="artEditTitle"><input type="text" class="articleTitle" id="frmArticleTitle" Value="<?= $articleTitle ?>"></div>
    <div class="artEditContent">
        <textarea id="frmArticleContent" class="taArticle"><?= $articleContent ?></textarea>
    </div>
    <div class="artEditBottom">
        <input id="frmArticlePost" type="button" class="" value="<?= $lbl['art_post_button']; ?>">
    </div>
</div>

<input type="Hidden" id="frmArticleId" Value="<?= $articleId ?>">