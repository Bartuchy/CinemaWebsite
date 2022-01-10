<?php
    class Baza {
        private $mysqli;

        public function __construct($serwer, $user, $pass, $baza) {
            $this->mysqli = new mysqli($serwer, $user, $pass, $baza);
            /* sprawdz połączenie */
            if ($this->mysqli->connect_errno) {
                printf("Nie udało sie połączenie z serwerem: %s\n",
                $this->mysqli->connect_error);
                exit();
            }
            /* zmien kodowanie na utf8 */
            if ($this->mysqli->set_charset("utf8")) {

            }
        }
        
        function __destruct() {
            $this->mysqli->close();
        }
        
        public function select($sql, $pola) {
            $tresc = "";
            if ($result = $this->mysqli->query($sql)) {
                $ilepol = count($pola);
                $ile = $result->num_rows;

                while ($row = $result->fetch_object()) {
                    for ($i = 0; $i < $ilepol; $i++) {
                        $p = $pola[$i];
                        $tresc.=$row->$p.',';
                    }
                }
                $result->close();
            }
            return $tresc;
        }
        
        public function selectTickets($sql, $pola){
            $tresc = "";
            if ($result = $this->mysqli->query($sql)) {
                $ilepol = count($pola);
                $ile = $result->num_rows; 
               
                $tresc.="<table id='rezerwacja'><thead><tr>
                <th>Nr. biletu</th><th>Tytuł</th><th>Data seansu</th><th>Dubbing</th>
                <th>Szczegóły</th><th>Płatność</th></tr></thead><tbody>";
                while ($row = $result->fetch_object()) {
                    $tresc .= "<tr>";
                    for ($i = 0; $i < $ilepol; $i++) {
                        $p = $pola[$i];
                        $tresc.="<td>" . $row->$p . "</td>";
                    }
                    $tresc.="</tr>";
                }
                $tresc.="</tbody></table><br><form action='indexLogged.php' method='POST'>
                Podaj numer biletu: <input type='text' name='ticketId'><br>
                <input class='button' type='submit' name='submit' value='Usun'>
                <input class='button' type='submit' name='submit' value='Edytuj'>
                </form>
                
                ";
                $result->close();
            }

            return $tresc;
        }
        
        public function delete($sql) {
            return $this->mysqli->query($sql);
        }
        
        public function insert($sql) {
            return $this->mysqli->query($sql);
        }

        public function update($sql){
            return $this->mysqli->query($sql);
        }

        public function getMysqli() {
            return $this->mysqli;
        }

        public function selectUser($login, $passwd, $tabela) {
            $id = -1;
            $sql = "SELECT * FROM $tabela WHERE email='$login'";
            
            if ($result = $this->mysqli->query($sql)) {
                $ile = $result->num_rows;
                if ($ile == 1) {
                    $row = $result->fetch_object();
                    $hash = $row->passwd;
                    if (password_verify($passwd, $hash))
                        $id = $row->id;
                }
            }
            return $id;
        }
   }
?>