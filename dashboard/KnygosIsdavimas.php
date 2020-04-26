<?php
    //variables
    $Message = "";
    $Pavadinimas = $_POST["title"];
    $Skaitytojas = $_POST["name"];
    $CurrentDate = $_POST["currentDate"];
    $FinalDate = $_POST["terminationDate"];

    //connect to db through DBController class
    require_once("dbcontroller.php");
    $conn = new DBController();

    //fetch ID's of reader and book
    $result_Skaitytojo = $conn->runQuery("SELECT Numeris FROM Skaitytojas WHERE VardasPavarde= '$Skaitytojas'");
    if(!empty($result_Skaitytojo)){
        $result_Knygos = $conn->runQuery("SELECT Numeris FROM Knygos WHERE Pavadinimas= '$Pavadinimas'");
        if(!empty($result_Knygos)){
            foreach($result_Skaitytojo as $row) {
                $SkaitytojoID = $row['Numeris'];
            }
            foreach($result_Knygos as $row) {
                $KnygosID = $row['Numeris'];
            }
            //upload the data to the database
            $sql = "INSERT INTO PaimtosKnygos (SkaitytojasNr, KnygaNr, IsdavimoData, GrazinimoData) VALUES ('$SkaitytojoID', '$KnygosID', '$CurrentDate', '$FinalDate')";
            if ($conn->multiQuery($sql) === TRUE) {
                $Message .=  "New records created successfully"; 
                header("Location: IsduotiKnyga.php?message=$Message");
            } else {
                $Message .= "Error: " . $sql . $conn->error;
                header("Location: IsduotiKnyga.php?message=$Message");
            }
        }else{
            $Message = "Knyga Nerasta";
            header("Location: IsduotiKnyga.php?message=$Message");
        }
    }else{
        $Message = "Skaitytojas Nerastas";
        header("Location: IsduotiKnyga.php?message=$Message");
    }
?>