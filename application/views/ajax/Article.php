<?php

//header('Content-Type: text/html; charset=ISO-8859-15');
?>

<div class="artSuperHeader">
    <div class="artDomain"><?= ($article->getDossier()) ? $article->getDossier()->getDossierName() : ""; ?></div>
    <?= $articleMenu ?>
</div>
<div class="artHeader">
    <div class="artTitle"><?php echo $article->getTitle();?></div>
    <div class="artAuthor"><?php echo $article->getUser()->getFirstname();?> <?php echo $article->getUser()->getLastname();?></div>
    <div class="artDate"><?php echo $article->getDate()->format('Y-m-d H:i:s');?></div>
</div>
<div class="artContent"><?php echo $article->getContent();?></div>





