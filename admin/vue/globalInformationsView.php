<div class="container-bloc-infos">

    <div class="bloc-total">
        <aside>
            <i class=" fa fa-users"></i>
        </aside>
        <div>
            <p class="texte-gros"> 18</p>
            <p class="texte-petit">visites au total</p>
        </div>
            <a href="#"></a>
    </div>

    <div class="bloc-total">
        <aside>
            <i class="fa fa-envelope <?php  if($rmrep['nbr_messages'] > 0) { echo 'message-vert'; } ?>"></i>
        </aside>
        <div>
            <p class="texte-gros <?php  if($rmrep['nbr_messages'] > 0) { echo 'message-vert'; } ?>"><?= $rmrep['nbr_messages']; ?></p>
            <p class="texte-petit <?php  if($rmrep['nbr_messages'] > 0) { echo 'message-vert'; } ?>">message(s)</p>
        </div>
        <a href="index.php?action=messages"></a>
    </div>

    <div class="bloc-total">
            <aside>
                <i class=" fa fa-ban <?php if($dsrep['signalement_coms'] > 0) { echo 'danger'; }?>"></i>
            </aside>
            <div>
                <p class="texte-gros <?php if($dsrep['signalement_coms'] > 0) { echo 'danger'; }?>" data-signalement=<?= $dsrep['signalement_coms']; ?>><?= $dsrep['signalement_coms']; ?></p>
                <p class="texte-petit <?php if($dsrep['signalement_coms'] > 0) { echo 'danger'; }?>">commentaire(s) signalé(s)</p>
            </div>
            <a href="index.php?action=signalement"></a>
    </div>

    <div class="bloc-total infos-temps">

        <div class="horloge">
            <span class="heure"></span>
            <span class="minute"></span>
            <span class="seconde"></span>
        </div>

    </div>
</div>