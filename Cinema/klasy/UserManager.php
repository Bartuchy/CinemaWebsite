<?php
    class UserManager {
        function loginForm() {
?>
            <h3>Formularz logowania</h3>
            <p>
                <form action="processLogin.php" method="post">
                    Login: <input type="text" name="login"><br>
                    Hasło: <input type="text" name="passwd"><br>
                    <input type="submit" value="Zaloguj" name="zaloguj" />
                    <input type="reset" value="Anuluj" name="anuluj" />
                </form>
            </p> 
<?php
        }

        function login($db) {
        //funkcja sprawdza poprawność logowania
        //wynik - id użytkownika zalogowanego lub -1
            $args = [
                'login' => FILTER_SANITIZE_ADD_SLASHES,
                'passwd' => FILTER_SANITIZE_ADD_SLASHES
            ];
            //przefiltruj dane z GET (lub z POST) zgodnie z ustawionymi w $args filtrami:
            $dane = filter_input_array(INPUT_POST, $args);  
            //sprawdź czy użytkownik o loginie istnieje w tabeli users
            //i czy podane hasło jest poprawne
            $login = $dane["login"];
            $passwd = $dane["passwd"];
            $userId = $db->selectUser($login, $passwd, "users");

            if ($userId >= 0) { //Poprawne dane
                //rozpocznij sesję zalogowanego użytkownika
                session_start();
                //usuń wszystkie wpisy historyczne dla użytkownika o $userId
                $sqlDelete = "DELETE FROM logged_in_users WHERE userId = $userId";
                $db->delete($sqlDelete);
                //ustaw datę - format("Y-m-d H:i:s");
                $dateUpdate = date('Y-m-d H:i:s');
                //pobierz id sesji i dodaj wpis do tabeli logged_in_users
                $sessionId = session_id();
                $sqlInsert = "INSERT INTO logged_in_users VALUES(
                    '$sessionId',
                    '$userId',
                    '$dateUpdate'
                )";

                $db->insert($sqlInsert);
                echo $this->getLoggedInUser($db, $sessionId);
            }

            return $userId;
        }

        function logout($db) {
            //pobierz id bieżącej sesji (pamiętaj o session_start()
            session_start();

            //usuń sesję (łącznie z ciasteczkiem sesyjnym)
            $sessionId = session_id();

            $_SESSION = [];
            if(isset($_COOKIE[session_name()])){
                setcookie(session_name(), '', time() - 42000, '/');
            }
            session_destroy();

            //usuń wpis z id bieżącej sesji z tabeli logged_in_users
            $sqlDelete = "DELETE FROM logged_in_users WHERE sessionId = '$sessionId'";
            $db->delete($sqlDelete);
        }

        function getLoggedInUser($db, $sessionId) {
            //wynik $userId - znaleziono wpis z id sesji w tabeli logged_in_users
            $sqlSelect = "SELECT sessionId FROM logged_in_users WHERE sessionId = '$sessionId' ";
            $arrSessionId = ["sessionId"];
            $sessionIdFromDB = $db->select($sqlSelect, $arrSessionId);
            $sessionIdFromDB = strip_tags($sessionIdFromDB, '');

            if($sessionId == $sessionIdFromDB){
                $sqlSelect = "SELECT userId FROM logged_in_users";
                $arrUserId = ["userId"];

                return $db->select($sqlSelect, $arrUserId);
            }
            //wynik -1 - nie ma wpisu dla tego id sesji w tabeli logged_in_users
            else{
                return -1;
            }
        }
    }
?>