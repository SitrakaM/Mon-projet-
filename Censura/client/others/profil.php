<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img" href="../images/icon.png">
    <link rel="stylesheet" href="../style/css/login.css">
    <link rel="stylesheet" href="../style/css/video.css">
    <link rel="stylesheet" href="../style/css/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="../style/css/fontawesome-free-6.4.0-web/css/v4-shims.css">
    <link rel="stylesheet" href="../style/css/index .css">
    <link rel="stylesheet" href="../style/css/ajouter.css">
    <title>Censura</title>
    <script src="../style/js/jquery-3.7.0.min.js"></script>

</head>

<body>
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
                <a class="small" href="apropos.php" id="apropos">
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



    <section class="home-section">

        <div id="Bbody">

            <div class="containeR">

                <form action="valide_profile.php" enctype="multipart/form-data" method="post">

                    <div class="importation" style="display:flex;">
                        <h1>Importer votre image</h1>
                        <div className="file-import">
                            <input type="file" required name="img" />
                            <span class="import">
                                importer<i class="fa fa-video"></i>
                            </span>
                            <span class="importcheck">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <button type="submit" name="go" class="modifprof">Modifier</button>
                    </div>


                </form>

                <script src="../style/js/ajouter.js"></script>
            </div>

        </div>


    </section>

    <!--script down-->
    <script src="../js/sidebar.js"></script>
</body>

</html>