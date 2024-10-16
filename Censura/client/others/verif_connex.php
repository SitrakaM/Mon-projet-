<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="img" href="../images/icon.png" />
  <link rel="stylesheet" href="../style/css/login.css" />
  <link rel="stylesheet" href="../style/css/fontawesome-free-6.4.0-web/css/all.css" />
  <link rel="stylesheet" href="../style/css/fontawesome-free-6.4.0-web/css/v4-shims.css" />
  <link rel="stylesheet" href="../style/css/index .css" />
  <title>Censura</title>
  <script src="../style/js/jquery-3.7.0.min.js"></script>
</head>

<body>
  <!-- DEBUT SIDEBAR -->

  <div class="slidebar">
    <ul class="nav-list">
      <li>
        <a href="../index.php">
          <i class="fa fa-caret-left" style="color: rgb(6, 0, 43); font-size: 30px"></i>
          <span class="link_name">Retour</span>
        </a>
        <span class="tooltip">Retour</span>
      </li>

      <!-- <li>
          <a href="../../index.html">
            <i class="fa fa-user-gear"></i>
            <span class="link_name">Administrateur</span>
          </a>
          <span class="tooltip">Administrateur</span>
        </li> -->
    </ul>
  </div>

  <!-- FIN SIDEBAR -->

  <section class="home-section">
    <!--login form start-->

    <div class="bobdy">
      <div class="wrapper">
        <div class="form-wrapper sign-up">
          <form action="#">

            <?php
            session_start();
            $user = $_POST["user"];
            $mdp = $_POST["mdp"];
            $sql = "SELECT * FROM artiste WHERE Pseudo ='" . $user . "' AND Mdp='" . $mdp . "'";
            if (isset($_POST["valider"])) {
              require('../../others/DBConnection.php');
              try {
                $res = mysqli_query($db, $sql);
                $cpt = 0;
                while ($row = mysqli_fetch_array($res)) {
                  $cpt++;
                  $_SESSION["cl_id"] = $row["Id"];
                  $_SESSION["cl_pseudo"] = $row["Pseudo"];
                  $_SESSION["cl_mail"] = $row["Mail"];
                  $_SESSION["cl_profil"] = $row["Profil"];
                }
                if ($cpt == 1) {
                  echo "<h1 class='sig-h2'>SE CONNECTER EN TANT QUE ", $_SESSION["cl_pseudo"], "?</h1>";
                  echo '<div class="sign-link"><p><a class="signUp-link" href="accueil.php">Valider</a></p></div>';
                } else {
                  session_destroy();
                  echo "<h1 class='sig-h2'>VOTRE COMPTE N'A PAS ETE PROUVE. VERIFIEZ LES INFORMATIONS SAISIES</h1>";
                  echo "<div class='sign-link'><p><a class='signUp-link' href='../index.php'>Recommencer</a></p></div>";
                }
              } catch (Exception $e) {
                print("Une erreur d'est produite");
              }
            }

            ?>

          </form>
        </div>
      </div>
      <script src="../style/js/LS paper.js"></script>
    </div>
    <!--login form end-->
  </section>

  <!--script down-->
  <script src="../style/js/sidebar.js"></script>
</body>

</html>