<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM Knygos WHERE Pavadinimas like '" . $_POST["keyword"] . "%'";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="suggestion-box-books">
<?php
foreach($result as $title) {
?>
<li onClick="selectBook('<?php echo $title["Pavadinimas"]; ?>');"><?php echo $title["Pavadinimas"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>