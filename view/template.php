<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $titlePage ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Développement du projet 4 OpenClassroom par Maxime Isambert en php">
    <meta name="author" content="Maxime Isambert">


    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="public/css/pj4.css">
    <link rel="stylesheet" href="public/css/responsive.css">
</head>
<body>


    <header>
        <?php require 'view/navbar/navbarView.php';

         if(isset($slider)) {
            echo $slider;
         }
         ?>
    </header>

    <main>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        
                        <?php 
                            if(isset($firstContentLeft)) {
                                echo $firstContentLeft;
                            }

                            if(isset($arrowesPart)) {
                                echo $arrowesPart;
                            }

                            if(isset($secondContentLeft)) {
                                echo $secondContentLeft;
                            }
                            else {
                                if($_GET['action'] =='chapitre')
                                     echo 'aucun commentaire';
                            }
                        ?>
        
                    </div>

                    <!--  PARTIE DROITE -->
                    <div class="col-lg-4">
                        <div class="bloc-items-right">

                            <?php 
                                if(isset($firstContentRight)) {
                                    echo $firstContentRight;
                                }

                                if(isset($secondContentRight)) {
                                    echo $secondContentRight;
                                }  
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php require 'view/footer/footerView.php'; ?>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="public/js/main.js"></script>
</body>
</html>
