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


    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.4.0-web/css/v4-shims.css">
    <link rel="icon" type="img" href="img/grapes.png">


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
                    <i class="fa-solid fa-circle-info" style="color:rgb(6, 0, 43);font-size: 30px;"></i>
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







                <!-- DEBUT PRO -->


                <div class="wrapper">
                    <div class="cover cover-left"></div>
                    <div class="cover cover-right"></div>


                    <div class="book">
                        <!--my profile  pages-->
                        <div class="book-page page-left" style="justify-content:center;">
                            <div class="profile-page">

                                <div class="profile-img">
                                    <img src="img/4.jpg" alt="beast">
                                </div>


                                <h1>Censura</h1>


                                <div class="social-media">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>



                                <div class="btn-box">

                                    <a href="#" class="btn contact-me">Nous contactez</a>
                                </div>
                            </div>
                        </div>



                        <!--page 1 and 2 START-->
                        <div class="book-page page-right turn" id="turn-1">
                            <!--page 1 -->
                            <div class="page-front" style="padding: 6rem 1rem;">
                                <h1 class="title">Apropos de Censura</h1>

                                <div class="workeduc-box">
                                    <div class="workeduc-content">


                                        <p>
                                            Ce site a pour but de surveiller, contrôler, récompenser et réviser les hits.
                                        </p>
                                    </div>

                                    <div class="workeduc-content">

                                        <!-- <h3>3D Artist (3dsmax, 3d zephire) - level intermadiary</h3> -->
                                        <p>
                                            Il s'agit de vérifier attentivement le contenu des hits, que ce soit les paroles, les images ou les vidéos, pour décider s'ils doivent être censurés ou non. <br> Il y a aussi un aspect de contrôle, où des mesures peuvent être prises pour supprimer ou bloquer les hits qui ne respectent pas certaines normes ou critères établis.
                                            <br> En récompensant les artistes qui produisent de la musique positive et inspirante, le site souhaite encourager la création de hits qui respectent certaines valeurs.
                                        </p>
                                    </div>

                                    <div class="workeduc-content">

                                        <!-- <h3>Youtuber</h3> -->
                                        <p>
                                            Enfin, il y a un processus de révision régulière pour s'assurer que les hits déjà censurés continuent de respecter les normes établies.
                                        </p>
                                    </div>
                                </div>

                                <span class="number-page">1</span>

                                <!--button next-->
                                <span class="nextprev-btn" data-page="turn-1">
                                    <i class="fa fa-chevron-right"></i>
                                </span>
                            </div>






                            <!--page 2 (education)-->
                            <div class="page-back" style="padding: 5rem 1rem;">
                                <h1 class="title">Apropos de developpeur</h1>

                                <div class="workeduc-box">
                                    <div class="workeduc-content">
                                        <span class="year"><i class="fa fa-calendar"></i>Mention</span><br>
                                        <h3>Informatique et télécomunication</h3>
                                        <p>
                                            Informatique, Statistiques Appliquées et Intelligence Artificielle <br>(ISAIA 2 A)
                                        </p>
                                    </div>

                                    <div class="workeduc-content">
                                        <span class="year"><i class="fa fa-users"></i>Membres</span><br>
                                        <h3>N° : Nom et Prenom</h3>
                                        <p>
                                            07 : RANDRIAMAHEFARIVO Sandratriniaina Tsiaro Julio<br>
                                            11 : RATOVOMANALINA Sitraka Mamy <br>
                                            23 : RAMALARISON Tsiory Nomena<br>
                                            26 : RANDRIAMAHEFA Tsilavina Mia<br>
                                            28 : ANDRIANALIARIMANANA Manoasoa
                                        </p>
                                    </div>

                                    <div class="workeduc-content">
                                        <span class="year"><i class="fa fa-phone"></i>Contact</span><br>
                                        <h3>TEL:</h3>
                                        <p>
                                            - 034 69 565 85 <br> - 034 44 984 59 <br> - 034 42 795 60
                                        </p>
                                    </div>
                                </div>

                                <span class="number-page">2</span>

                                <!--button prev-->
                                <span class="nextprev-btn back" data-page="turn-1">
                                    <i class="fa fa-chevron-left"></i>
                                </span>
                            </div>

                        </div>



                        <!--page 3 and 4 START-->
                        <div class="book-page page-right turn" id="turn-2">
                            <!--page 3 (My Services)-->
                            <div class="page-front" style="padding: 5rem 1rem;">
                                <h1 class="title">Notre services</h1>

                                <div class="services-box">
                                    <div class="services-content">
                                        <i class="fa fa-video"></i>
                                        <h3>Motion Design</h3>
                                        <p>

                                        </p>
                                        <a href="#" class="btn">More</a>
                                    </div>


                                    <div class="services-content">
                                        <i class="fa fa-search"></i>
                                        <h3>Graphique design</h3>
                                        <p>

                                        </p>
                                        <a href="#" class="btn">More</a>
                                    </div>


                                    <div class="services-content">
                                        <i class="fa fa-youtube"></i>
                                        <h3>Gamer</h3>
                                        <p>

                                        </p>
                                        <a href="#" class="btn">More</a>
                                    </div>


                                    <div class="services-content">
                                        <i class="fa fa-code"></i>
                                        <h3>Web Development</h3>
                                        <p>

                                        </p>
                                        <a href="#" class="btn">More</a>
                                    </div>

                                </div>


                                <span class="number-page">3</span>

                                <!--button next-->
                                <span class="nextprev-btn" data-page="turn-2">
                                    <i class="fa fa-chevron-right"></i>
                                </span>
                            </div>




                            <!--page 4 (My Skills)-->
                            <div class="page-back">
                                <h1 class="title">Our Skills</h1>


                                <div class="skills-box">
                                    <div class="skills-content">
                                        <h3>Front-End</h3>
                                        <div class="content">
                                            <span>HTML</span>
                                            <span>CSS</span>
                                            <span>JS</span>
                                        </div>
                                    </div>


                                    <div class="skills-content">
                                        <h3>Back-End</h3>
                                        <div class="content">
                                            <span>Java</span>
                                            <span>PHP</span>
                                            <span>Python</span>
                                            <span>c#</span>
                                        </div>
                                    </div>


                                    <div class="skills-content">
                                        <h3>Framework</h3>
                                        <div class="content">
                                            <span>React-js</span>
                                            <span>Angular</span>
                                            <span>Bootstrap</span>
                                            <span>Laravel</span>
                                        </div>
                                    </div>
                                </div>


                                <span class="number-page">4</span>

                                <!--button prev-->
                                <span class="nextprev-btn back" data-page="turn-2">
                                    <i class="fa fa-chevron-left"></i>
                                </span>
                            </div>
                        </div>





                        <!--page 5 and 6 START-->
                        <div class="book-page page-right turn" id="turn-3">
                            <!--page 5 (latest projet)-->
                            <div class="page-front">
                                <h1 class="title">Notre dérnière projet</h1>

                                <div class="portfolio-box">

                                    <div class="img-box">
                                        <img src="img/Logo.png" alt="tree">
                                    </div>

                                    <div class="info-box">
                                        <div class="info-title">
                                            <h3>Résumé du projet "Digital District":</h3>

                                        </div>

                                        <p>
                                            L'objectif de notre projet est de transfromer les communes rurales de Madagascar en entités numériques et de
                                            devenir la norme nationale pour la gestion des communes rurales, entraînant ainsi une révolution numérique au sein
                                            de l'administration publique dans tous les Districts du pays.
                                        </p>
                                    </div>

                                    <div class="btn-box">
                                        <a href="#" class="btn">More Projects</a>
                                    </div>
                                </div>


                                <span class="number-page">5</span>

                                <!--button next-->
                                <span class="nextprev-btn" data-page="turn-3">
                                    <i class="fa fa-chevron-right"></i>
                                </span>

                            </div>







                            <!--page 6 (contact)-->
                            <div class="page-back">
                                <h1 class="title">Nous contactez</h1>


                                <div class="contact-box">
                                    <form action="#">
                                        <input type="text" class="field" placeholder="Votre nom" required>
                                        <input type="email" class="field" placeholder="Votre addresse email" required>
                                        <textarea name="" id="" cols="30" rows="10" class="field" placeholder="Votre message" required></textarea>
                                        <input type="submit" class="btn" value="Envoyer le message">
                                    </form>
                                </div>

                                <span class="number-page">6</span>

                                <!--button prev-->
                                <span class="nextprev-btn back" data-page="turn-3">
                                    <i class="fa fa-chevron-left"></i>
                                </span>

                                <a href="#" class="back-profile">
                                    <p>Page 1</p>
                                    <i class="fa fa-chevron-up"></i>
                                </a>

                            </div>
                        </div>


                    </div>
                </div>


                <script src="js/all.js"></script>



                <!-- FIN PRO -->






                <script src="../style/js/ajouter.js"></script>
            </div>

        </div>


    </section>

    <!--script down-->
    <script src="../js/sidebar.js"></script>
</body>

</html>