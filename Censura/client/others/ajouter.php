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
                    <i class="fa-solid fa-cloud-arrow-up" style="color:rgb(6, 0, 43);font-size: 30px;"></i>
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

                <form action="verification.php" method="POST" enctype="multipart/form-data">

                    <div class="acceptation">

                        <h1>Veuillez lire et accepter tous les termes avant de continuer le partage.</h1>
                        <p>
                            La censure a une importance très capital dans les hits qu'il ne faut
                            pas négliger , notre projet consiste a placé des censurés qui permet
                            de limiter et d'enlever les obscénité dans les hits Malagasy .<br> On
                            valoriser aussi la musique traditionnelle malagasy pour que
                            l'influence de notre culture soit mise en avant , car notre culture
                            est très riche et très coloré avec des divers traditions qui nous
                            différencie très largement des autres, mais aujourd'hui ce sont les
                            cultures étrangères qui dominent le plus dans notre pays à cause de la
                            mondialisation , et cette mondialisation et ces cultures étrangères
                            aussi ont apportées pas que des positive dans notre pays , il y a des
                            choses qui ne sont pas compatibles avec notre culture mais que c'est
                            tellement devenu normal aujourd'hui que les gens ne se rend pas compte
                            qu'il y a une énorme problème , surtout l'influence que cette anomalie
                            apporte aux jeunes <br>(les choses dont je parle c'est par exemple : les
                            drouges dans les clip américain,les filles qui sont presque nue, la
                            vie de gangster dans leur film et music ) .<br> Cette pour cela qu'on fait
                            ce projet pour préserver les jeunes et les éloignés des mauvais
                            influence des cultures étrangères aussi , mais le plus important c'est
                            de mettre en avant notre culture pour que ce soit à nous aussi
                            d'influence les autres nations .
                        </p>
                        <div class="checkbox">
                            <input type="checkbox" required onchange="check(this)" />

                            <label>J'accepte les termes et les politiques</label>
                        </div>

                        <span id="verdict" style="display:none" onclick="change(acceptation,importation)">suivant</span>

                    </div>

                    <div class="importation">
                        <h1>Importer votre video</h1>
                        <div className="file-import">
                            <input type="file" required name="video" onchange="change(imports,importcheck);apparaitre(suiv2,'block')" />
                            <span class="import">
                                importer<i class="fa fa-video"></i>
                            </span>
                            <span class="importcheck">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <span id="verdict2" onclick="change(importation,titregenre)">suivant</span>
                    </div>
                    <div class="titreGenre">
                        <div class="titre">
                            <label for="">Entrer le titre de votre chanson :</label>
                            <input type="text" placeholder="Titre de chanson" onchange="apparaitre(suiv3,'block')" name="titre">
                        </div>
                        <div class="genre">
                            <label for="">Choisir le genre de musique :</label>
                            <select name="genre">
                                <option></option>
                                <option value="Fahiny">Fahiny</option>
                                <option value="Kilalaka">Kilalaka</option>
                                <option value="Salegy">Salegy</option>
                                <option value="Rap">Rap</option>
                                <option value="Danchall">Danchall</option>
                                <option value="Rock">Rock</option>
                                <option value="Acoustique">Acoustique</option>
                                <option value="RNB">RNB</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                        <button id="verdict3" type="submit" name="valider">Partager</button>
                    </div>



                </form>


            </div>

        </div>


    </section>


    <script src="../style/js/ajouter.js"></script>
    <!--script down-->
    <script src="../js/sidebar.js"></script>
</body>

</html>