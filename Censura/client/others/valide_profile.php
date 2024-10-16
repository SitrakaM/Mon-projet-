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
                <a class="small" href="contact.php" id="contact">
                    <i class="fa fa-phone"></i>
                    <span class="link_name">Contact</span>
                </a>
                <span class="tooltip">Contact</span>
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
    <?php
    function upload_video($zavatra)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_FILES[$zavatra])) {
                $targetDir = "../../videos/"; // Répertoire de destination où vous souhaitez stocker la vidéo
                $targetFile = $targetDir . basename($_FILES[$zavatra]["name"]);

                // Vérifiez le type de fichier (vous pouvez définir vos propres restrictions)
                $videoFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
                if (in_array($videoFileType, array("mp4", "avi", "mov", "mkv"))) {
                    if (move_uploaded_file($_FILES[$zavatra]["tmp_name"], $targetFile)) {
                    } else {
                        echo "Une erreur est survenue lors de l'upload de la vidéo. ";
                    }
                    if ($_FILES[$zavatra]["error"] == UPLOAD_ERR_INI_SIZE) {
                        echo "<BR>PROBLEME DE TAILLE";
                    }
                } else {
                    echo "Seuls les fichiers vidéo au format MP4, AVI, MOV et MKV sont autorisés.";
                }
            } else {
                echo "Aucune vidéo n'a été téléchargée ou une erreur s'est produite.";
            }
        } else {
            echo  $_FILES[$zavatra]["error"];
        }
    }
    function upload_sary($zavatra)
    {
        $name = $_FILES[$zavatra]['name'];
        $tmp_name = $_FILES[$zavatra]['tmp_name'];
        $position = strpos($name, ".");
        $fileextension = substr($name, $position + 1);
        $fileextension = strtolower($fileextension);
        if (isset($name)) {
            $path = "../../images/";
            if (empty($name)) {
            } else if (move_uploaded_file($tmp_name, $path . $name)) {
            }
        };
    }

    if (isset($_POST['go'])) {
        //var_dump($_SESSION);
        require('../../others/DBConnection.php');
        $profil = $_FILES['img']['name'];
        $sql = "UPDATE artiste SET Profil ='" . $profil . "' WHERE Id=" . $_SESSION['cl_id'] . "";
        mysqli_query($db, $sql);
        $_SESSION["cl_profil"] = $profil;
        upload_sary('img');
    }


    ?>
    <section class="home-section">

        <div id="Bbody">

            <div class="containeR">

                <form action="#">
                    <div class="verification">
                        <h2>Photo de profil mis à jour</h2>
                        <i class="fa fa-check-circle"></i>
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