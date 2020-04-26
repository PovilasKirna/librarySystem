<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM Skaitytojas WHERE VardasPavarde like '" . $_POST["keyword"] . "%'";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="suggestion-box-readers">
<?php
foreach($result as $name) {
?>
<li onClick="selectName('<?php echo $name["VardasPavarde"]; ?>');"><?php echo $name["VardasPavarde"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>