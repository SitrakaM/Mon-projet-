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
  <?php
  session_start();
  session_destroy();
  ?>
  <!-- DEBUT SIDEBAR -->

  <div class="slidebar">
    <ul class="nav-list">
      <li>
        <a href="index.php">
          <i class="fa fa-user-friends" style="color: rgb(6, 0, 43); font-size: 30px"></i>
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
          <form action="others/verif_inscript.php" method="POST">
            <h2 class="sig-h2">Inscription</h2>

            <div class="input-group">
              <input type="text" name="user" required />
              <label for="">Nom d'utilisateur</label>
            </div>

            <div class="input-group">
              <input type="email" required name="mail" />
              <label for="">Email</label>
            </div>

            <div class="input-group">
              <input type="password" required name="mdp" />
              <label for="">Mot de passe</label>
            </div>

            <button type="submit" class="btn" name="valider">S'inscrire</button>

            <div class="sign-link">
              <p>
                J'ai déja un compte
                <a class="signIn-link" href="#">se connecter</a>
              </p>
            </div>
          </form>
        </div>

        <div class="form-wrapper sign-in">
          <form action="others/verif_connex.php" method="POST">
            <h2 class="sig-h2">Connexion</h2>

            <div class="input-group">
              <input type="text" name="user" required />
              <label for="">Nom d'utilisateur</label>
            </div>

            <div class="input-group">
              <input type="password" name="mdp" required />
              <label for="">Mot de passe</label>
            </div>

            <button type="submit" class="btn" name="valider">
              Se connecter
            </button>

            <div class="sign-link">
              <p>
                Je n'ai pas encore de compte
                <a class="signUp-link" href="#">s'inscrire</a>
              </p>
            </div>
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