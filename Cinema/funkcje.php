<?php
    //validate forms
    function validateRegistrationForm() {
        $args = [
                'imie_reg' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[A-ZZĄĆĘŁŃÓŚŹŻ]{1}[a-ząęłńśćźżó-]{1,25}$/']],
                'nazwisko_reg' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[A-ZĄĆĘŁŃÓŚŹŻ]{1}[a-zząćęłńóśźż-]{1,25}|[A-ZĄĆĘŁŃÓŚŹŻ]{1}[a-zząćęłńóśźż-]{1,25}-[A-ZĄĆĘŁŃÓŚŹŻ]{1}[a-zząćęłńóśźż-]{1,25}$/']],
                'wiek_reg' => FILTER_VALIDATE_INT,
                'email_reg' => FILTER_VALIDATE_EMAIL,
                'nrtel_reg' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[+]{1}[0-9]{2} [0-9]{3}-[0-9]{3}-[0-9]{3}$/']],
                'passwd_reg' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[a-z-]{5,}[0-9-]{1,}$/']]
            ];

        $dane = filter_input_array(INPUT_POST, $args);

        $errors = "";
        foreach ($dane as $key => $val) {
            if ($val === false or $val === NULL) {
                $errors .= $key . " ";
            }
        }
        
        if ($errors === "") {
            return $dane;
        } else {
            return 0;
        }
    }

    function validateLoginForm($db){
        $args = [
            'email_log' => FILTER_SANITIZE_ADD_SLASHES,
            'passwd_log' => FILTER_SANITIZE_ADD_SLASHES
        ];

        $dane = filter_input_array(INPUT_POST, $args);  

        $email = $dane['email_log'];
        $passwd = $dane['passwd_log'];

        return $db->selectUser($email, $passwd, "users");
    }

    function validateReservationForm($title_name, $date_name, $lang_name, $det_name, $pay_name) {
        $args = [
                $title_name => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                $lang_name => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                $det_name => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,'flags' => FILTER_REQUIRE_ARRAY],
                $pay_name => FILTER_SANITIZE_STRING
            ];

        $data = filter_input_array(INPUT_POST, $args);

        $errors = "";
        foreach ($data as $key => $val) {
            if ($val === false or $val === NULL) {
                $errors .= $key . " ";
            }
        }
        
        $date = $_POST[$date_name];

        if ($errors === "" && strtotime($date) > strtotime('now')) {
            return $data;
        } else {
            return 0;
        }
    }

    //registration process
    function registerUser($db){
        $d = validateRegistrationForm();

        if($d == 0){
            echo "<br>Błąd rejestracji, wprowadź poprawne dane";
        }else{
            $date = new DateTime();
            $sql = "INSERT INTO users VALUES (
                NULL,
                '".$d['imie_reg']."',
                '".$d['nazwisko_reg']."',
                '".$d['wiek_reg']."',
                '".$d['email_reg']."',
                '".$d['nrtel_reg']."',
                '".password_hash($d['passwd_reg'], PASSWORD_DEFAULT)."',
                '".$date->format('Y-m-d')."'
            )";

            if($db->insert($sql)){
                echo "<b>Konto zostało zarejestrowane</b>";
            }
            else{
                echo '<script>alert("Użytkownik o podanym mailu już istnieje")</script>';
            }
        }
    }

    //login process
    function secureLog($db){
        $sqlSelect = "SELECT sessionId FROM logged_in_users";
        $arrSessionId = ["sessionId"];
        $sessionIdFromDB = $db->select($sqlSelect, $arrSessionId);
        $sessionIdFromDB = strip_tags($sessionIdFromDB, '');

        if($sessionIdFromDB != null){
            $sqlSelect = "SELECT userId FROM logged_in_users";
            $arrSessionId = ["userId"];
            $userId = $db->select($sqlSelect, $arrSessionId);
            $userId = strip_tags($userId, '');

            $sqlSelect = "SELECT * FROM users WHERE id = $userId";
            $arrSessionId = ["id", "email"];
            $user = $db->select($sqlSelect, $arrSessionId);
            echo $user;
        }
        else{
            header("location:index.php");
        }
}

    function loginUser($db){
        $userId = validateLoginForm($db);

        if($userId > 0){
            session_start();

            $DeleteQuery = "DELETE FROM logged_in_users";
            $db->delete($DeleteQuery);

            $dateUpdate = date('Y-m-d H:i:s');

            $sessionId = session_id();
            $InsertQuery = "INSERT INTO logged_in_users VALUES(
                '$sessionId',
                '$userId',
                '$dateUpdate'
            )";

            $db->insert($InsertQuery);
            header("location:indexLogged.php");
        }else{
            echo "Niepoprawne dane logowania";
        }
    }

    function logoutUser($db){
        session_start();
        $sessionId = session_id();

        $_SESSION = [];
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(), '', time() - 42000, '/');
        }
        session_destroy();

        $DeleteQuery = "DELETE FROM logged_in_users WHERE sessionId = '$sessionId'";
        $db->delete($DeleteQuery);
    }

    //update user data process
    function getLoggedInUser($db, $sessionId) {

        $sqlSelect = "SELECT sessionId FROM logged_in_users WHERE sessionId = '$sessionId'";
        $arrSessionId = ["sessionId"];
        $sessionIdFromDB = $db->select($sqlSelect, $arrSessionId);

        if($sessionId == $sessionIdFromDB){
            $sqlSelect = "SELECT userId FROM logged_in_users";
            $arrUserId = ["userId"];

            return $db->select($sqlSelect, $arrUserId);
        }
        else{
            return -1;
        }
    }

    function updateUserData($db){
        $userId = getLoggedInUser($db, session_id());
        $userId = substr($userId, 0, -1);
        $data = validateRegistrationForm();

        $UpdateQuery = "UPDATE users SET
        name='".$data['imie_reg']."', 
        surname='".$data['nazwisko_reg']."',
        age=".$data['wiek_reg'].",
        email='".$data['email_reg']."',
        phone='".$data['nrtel_reg']."',
        passwd='".$data['passwd_reg']."' 
        WHERE id=$userId";

        if($db->update($UpdateQuery)){
            echo '<script>alert("Zmiany zapisano pomyślnie")</script>';
        }
        else{
            echo '<script>alert("Użytkownik o podanym mailu już istnieje")</script>';
        }
    }

    //ticket options
    function reserveTicket($db){
        $data = validateReservationForm('title','date_res', 'jezyk', 'szczegol', 'platnosc');
        
        if($data == 0){
            echo '<script>alert("Bielt nie został zarezerwowany, podano datę z przeszłości")</script>';
        }else{
            $userId = getLoggedInUser($db, session_id());
            $userId = substr($userId, 0, -1);

            $details = "";
            foreach($data['szczegol'] as $val){
                $details.=$val.",";
            }
            $details = substr($details, 0, strlen($details)-1);

            $InsertQuery = "INSERT INTO tickets VALUES(
                NULL,
                '".$_POST['title']."',
                '".$_POST['date_res']."',
                '".$data['jezyk']."',
                '".$details."',
                '".$data['platnosc']."',
                $userId)";
            
            if($db->insert($InsertQuery)){
                echo '<script>alert("Bilet został zerezerwowany")</script>';
            }else{
                echo '<script>alert("Bielt nie został zarezerwowany, niepoprawne dane")</script>';
            }
        }
    }

    function removeTicket($db){
        $ticketId = $_POST['ticketId'];
        $DeleteQuery = "DELETE FROM tickets WHERE id=$ticketId";
        if($db->delete($DeleteQuery)){
            echo '<script>alert("Bilet został usunięty")</script>';
        }else{
            echo '<script>alert("Bilet o podanym numerze nie istnieje")</script>';
        }
    }
    
    function getTicketData($db){
        $ticketId = $_POST['ticketId'];
        $SelectQuery = "SELECT * FROM tickets WHERE id=$ticketId";
        $ticketDataColumns = ['id','title', 'date', 'language', 'details', 'payment'];
        $ticketData = $db->select($SelectQuery, $ticketDataColumns);
        
        echo "<p class='ticket'>$ticketData</p><script src='JS/getTicket.js'></script>";
    }

    function saveEditedTicketData($db){ 
        $data = validateReservationForm('title_ed','date_res_ed', 'jezyk_ed', 'szczegol_ed', 'platnosc_ed');
        
        if($data == 0){
            echo '<script>alert("Nie wprowadzono zmian, podano datę z przeszłości")</script>';
        }else{
            $ticketId = intval($_POST['hidden']);

            $details = "";
            foreach($data['szczegol_ed'] as $val){
                $details.=$val.",";
            }
            $details = substr($details, 0, strlen($details)-1);

            $UpdateQuery = "UPDATE tickets SET 
            date='".$_POST['date_res_ed']."',
            title='".$_POST['title_ed']."',
            language='".$_POST['jezyk_ed']."',
            details='".$details."',
            payment='".$_POST['platnosc_ed']."'
            WHERE id=$ticketId";
            
            if($db->insert($UpdateQuery)){
                echo '<script>alert("Zmiany zostały zapisane")</script>';
            }else{
                echo '<script>alert("Zmiany nie zostały zapisane, niepoprawne dane")</script>';
            }
        }
    }