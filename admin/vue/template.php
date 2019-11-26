<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $titlePage ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./public/css/admin.css">
</head>
<body>

<header>
    <?php require 'navbarSecondaireView.php'; ?>
</header>

<section class="bloc-global">

    <?php require 'navbarView.php'; ?>

    <section class="bloc-central">

        <main>
            
            <?php
            if($_GET['action'] == 'accueil') {
                require 'globalInformationsView.php';
            }

            if(isset($content)) {
                echo $content;
            }
            else {
                throw new Exception('Aucun contenu présent');
            }
            ?>


        </main>
    </section>

</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.tiny.cloud/1/pkcb2owexbjw04wblka9y74zkcd23llt331bvyv4wbjusnp1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="./public/js/admin.js"></script>
</body>
</html>
