<?php ob_start(); ?>
<div class="bloc-items-left">
    <div class="image-head">
        <img src="public/images/paque.jpg" alt="">
    </div>

    <div class="article">
        <h1><?= $chapterData['titre']; ?></h1>
        <div class="content-body">
            <?= $chapterData['contenu']; ?>
            <hr>
            <div class="bloc-arrow">
                <div class="row">
            
                    <div class="col-md-6">
                    <?php if(empty($chapterPreviousTitle)) {
                            echo '';
                         }
                         else {
                             ?>
                            <div class="arrow-left" title="chapitre précédent">
                            <i>&#60;</i>
                            <p class="title-previous"><a href="index.php?action=histoire&amp;chapitre=<?= $chapterPreviousTitle['id']?>">
                            <?= $chapterPreviousTitle['titre']; ?>
                            </a></p>
                            <p class="legend">previous post</p>
                        </div>
                             <?php
                         }?>
                        
                    </div>

                    <div class="col-md-6">
                    <?php if(empty($chapterNextTitle)) {
                            echo '';
                         }
                         else {
                             ?>
                        <div class="arrow-right" title="chapitre suivant">
                                <i>&#62;</i>
                            <p class="title-next"><a href="index.php?action=histoire&amp;chapitre=<?= $chapterNextTitle['id']?>">
                            <?= $chapterNextTitle['title']; ?></a></p>
                            <p class="legend">next post</p>
                        </div>
                       <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $arrowesPart = ob_get_clean();
require 'view/template.php'; ?>