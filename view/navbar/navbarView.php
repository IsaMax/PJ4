<nav class="nav">

    <a class="btn_menu" href="#"><span class="hamburger-menu"></span></a>

    <ul>
        <li class="logo">
            <a href="/blog/accueil">Forteroche</a>
        </li>
        <li>
            <a href="/blog/accueil">Accueil</a>
        </li>
        <li>
            <a href="/blog/histoire/chapitre-17">L'histoire</a>
        </li>
        <li>
            <a href="/blog/contact">Contact</a>
        </li>

        <?php 
        if(isset($_SESSION['user_name'])) {

            echo '<li><a href="/blog/se-deconnecter">se déconnecter</a></li>';
        }
        ?>
    </ul>

</nav>
