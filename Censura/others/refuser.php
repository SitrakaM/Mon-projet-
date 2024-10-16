<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img" href="../images/icon.png">
    <!-- <link rel="stylesheet" href="../style/css/login.css"> -->
    <link rel="stylesheet" href="../client/style/css/video.css">
    <link rel="stylesheet" href="../style/css/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="../style/css/fontawesome-free-6.4.0-web/css/v4-shims.css">
    <link rel="stylesheet" href="../client/style/css/index .css">
    <title>Admin Censura</title>
    <script src="../style/js/jquery-3.7.0.min.js"></script>

</head>

<body>
    <!-- DEBUT SIDEBAR -->
    <div class="slidebar">

        <ul class="nav-list">

            <li>
                <a href="accueil.php">
                    <i class="fa fa-home"></i>
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
                    <i class="fa fa-remove" style="color:rgb(6, 0, 43);font-size: 30px;"></i>
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
                $sql = "SELECT * FROM refuser INNER JOIN publications WHERE publications.Id_Pub=refuser.id_video ORDER BY Id_ref DESC";
                $res = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<div class='boX' style='--i:0;'><div class='contenT'><div class='videoo'>";
                    echo "<video src='../videos/", $row["Lien"], "' controls></video>";
                    echo "</div><div class='infoo'></div></div></div>";
                }
                ?>
            </div>

        </div>


    </section>


    <!--script down-->
    <script src="..style/js/sidebar.js"></script>
</body>

</html>