<nav class="nav">
    <ul>
        <li class="logo"> <a href="index.php">Forteroche</a></li>
        <li>
            <a href="index.php">Accueil</a>
        </li>
        <li>
            <a href="index.php?action=histoire">L'histoire</a>
        </li>
        <li>
            <a href="index.php?action=biographie">Biographie</a>
        </li>
        <li>
            <a href="index.php?action=contact">Contact</a>
        </li>

        <?php 
        if(isset($_SESSION['user_name'])) {

            echo '<li><a href="logout.php">se déconnecter</a></li>';
        }
        ?>
    </ul>
</nav>
