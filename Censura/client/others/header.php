<?php
session_start();
?>
<div class="slidebar">

    <ul class="nav-list">


        <li id="pdp">
            <a class="small" href="profil.php" id="user">
                <img src="../../images/<?php echo $_SESSION["cl_profil"]; ?>" class="pdp" alt=""></img>
                <span class="link_name">Profil</span>
            </a>
            <span class="tooltip">Profil</span>
        </li>

        <li>
            <a class="small" href="accueil.php" id="accueil">
                <i class="fa fa-home"></i>
                <span class="link_name">Accueil</span>
            </a>
            <span class="tooltip">Accueil</span>
        </li>

        <li>
            <a class="small" href="favoris.php" id="favris">
                <i class="fa-solid fa-heart"></i>
                <span class="link_name">Favoris</span>
            </a>
            <span class="tooltip">Favoris</span>
        </li>

        <li>
            <a class="small" href="ajouter.php" id="ajouter">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <span class="link_name">Ajouter</span>
            </a>
            <span class="tooltip">Ajouter</span>
        </li>

        <li>
            <a class="small" href="#" id="apropos">
                <i class="fa-solid fa-circle-info"></i>
                <span class="link_name">A propos</span>
            </a>
            <span class="tooltip">A propos</span>
        </li>




        <li>
            <a class="small" href="../index.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="link_name">Se déconnecter</span>
            </a>
            <span class="tooltip">Se déconnecter</span>
        </li>
    </ul>
</div>