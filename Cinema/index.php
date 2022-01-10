<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="CSS/style.css" rel="stylesheet"/>
        <link href="CSS/popup.css" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
        <script src="JS/skryptFetch.js"></script>
        
        <title>Cinema</title>
    </head>
    
    <body>
        <section class="log-bar">
            <p><a class="log-form">Zaloguj się</a></p>
            <p><a class="reg-form">Zarejestruj się</a></p>
        </section>
        
        <?php
            include_once "funkcje.php";
            include_once "klasy/Baza.php";

            $db = new Baza("localhost", "root", "", "cinema");
            if (filter_input(INPUT_GET, "akcja")=="wyloguj") {
                logoutUser($db);
            }
                        
            if(filter_input(INPUT_POST, "submit")){
                $akcja = filter_input(INPUT_POST, "submit");
                switch($akcja){
                    case "Zarejestruj":
                        registerUser($db);
                        break;
                    case "Zaloguj":
                        loginUser($db);
                        break;
                }
            }
        ?>
        
        <!-- registration form -->
        <div class="bg-modal-reg">
            <div class="modal-content-reg">
                <div class="close">+</div><br>
                <form action="index.php" method="POST">
                    <table id="form">
                        <caption><h2>Rejestracja</h2></caption>
                        <tr>
                            <td>Imię</td>
                            <td><input name="imie_reg" type="text"></td>
                        </tr>
        
                        <tr>
                            <td>Nazwisko</td>
                            <td><input name="nazwisko_reg" type="text"></td>
                        </tr>
        
                        <tr>
                            <td>Wiek</td>
                            <td><input name="wiek_reg" type="number" name="wiek"></td>
                        </tr>

                        <tr>
                            <td>E-mail</td>
                            <td><input name="email_reg" type="email" placeholder="mojmail@xx.xx"></td>
                        </tr>
        
                        <tr>
                            <td>Nr Telefonu</td>
                            <td><input name="nrtel_reg" type="text" placeholder="+48 123-123-123"></td>
                        </tr>
                        <tr>
                            <td>Hasło</td>
                            <td><input name="passwd_reg" type="password"></td>
                        </tr>
                    </table>
                    <input class="button" type="submit" name="submit" value="Zarejestruj">
                    <input class="button" type="reset" value="Anuluj">
                </form>
            </div>
        </div>
        
        <!-- login form -->
        <div class="bg-modal-log">
            <div class="modal-content-log">
                <div class="close">+</div><br>
                <form action="index.php" method="POST">
                    <table id="form">
                        <caption><h2>Logowanie</h2></caption>
                        <tr>
                            <td>E-mail</td>
                            <td><input name="email_log" type="email" placeholder="mojmail@xx.xx" required></td>
                        </tr>
                        
                        <tr>
                            <td>Hasło</td>
                            <td><input name="passwd_log" type="password" required></td>
                        </tr>
                    </table>
                    <input class="button" type="submit" name="submit" value="Zaloguj">
                    <input class="button" type="reset" value="Anuluj">
                </form>
            </div>
        </div>
        
        <div id="calosc">
            <div id="kontener">
                <header id="baner">
                    <div id="mainBanner">
                        <img id="mainImg" src="pictures/MortalKombat.jpg" alt="mianimg">
                    </div>
                    
                    <div id="miniaturki">
                        <figure class="navImg">
                            <img src="pictures/1.jfif" alt="img1">
                        </figure>
                        
                        <figure class="navImg">
                            <img src="pictures/avengers.jfif" alt="img2">
                        </figure>
                        
                        <figure class="navImg">
                            <img src="pictures/Mando.jpg" alt="img3">
                        </figure>
                    </div>
                </header>
                
                <div id="nawigacyjny">
                    <nav id="menu">
                        <ul id="nav">
                            <li id="repertuar"><a>Repertuar</a></li>
                            <li id="media"><a>Cennik</a></li>
                            <li><a onclick="rezerwacje()">Moje Rezerwacje</a></li>
                            <li id="last"><a>Informacje</a></li>
                        </ul>
                    </nav>
                </div>
                <br>
                
                <main>
                    <div id="dynamic">
                        <table id="rep">
                            <caption><h2>REPERTUAR</h2></caption>
                            
                            <tbody>
                                <tr>
                                    <td>FILMY</td>
                                    <td>przed południem</td>
                                    <td>po południu</td>
                                    <td>wieczorem</td>
                                </tr>
                            
                                <tr>
                                    <td class="tytul" data-nazwa="JGC">Jeden Gniewny Człowiek</td>
                                    <td></td>
                                    <td><a class="godzina">14:00</a></td>
                                    <td><a class="godzina">21:00</a></td>
                                </tr>
                            
                                <tr>
                                    <td class="tytul" data-nazwa="CM2">Ciche Miejsce 2</td>
                                    <td><a class="godzina">12:15</a></td>
                                    <td><a class="godzina">15:15</a></td>
                                    <td><a class="godzina">19:30</a></td>
                                </tr>
                            
                                <tr>
                                    <td class="tytul" data-nazwa="Cruella">Cruella</td>
                                    <td><a class="godzina">10:10</a></td>
                                    <td><a class="godzina">13:15</a></td>
                                    <td></td>
                                </tr>
                                
                                <tr>
                                    <td class="tytul" data-nazwa="MortalCombat">Mortal Combat</td>
                                    <td></td>
                                    <td><a class="godzina">16:00</a></td>
                                    <td><a class="godzina">20:30</a></td>
                                </tr>
                                
                                <tr>
                                    <td class="tytul" data-nazwa="DrugaPolowa">Druga Połowa</td>
                                    <td><a class="godzina">11:00</a></td>
                                    <td></td>
                                    <td><a class="godzina">21:45</a></td>
                                </tr>
                                
                                <tr>
                                    <td class="tytul" data-nazwa="CWDG">Co w Duszy Gra</td>
                                    <td><a class="godzina">11:30</a></td>
                                    <td><a class="godzina">14:00</a></td>
                                    <td><a class="godzina">19:00</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <br><hr>
                    
                    <div id="polecane">
                        <header>Polecane</header>
                        
                        <section id="plakaty">
                            <figure data-nazwa="avatar">
                                <img class="plakat" src="plakaty/avatar.jfif" alt="plakat1">
                                <figcaption>Avatar</figcaption>
                             </figure>
                            
                            <figure data-nazwa="avengers">
                                <img class="plakat" src="plakaty/avengers.jfif" alt="plakat2">
                                <figcaption>Avengers</figcaption>
                            </figure>
                            
                            <figure data-nazwa="hobbit">
                                <img class="plakat" src="plakaty/hobbit.jfif" alt="plakat3">
                                <figcaption>Hobbit</figcaption>
                            </figure>
                            
                            <figure data-nazwa="kfp">
                                <img class="plakat" src="plakaty/kfp.jfif" alt="plakat4">
                                <figcaption>Kung Fu Panda 2</figcaption>
                            </figure>
                            
                            <figure data-nazwa="batman">
                                <img class="plakat" src="plakaty/batman.jfif" alt="plakat5">
                                <figcaption>Batman</figcaption>
                            </figure>
                            
                            <figure data-nazwa="pinokio">
                                <img class="plakat" src="plakaty/Pinokio.jfif" alt="plakat6">
                                <figcaption>Pinokio</figcaption>
                            </figure>
                            
                            <figure data-nazwa="venom">
                                <img class="plakat ostatni" src="plakaty/venom.jfif" alt="plakat7">
                                <figcaption>Venom</figcaption>
                            </figure>
                        </section>
                    </div>
                    
                    <br><hr>
                    
                    <div id="zapowiedzi">
                        <header>
                            Zapowiedzi
                        </header>
                        
                        <section id="zwiastuny">
                            <figure>
                                <iframe class="zwiastun" width="200" height="120" src="https://www.youtube.com/embed/odM92ap8_c0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <figcaption>02.06</figcaption>
                            </figure>
                            
                            <figure>
                                <iframe class="zwiastun" width="200" height="120" src="https://www.youtube.com/embed/FUK2kdPsBws" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <figcaption>04.06</figcaption>
                            </figure>
                            
                            <figure>
                                <iframe class="zwiastun" width="200" height="120" src="https://www.youtube.com/embed/CQufSiC-Hck" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <figcaption>08.06</figcaption>
                            </figure>
                            
                            <figure>
                                <iframe class="zwiastun" width="200" height="120" src="https://www.youtube.com/embed/t2eTk6rNC88" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <figcaption>13.06</figcaption>
                            </figure>
                        </section>
                    </div>
                </main>
                
                <br>
            </div>
        </div>
        
        <footer> &copy;BM </footer>
        <script src="JS/opisy.js"></script>
        <script src="JS/opisyRepertuar.js"></script>
        <script src="JS/popup.js"></script>
        
    </body>
</html>