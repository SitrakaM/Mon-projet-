<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img" href="../images/">
    <link rel="stylesheet" href="../style/css/login.css">
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
                <a href="../client/index.php">
                    <i class="fa fa-user-friends"></i>
                    <span class="link_name">Artiste</span>
                </a>
                <span class="tooltip">Artiste</span>
            </li>

            <li>
                <a href="../index.html">
                    <i class="fa fa-user-gear"></i>
                    <span class="link_name">Administrateur</span>
                </a>
                <span class="tooltip">Administrateur</span>
            </li>

        </ul>
    </div>

    <!-- FIN SIDEBAR -->



    <section class="home-section">

        <!--login form start-->
        <div class="bobdy">
            <div class="wrapper">

                <div class="form-wrapper sign-up">
                </div>

                <div class="form-wrapper sign-in">
                    <form action="#">

                        <?php
                        session_start();
                        $nom = $_POST["nom"];
                        $mdp = $_POST["password"];
                        $sql = "SELECT * FROM admin WHERE utilisateur ='" . $nom . "' AND mdp='" . $mdp . "'";
                        if (isset($_POST["valider"])) {
                            require('DBConnection.php');
                            try {
                                $res = mysqli_query($db, $sql);
                                $cpt = 0;
                                while ($row = mysqli_fetch_array($res)) {
                                    $cpt++;
                                    $_SESSION["id"] = $row["id"];
                                    $_SESSION["nom"] = $row["nom"];
                                    $_SESSION["prenom"] = $row["prenom"];
                                    $_SESSION["utilisateur"] = $row["utilisateur"];
                                }
                                if ($cpt == 1) {
                                    echo "<h2 class='sig-h2'>SE CONNECTER EN TANT QUE ", $_SESSION["nom"], " ", $_SESSION["prenom"], "?</h2>";
                                    echo '<div class="sign-link"><p><a class="signUp-link" href="accueil.php">Valider</a></p></div>';
                                } else {
                                    session_destroy();
                                    echo "<h2 class='sig-h2'>VOTRE COMPTE N'A PAS ETE PROUVE. VERIFIEZ LES INFORMATIONS SAISIES</h2>";
                                    echo '<div class="sign-link"><p><a class="signUp-link" href="../index.html" color="red">Recommencer</a></p></div>';
                                }
                            } catch (Exception $e) {
                                print("Une erreur d'est produite");
                            }
                        }

                        ?>

                    </form>
                </div>
            </div>
            <script src="style/js/LS paper.js"></script>

        </div>


    </section>

    <!--script down-->
    <script src="../js/sidebar.js"></script>
</body>

</html>