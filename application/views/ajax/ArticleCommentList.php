    <div class="artCommentorFrame">
        <div class="artCommentorTitle">Add a comment</div>
        <div class="artCommentorText">
            <textarea class="artCommentorX" id="articleCommentorText"></textarea>
        </div>
        <div class="artCommentorBottom">
            <input type="button" class="" id="articleCommentorBtn" value="Post"></button>
        </div>
    </div>

<?php
foreach ($comments as $comm)
{
?>
<div class="artCommentListItem" id="articleComment<?= $comm->getID(); ?>">
    <div class="artCommentListItemHeader">
        <div class="artCommentListItemDate"><?= $comm->getCommentDate()->format('Y-m-d H:i:s'); ?></div>
        <div class="artCommentListItemAuthor"><?= $comm->getUser()->getDisplayName(); ?></div>
    </div>
    <div class="artCommentorText">
        <?= $comm->getCommentText(); ?>
    </div>
</div>

<?php } ?>