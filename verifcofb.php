<?php

if(isset($_GET['url'])) {

    $urltemp = str_replace('&', '%26', $_GET['url']);

    echo '<a class="btn-connexion-fb" href="oauth.php?chapitre='.$_GET["chapitre"].'&id_parent='.$_GET["id_parent"].'&url='.$urltemp.'"><i class="fa fa-facebook-official"></i><span>Connectez-vous pour commenter !</span></a>';

}
