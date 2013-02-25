
<br>
<?php

foreach ($articles as $art)
{
?>

<div id="article<?= $art->getID(); ?>" class="artListItem">
    <div id="articleArr<?= $art->getID(); ?>" class="artListItemArr"></div>
    <div class="artListItemTitle"><?= $art->getTitle(); ?></div>
    <div class="artListItemAuthor"><b class="artListItemAuthor">Author: </b><?= $art->getUser()->getFirstname(); ?> <?= $art->getUser()->getLastname(); ?></div>
    <div class="artListItemDate"><b class="artListItemDate">Date: </b><?= $art->getDate()->format('Y-m-d H:i:s');?></div>
</div>

<?php } echo $user; ?>

