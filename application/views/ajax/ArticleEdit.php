<?php

?>
<br />
<div class="artSuperHeader">
    <div class="artDomain"><?= ($article->getDossier()) ? $article->getDossier()->getDossierName() : ""; ?></div>
    <?= $articleMenu ?>
</div>
<div class="artHeader">
    <div class="artEditTitle"><input type="text" class="articleTitle" id="frmArticleTitle" Value="<?= $article->getTitle(); ?>"></div>
    <div class="artAuthor"><?php echo $article->getUser()->getFirstname();?> <?php echo $article->getUser()->getLastname();?></div>
    <div class="artDate"><?php echo $article->getDate()->format('Y-m-d H:i:s');?></div>
</div>
<div class="artEditFrame">
    <div id="editPanel"></div>
    <div class="artEditContent">
        <textarea id="frmArticleContent" class="taArticle" disabled="true"><?= $article->getContent(); ?></textarea>
    </div>
    <div class="artEditBottom">
        <input id="frmArticlePost" type="button" class="" value="<?= $lbl['art_post_button']; ?>">
    </div>
</div>

<input type="Hidden" id="frmArticleId" Value="<?= $articleId ?>">
<script language="javascript">
//<![CDATA[
     var theEditor = new nicEditor();
     theEditor.setPanel('editPanel');
     theEditor.addInstance('frmArticleContent');
//]]>
</script>