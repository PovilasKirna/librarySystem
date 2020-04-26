<?php
        //variables
        $Message = "";
        $Pavadinimas = $_POST["title"];
        $Vardas = $_POST["name"];
        $Pavarde = $_POST["surname"];
        $Autorius = $Vardas." ".$Pavarde;
        $IsleidimoMetai = $_POST["releaseYear"];
        $Action = $_POST["action"];

        //check if all variables are not faulty
        $EverythingIsFine = TRUE;
        if(preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $Autorius) || ctype_digit($Autorius)){
            $EverythingIsFine = FALSE;
            $Message = "Autoriaus vardas ir pavardė negali turėti skaičių, specialiųjų simbolių išskyrus kabutę ir tašką";
            header("Location: knyga.php?message=$Message");
        } elseif(preg_match('/[\^£$%&*()}{@#~?><>,|=_+¬-]/', $Pavadinimas)){
            $EverythingIsFine = FALSE;
            $Message = "Knygos pavadinimas negali turėti specialiųjų simbolių išskyrus kabutę ir tašką";
            header("Location: knyga.php?message=$Message");
        } else if(!ctype_digit($IsleidimoMetai) || $IsleidimoMetai < 0 || $IsleidimoMetai > 2020 ){
            $EverythingIsFine = FALSE;
            $Message = "Knygos išleidimo metai privalo būti sudaryti iš skaičių ir negali viršyti šių ribų (0, 2020)";
            header("Location: knyga.php?message=$Message");
        }

        //run only if all variables are correct 
        if($EverythingIsFine){
            //connect to db through DBController class
            require_once("dbcontroller.php");
            $conn = new DBController();
            //insert corrected data
            if($Action == "create"){
                if($Autorius != " "){
                    $sql = "INSERT INTO Knygos (Pavadinimas, Autorius, IsleidimoMetai) VALUES ('$Pavadinimas', '$Autorius', '$IsleidimoMetai');"; 
                    if ($conn->multiQuery($sql) === TRUE) {
                        $Message .=  "New records created successfully"; 
                    } else {
                        $Message .= "Error: " . $sql . $conn->error;
                    }
                } else{
                    $Message .=  "Autoriaus vardas negali buti tuscias"; 
                }
            }
            //edit title or release year, you can't edit name of the author*
            elseif($Action == "edit"){
                if(!empty($Pavadinimas) && !empty($Autorius) && !empty($IsleidimoMetai) && $Autorius != " "){
                    $sql = "UPDATE Knygos 
                        SET Pavadinimas ='$Pavadinimas' 
                    WHERE Autorius ='$Autorius' AND IsleidimoMetai = '$IsleidimoMetai'";
                    if ($conn->Query($sql) === TRUE) {
                        $Message .= "Record updated successfully"; 
                    } else {
                        $Message .= "Error updating record: " . $conn->error;
                    }
                }
                //you can only edit release year of the book  because author might've written several books
                if(!empty($IsleidimoMetai) && !empty($Pavadinimas) && $Autorius == " "){
                    $sql = "UPDATE Knygos 
                        SET IsleidimoMetai ='$IsleidimoMetai' 
                    WHERE Pavadinimas ='$Pavadinimas'";
                    if ($conn->Query($sql) === TRUE) {
                        $Message .= "Record updated successfully"; 
                    } else {
                        $Message .= "Error updating record: " . $conn->error;
                    }
                }
            }
            // delete only by title of the book
            else{
                $sql = "DELETE FROM Knygos WHERE Pavadinimas = '$Pavadinimas'"; 
                if ($conn->Query($sql) === TRUE) {
                    $Message .= "Record deleted successfully";
                } else {
                    $Message .= "Error deleting record: " . $conn->error; 
                }
            }
            header("Location: knyga.php?message=$Message");
        }
?>
       