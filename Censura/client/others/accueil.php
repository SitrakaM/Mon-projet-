<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img" href="../images/icon.png">
    <link rel="stylesheet" href="../style/css/login.css">

    <link rel="stylesheet" href="../style/css/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="../style/css/fontawesome-free-6.4.0-web/css/v4-shims.css">
    <link rel="stylesheet" href="../style/css/index .css">
    <link rel="stylesheet" href="../style/css/recherche.css">
    <link rel="stylesheet" href="../style/css/video.css">
    <link rel="stylesheet" href="../style/css/modal.css">
    <title>Censura</title>
    <script src="../style/js/jquery-3.7.0.min.js"></script>

</head>

<body>
    <?php
    ob_start();
    ?>
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
                    <i class="fa fa-home" style="color:rgb(6, 0, 43);font-size: 30px;"></i>
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

        <!-- DEBUT RECHERCHE -->

        <div class="recherche">
            <form action="accueil.php" method="get">
                <input type="search" placeholder="Recherche" name="val">
                <button type="submit" class="re" name="search"><i class="fa fa-search" type="submit"></i></button>
            </form>
            <div class="genres">
                <ul>
                    <li><a href="accueil.php?genre=Fahiny">Fahiny</a></li>
                    <li><a href="accueil.php?genre=Kilalaka">Kilalaka</a></li>
                    <li><a href="accueil.php?genre=Salegy">Salegy</a></li>
                    <li><a href="accueil.php?genre=Rap">Rap</a></li>
                    <li><a href="accueil.php?genre=Danchall">Danchall</a></li>
                    <li><a href="accueil.php?genre=Rock">Rock</a></li>
                    <li><a href="accueil.php?genre=Acoustique">Acoustique</a></li>
                    <li><a href="accueil.php?genre=RNB">RNB</a></li>
                    <li><a href="accueil.php?genre=Autre">Autre</a></li>
                </ul>

            </div>

        </div>


        <!-- FIN RECHERCHE -->


        <div id="Bbody">

            <div class="containeR">
                <?php
                require("../../others/DBConnection.php");
                $sql = "SELECT * FROM approuver INNER JOIN publications WHERE approuver.id_video= publications.Id_Pub";
                if (isset($_GET['search'])) {
                    $sql = "SELECT * FROM approuver INNER JOIN publications WHERE approuver.id_video= publications.Id_Pub  AND publications.Titre LIKE '%" . $_GET['val'] . "%'";
                }
                if (isset($_GET['genre'])) {
                    $sql = "SELECT * FROM approuver INNER JOIN publications WHERE approuver.id_video= publications.Id_Pub  AND publications.Genre='" . $_GET['genre'] . "' ORDER BY approuver.id_video DESC";
                }
                $res = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<div class='boX' style='--i: 0'><div class='contenT'><div class='videoo'>";
                    echo "<video src='../../videos/" . $row["Lien"] . "' controls></video></div>";
                    echo "<div class='infoo'><a href='accueil.php?fav=" . $row['Id_Pub'] . "' class='favoris'>Favoris</a><p class='pinfotitre' onclick='apparaitre(accueilmodal,'flex')'>" . $row["Titre"] . "</p></div></div></div>";
                }
                if (isset($_GET['fav'])) {
                    $req = "SELECT * FROM favoris WHERE Id_Pub=" . $_GET['fav'] . " AND Id=" . $_SESSION['cl_id'];
                    $exec = mysqli_query($db, $req);
                    $cpt = 0;
                    $id = 0;
                    while ($row = mysqli_fetch_array($exec)) {
                        $cpt++;
                        $id = $row['Id_Fav'];
                    }
                    if ($cpt == 0) {
                        $req2 = "INSERT INTO favoris VALUES(NULL," . $_SESSION['cl_id'] . "," . $_GET['fav'] . ")";
                        mysqli_query($db, $req2);
                        header("Location: accueil.php");
                        ob_end_flush();
                    }
                } ?>

            </div>

        </div>




    </section>
    <!-- <script>
        let fav = document.querySelector('.favoris');
        let pf = document.querySelector('.pinfotitre');
    </script> -->

    <!--script down-->
    <script src="../style/js/ajouter.js"></script>
    <script src="../style/js/sidebar.js"></script>
    <!-- <script>
        let favoris = document.querySelector('.favoris');
        favoris.addEventListener('mouseover', (e) => {
            e.preventDefault();
            favoris.innerHTML = "favoris";
        })
        favoris.addEventListener('mouseout', (e) => {
            e.preventDefault();
            favoris.innerHTML = "♥";
        })
    </script> -->
</body>

</html>