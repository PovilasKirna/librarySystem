<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>Išduoti Knygą</title>
</head>

<body>
  <?php include("header.html"); ?>
  <?php include("error.php"); ?>
  <?php $Message =$_GET['message']; if(!empty($Message)){ echo "<script type='text/javascript'>alert('$Message');</script>"; }?>
  <div class="myFormFormat">
  <form action="KnygosIsdavimas.php" method="post" autocomplete="off" >
    <h1 class="name"> Išduoti Knygą </h1>
    <ul class="form-style-1">
      <li>
        <label>Pavadinimas<span class="required">*</span></label>
        <input type="text" name="title" id="search-books" class="field-long" placeholder="Pavadinimas" />  <!--Should check whether it's text only && Autocompleting helps not make mistakes-->
        <div id="suggestion-box-books"></div> 
      </li>
      <li>
        <label>Skaitytojas<span class="required">*</span></label>
        <input type="text" name="name" id="search" class="field-long" placeholder="Vardas Pavardė" />  <!--Should check whether it's text only && Autocompleting helps not make mistakes-->
        <div id="suggestion-box-readers"></div>
      </li>
      <li>
        <label>Išdavimo laikotarpis<span class="required">*</span></label>
        <input type="text" name="currentDate" id="currentDate" class="field-divided" />  <!--Should check whether date format is correct && Autocompleting helps not make mistakes-->
        <input type="text" name="terminationDate" id="terminationDate" class="field-divided" />  <!--Should check whether date format is correct && Autocompleting helps not make mistakes-->
      </li>
      <li>
        <input type="submit" value="Patvirtinti" />
      </li>
    </ul>
  </form>
  </div>
  <script src="Javascript/autocomplete.js"></script>
  <script src="Javascript/date.js"></script>
</body>
</html>