<?php
//connect to DB
require_once("dbcontroller.php");
$conn = new DBController();

//returns only full field table
$mainQuery = "SELECT K.Numeris as KnygaNr, K.Pavadinimas
, PK.ID as PaimtosKnygosNr, PK.IsdavimoData, PK.GrazinimoData
, S.Numeris as SkaitytojasNr, S.VardasPavarde FROM Knygos as K
INNER JOIN PaimtosKnygos as PK ON PK.KnygaNr = K.Numeris
INNER JOIN Skaitytojas as S ON S.Numeris = PK.SkaitytojasNr";

//to return whole table
//LEFT JOIN PaimtosKnygos as PK ON PK.KnygaNr = K.Numeris
//LEFT JOIN Skaitytojas as S ON S.Numeris = PK.SkaitytojasNr";

$result = $conn->runQuery($mainQuery);
$jsonData = json_encode($result);
$jsonData = '{ "data":' . $jsonData;
$jsonData = $jsonData . "}";

echo $jsonData;
?>