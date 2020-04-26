<?php
        //variables
        $Message = "";
        $Vardas = $_POST["name"];
        $Pavarde = $_POST["surname"];
        $VardasPavarde = $Vardas." ".$Pavarde;
        $Adresas = $_POST["adresas"];
        $TelefonoNumeris = $_POST["telefonas"];
        $Action = $_POST["action"];
        //correct phone number
        if($TelefonoNumeris[0] == '+'){
            $TelefonoNumeris = substr($TelefonoNumeris, 1);
        }

        //check if all variables are not faulty
        $EverythingIsFine = TRUE;
        if(preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $VardasPavarde) || ctype_digit($VardasPavarde)){
            $EverythingIsFine = FALSE;
            $Message = "Skaitytojo vardas ir pavardė negali turėti skaičių, specialiųjų simbolių išskyrus kabutę ir tašką";
            header("Location: skaitytojas.php?message=$Message");
        } elseif(preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $Adresas)){
            $EverythingIsFine = FALSE;
            $Message = "Adresas pavadinimas negali turėti specialiųjų simbolių išskyrus kabutę ir tašką";
            header("Location: skaitytojas.php?message=$Message");
        } else if(!ctype_digit($TelefonoNumeris)){
            $EverythingIsFine = FALSE;
            $Message = "Telefono numeris turi būti sudarytas iš skaičių ir gali turėti + ženklą";
            header("Location: skaitytojas.php?message=$Message");
        }

        //run only if all variables are correct 
        if($EverythingIsFine){
            //connect to db through DBController class
            require_once("dbcontroller.php");
            $conn = new DBController();
            //insert corrected data
            if($Action == "create"){
                $sql = "INSERT INTO Skaitytojas (VardasPavarde, Adresas, Telefonas) VALUES ('$VardasPavarde', '$Adresas', '$TelefonoNumeris')"; 
                if ($conn->multiQuery($sql) === TRUE) {
                    $Message .=  "New records created successfully"; 
                } else {
                    $Message .= "Error: " . $sql . $conn->error;
                }
            }
            //edit by adress or phone, yo can't edit name of the reader
            elseif($Action == "edit"){
                if(!empty($Adresas)){
                    $sql = "UPDATE Skaitytojas 
                        SET Adresas ='$Adresas' 
                    WHERE VardasPavarde='$VardasPavarde'";
                    if ($conn->Query($sql) === TRUE) {
                        $Message .= "Record updated successfully"; 
                    } else {
                        $Message .= "Error updating record: " . $conn->error;
                    }
                }
                if(!empty($TelefonoNumeris)){
                    $sql = "UPDATE Skaitytojas 
                        SET Telefonas ='$TelefonoNumeris' 
                    WHERE VardasPavarde='$VardasPavarde'";
                    if ($conn->Query($sql) === TRUE) {
                        $Message .= "Record updated successfully"; 
                    } else {
                        $Message .= "Error updating record: " . $conn->error;
                    }
                }
            }
            // delete only by name
            else{
                $sql = "DELETE FROM Skaitytojas WHERE VardasPavarde = '$VardasPavarde'"; 
                if ($conn->Query($sql) === TRUE) {
                    $Message .= "Record deleted successfully";
                } else {
                    $Message .= "Error deleting record: " . $conn->error; 
                }
            }
            header("Location: skaitytojas.php?message=$Message");
        }
    ?>