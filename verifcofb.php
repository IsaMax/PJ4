<?php
session_start();

if(isset($_SESSION['user_name']) AND isset($_SESSION['user_image'])) {

    ?>

    <div class="js_form" style="3rem">
        <div>
            <div class="avatar avatar-now">
                <img src="<?=$_SESSION['user_image']?>" />
            </div>
        </div>
        <form action="index.php?action=histoire&chapitre=<?= $_GET['chapitre'] ?>&id_parent=<?= $_GET['id_parent'] ?>>" method="POST" id="answer">
            <p><textarea placeholder="Laissez un commentaire..." name="commentaire_rep"></textarea></p>
            <p><input type="submit" name="send-comment" id="send-answer" value="envoyer"></p>
        </form>
    </div>

    <?php
}
else {

    setcookie('chapitre', $_GET['chapitre'], time()+1*24*3600, null, null, false, true );
    $uri = $_SERVER['REQUEST_URI'];

    $parties = explode('|', $uri);

    echo '<a class="btn-connexion-fb" href="'.$parties[1].'"><i class="fa fa-facebook-official"></i><span>Connectez-vous pour commenter !</span></a>';
}