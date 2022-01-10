
    <?php
        class User{
            const STATUS_USER = 1;
            const STATUS_ADMIN = 2;
            protected $userName;
            protected $passwd;
            protected $fullname;
            protected $email;
            protected $date;
            public $status;

            function __construct($userName, $fullname, $email, $passwd){
                $this->status = User::STATUS_USER;
                $this->date = new DateTime();
                $this->userName = $userName;
                $this->fullname = $fullname;
                $this->email = $email;
                $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
            }

            public function show(){
                echo "Username: $this->userName<br>Password: $this->passwd<br>Fullname: $this->fullname<br>".
                "Email: $this->email<br>Date: ".($this->date)->format('Y-m-d')."<br>Status: $this->status<br>==========<br>";
            }

            public function setUserName($userName){
                $this->userName = $userName;
            }

            public function getUserName(){
                return $this->userName;
            }

            static function getAllUsers($plik){
                $tab = json_decode(file_get_contents($plik));
                //var_dump($tab);
                foreach ($tab as $val){
                    echo "<p>".$val->userName." ".$val->fullname." ".$val->date."</p>";
                }
            }
               
            function toArray(){
                $arr=[
                    "userName" => $this->userName,
                    "fullname" => $this->fullname,
                    "email" => $this->email,
                    "passwd" => $this->passwd,
                    "date" => ($this->date)->format('Y-m-d'),
                    "status" => $this->status
                ];
                return $arr;
            }

            function saveJSON($plik){
                $tab = json_decode(file_get_contents($plik),true);
                array_push($tab,$this->toArray());
                file_put_contents($plik, json_encode($tab,JSON_PRETTY_PRINT));
            }

            function saveXML($plik){
                //wczytujemy plik XML:
                $simplexml = simplexml_load_file($plik);
                $dom = new DOMDocument('1.0');
                $dom->preserveWhiteSpace = false;
                $dom->formatOutput = true;
                $dom->loadXML($simplexml->asXML());
                $xml = new SimpleXMLElement($dom->saveXML());
                //dodajemy nowy element user (jako child)
                $xmlCopy=$xml->addChild("user");
                //do elementu dodajemy jego właściwości o określonej nazwie i treści
                $xmlCopy->addChild("userName", $this->userName);
                //uzupełnij pozostałe właściwości
                // ...
                $xmlCopy->addChild("passwd", $this->passwd);
                $xmlCopy->addChild("fullname", $this->fullname);
                $xmlCopy->addChild("email", $this->email);
                $xmlCopy->addChild("date", ($this->date)->format('Y-m-d'));
                $xmlCopy->addChild("status", $this->status);
                //zapisujemy zmodyfikowany XML do pliku:
                $xml->asXML($plik); 
            }

            function showXML($plik){
                $allUsers = simplexml_load_file($plik);
                echo "<ul>";
                foreach ($allUsers as $user):
                    $userName=$user->userName;
                    $fullname=$user->fullname;
                    $email=$user->email;
                    $passwd=$user->passwd;
                    $date=$user->date;
                    $status=$user->status;
                    echo "<li>$userName, $fullname, $email, $passwd, $date, $status </li>";
                endforeach;
                echo "</ul>";
            }

            function saveDB($db){
                $sql = "INSERT INTO users VALUES(
                    NULL,
                    '$this->userName',
                    '$this->fullname',
                    '$this->email',
                    '$this->passwd',
                    $this->status,
                    '".$this->date->format('Y-m-d')."'
                )";
                $db->insert($sql);
            }

            static function getAllUsersFromDB($db){
                $sql = "SELECT * FROM users";
                $pola = ['id', 'userName', 'fullName', 'email', 'passwd', 'status', 'date'];
                $show = $db->select($sql, $pola);

                echo "$show";
            }
        }
    ?>
