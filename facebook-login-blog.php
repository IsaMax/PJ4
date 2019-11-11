<?php
 include('config.php');

$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();


if(isset($_COOKIE['user_image']) AND isset($_COOKIE['user_name'])) {

    session_start();
    $_SESSION['user_image'] = $_COOKIE['user_image'];
    $_SESSION['user_name'] = $_COOKIE['user_name'];

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
    
    // Render Facebook login button
    $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'"><img src="public/images/log-fb.png" width="300" height="auto" /></a></div>';
}

/* if(isset($facebook_login_url))
{
    echo $facebook_login_url;
}
else
{
    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> '.$_SESSION['user_name'].'</h3>';

    echo '<h3></h3><a href="logout.php">Logout</h3></div>';
}  */