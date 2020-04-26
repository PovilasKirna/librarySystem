<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>Knyga</title>
</head>
<body>
  <?php include("header.html"); ?>
  <?php include("error.php"); ?>
  <?php $Message =$_GET['message']; if(!empty($Message)){ echo "<script type='text/javascript'>alert('$Message');</script>"; }?> <!-- kai kuriuose page neveikia alertai -->
  <div class="myFormFormat">
  <form action="KnygosSukurimas.php" method="post">
  <h1 class="name">Knyga</h1>
    <ul class="form-style-1">
      <li>
        <label>Pilnas autoriaus vardas<span class="required">*</span></label>
        <input type="text" name="name" class="field-divided" placeholder="Vardas" />  
        <input type="text" name="surname" class="field-divided" placeholder="Pavarde" />  
      </li>
      <li>
        <label>Pavadinimas <span class="required">*</span></label>
        <input type="text" name="title" class="field-long" /> 
      </li>
      <li>
        <label>Isleidimo metai<span class="required">*</span></label>
        <input type="text" name="releaseYear" class="field-long" />
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