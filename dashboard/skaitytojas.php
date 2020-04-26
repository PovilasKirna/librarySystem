<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>Skaitytojas</title>
</head>
<body>
    <?php include("header.html"); ?> 
    <?php include("error.php"); ?>
    <?php $message =$_GET['message']; if(!empty($message)){ echo "<script type='text/javascript'>alert('$message');</script>"; }?>
    <div class="myFormFormat">
        <form action="SkaitytojoSukurimas.php" method="post">
            <h1 class="name">Skaitytojas</h1>
            <ul class="form-style-1">
                <li>
                    <label>Pilnas vardas<span class="required">*</span></label>
                    <input type="text" name="name" class="field-divided" placeholder="Vardas" />  <!--Should check whether it's alphabetic only-->
                    <input type="text" name="surname" class="field-divided" placeholder="Pavarde" />  <!--Should check whether it's alphabetic only-->
                </li>
                <li>
                    <label>Adresas <span class="required">*</span></label>
                    <input type="text" name="adresas" class="field-long" />  <!--Should check whether it's alphanumeric only-->
                </li>
                </li>
                <li>
                    <label>Telefono numeris <span class="required">*</span></label>
                    <input type="text" name="telefonas" class="field-long" /> <!--Should check whether it's numeric only-->
                </li>
                </li>
                <li>
                    <label>Veiksmas</label>
                    <select name="action" class="field-select">
                        <option value="create">Sukurti</option>
                        <option value="edit">Redaguoti</option>
                        <option value="delete">Trinti</option>
                    </select>
                </li>
                <li><input type="submit" value="Patvirtinti" /></li>
            </ul>
        </form>
    </div>
</body>
</html>