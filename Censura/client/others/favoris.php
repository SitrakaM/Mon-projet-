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
                    <i class="fa fa-home"></i>
                    <span class="link_name">Accueil</span>
                </a>
                <span class="tooltip">Accueil</span>
            </li>

            <li>
                <a class="small" href="favoris.php" id="favris">
                    <i class="fa-solid fa-heart" style="color:rgb(6, 0, 43);font-size: 30px;"></i>
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

                <?php
                require("../../others/DBConnection.php");
                if (isset($_GET["rem"])) {
                    $sql = "DELETE FROM favoris WHERE Id_Fav=" . $_GET['rem'];
                    mysqli_query($db, $sql);
                    header("Location: favoris.php");
                    ob_end_flush();
                }
                $sql = "SELECT * FROM favoris INNER JOIN publications WHERE favoris.Id_Pub= publications.Id_Pub AND FAVORIS.Id=" . $_SESSION['cl_id'];
                $res = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<div class='boX' style='--i: 0'><div class='contenT'><div class='videoo'>";
                    echo "<video src='../../videos/" . $row["Lien"] . "' controls></video></div>";
                    echo "<div class='infoo'><a href='favoris.php?rem=" . $row['Id_Fav'] . "' class='favoris'>Retirer</a><br><p  class='pinfotitre' onclick='apparaitre(accueilmodal,'flex')'>" . $row["Titre"] . "</p></div></div></div>";
                }
                ?>


            </div>

        </div>


    </section>

    <!--script down-->
    <script src="../js/sidebar.js"></script>
</body>

</html>