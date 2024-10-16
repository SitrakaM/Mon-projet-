<?php
session_start();
require("Mailer.php");
if (isset($_GET["ok"])) {
    require("DBCOnnection.php");
    $id = $_GET["ok"];
    $sql1 = "INSERT INTO approuver VALUES(NULL," . $id . "," . $_SESSION["id"] . ");";
    $sql2 = "UPDATE publications SET Statut=1 WHERE Id_Pub=" . $id;
    $sql3 = "SELECT * FROM publications INNER JOIN artiste WHERE artiste.Id=publications.id AND publications.Id_Pub=" . $id;
    mysqli_query($db, $sql1);
    mysqli_query($db, $sql2);
    $res = mysqli_query($db, $sql3);
    while ($row = mysqli_fetch_array($res)) {
        $nom = $row["Pseudo"];
        $email = $row["Mail"];
        $titre = $row["Titre"];
    }
    sendValidation($nom, $email, $titre);
    $newURL = "accueil.php";
    header('Location: ' . $newURL);
    exit();
}
if (isset($_GET["del"])) {
    require("DBConnection.php");
    $id = $_GET["del"];
    $sql1 = "INSERT INTO refuser VALUES(NULL," . $id . "," . $_SESSION["id"] . ");";
    $sql2 = "UPDATE publications SET Statut=1 WHERE Id_Pub=" . $id;
    $sql3 = "SELECT * FROM publications INNER JOIN artiste WHERE artiste.Id=publications.id AND publications.Id_Pub=" . $id;
    mysqli_query($db, $sql1);
    mysqli_query($db, $sql2);
    $res = mysqli_query($db, $sql3);
    while ($row = mysqli_fetch_array($res)) {
        $nom = $row["Pseudo"];
        $email = $row["Mail"];
        $titre = $row["Titre"];
    }
    sendRefus($nom, $email, $titre);
    $newURL = "accueil.php";
    header('Location: ' . $newURL);
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img" href="../images/">
    <!-- <link rel="stylesheet" href="../style/css/login.css"> -->
    <link rel="stylesheet" href="../client/style/css/video.css">
    <link rel="stylesheet" href="../style/css/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="../style/css/fontawesome-free-6.4.0-web/css/v4-shims.css">
    <!-- <link rel="stylesheet" href="../style/css/index .css"> -->
    <link rel="stylesheet" href="../client/style/css/index .css" />
    <title>Admin Censura</title>
    <script src="../style/js/jquery-3.7.0.min.js"></script>

</head>

<body>

    <!-- DEBUT SIDEBAR -->
    <div class="slidebar">

        <ul class="nav-list">

            <li>
                <a href="accueil.php">
                    <i class="fa fa-home" style="color:rgb(6, 0, 43);font-size: 30px;"></i>
                    <span class="link_name">Accueil</span>
                </a>
                <span class="tooltip">Accueil</span>
            </li>

            <li>
                <a href="aprouver.php">
                    <i class="fa fa-check"></i>
                    <span class="link_name">Aprouver</span>
                </a>
                <span class="tooltip">Aprouver</span>
            </li>

            <li>
                <a href="refuser.php">
                    <i class="fa fa-remove"></i>
                    <span class="link_name">Refuser</span>
                </a>
                <span class="tooltip">Refuser</span>
            </li>

            <li>
                <a href="../index.html">
                    <i class="fa fa-sign-out"></i>
                    <span class="link_name">Deconnecter</span>
                </a>
                <span class="tooltip">Deconnecter</span>
            </li>



        </ul>
    </div>
    <!-- FIN SIDEBAR -->


    <section class="home-section">

        <div id="Bbody">

            <div class="containeR">
                <?php
                require("DBConnection.php");
                $sql = "SELECT * FROM publications INNER JOIN artiste WHERE publications.Id=artiste.Id AND Statut=0 ORDER BY Id_Pub DESC";
                $res = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<div class='boX' style='--i:0;'><div class='contenT'><div class='videoo'>";
                    echo "<video src='../videos/", $row["Lien"], "' controls></video>";
                    echo "</div><div class='infoo' style='flex-direction:row'>";
                    echo "<a href='accueil.php?ok=", $row["Id_Pub"], "' class='approuver' style='font-size:12px;padding: 8px 15px 10px 15px;margin: 5px 5px 5px 5px;'>APPROUVER</a>";
                    echo "<a href='accueil.php?del=", $row["Id_Pub"], "' class='refuser' style='font-size:12px;padding: 8px 15px 10px 15px;margin: 5px 5px 5px 5px;'>REFUSER</a></div></div></div>";
                }
                ?>

            </div>

        </div>


    </section>

    <!--script down-->
    <script src="js/sidebar.js"></script>
</body>

</html>