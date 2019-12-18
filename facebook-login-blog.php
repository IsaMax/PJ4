<?php
 include('config.php');

$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();


if(isset($_COOKIE['user_image']) AND isset($_COOKIE['user_name'])) {

    //Si on est connecté, on stocke les infos de cookies dans une session
    session_start();
    $_SESSION['user_image'] = $_COOKIE['user_image'];
    $_SESSION['user_name'] = $_COOKIE['user_name'];


    // Ramène directement au formulaire de commentaire après identification facebook
    if(isset($_COOKIE['chapitre'])) {

        if(isset($_COOKIE['id_parent'])) {

            $desTemp = $_COOKIE["id_parent"];
            setcookie('id_parent');
            unset($_COOKIE['id_parent']);

            header('Location: histoire/chapitre-'.$_COOKIE["chapitre"].'-'.$desTemp);
        }
        else {
            $desTemp = $_COOKIE["chapitre"];
            setcookie('chapitre');
            unset($_COOKIE['chapitre']);

            header('Location: histoire/chapitre-'.$desTemp);
        }
    }

}
else if(isset($_GET['code']))
{
    if(isset($_SESSION['access_token']))
    {
        $access_token = $_SESSION['access_token'];

    }
    else
    {
       
        $access_token = $facebook_helper->getAccessToken();

        $_SESSION['access_token'] = $access_token;

        $facebook->setDefaultAccessToken($_SESSION['access_token']);

    }

    $_SESSION['user_id'] = '';
    $_SESSION['user_name'] = '';
    $_SESSION['user_image'] = '';

    $graph_response = $facebook->get("/me?fields=name,email", $access_token);

    $facebook_user_info = $graph_response->getGraphUser();

    if(!empty($facebook_user_info['id']))
    {
        $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';

        setcookie('user_image', $_SESSION['user_image'], time()+365*24*3600, null, null, false, true );
    }

    if(!empty($facebook_user_info['name']))
    {
        $_SESSION['user_name'] = $facebook_user_info['name'];

        setcookie('user_name', $_SESSION['user_name'], time()+365*24*3600, null, null, false, true );
    }
}
else
{
    $facebook_login_url = $facebook_helper->getLoginUrl('https://maxime.agences.tw/blog/');

  // pour transmettre toute l'url générée de fb via un get on transform le & en %26
    $facebook_login_url_modif = str_replace('&', '%26', $facebook_login_url);

    //Avant de se diriger vers fb, on envoie la requête à oauth pour créer des cookies
    $facebook_login_btn = '<a class="btn-connexion-fb" href="/blog/oauth.php?chapitre='.$_GET["chapitre"].'&url='.$facebook_login_url_modif.'"><i class="fa fa-facebook-official"></i><span>Connectez-vous pour commenter !</span></a>';


}
