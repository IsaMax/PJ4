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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/pj4.css">
</head>
<body>

    <header>
        <?php require 'view/navbar/navbarView.php'; ?>
    </header>

    <main>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        
                            <?= $placeStories; ?>
         
                    </div>

                    <!--  PARTIE DROITE -->
                    <div class="col-md-4">
                        <div class="bloc-items-right">

                            <?= $placeRecentStories; ?>

                            <?= $placeLastComments; ?>

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
</body>
</html>
