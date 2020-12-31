<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/index.css" />
<title>Reservation</title>
</head>
<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}
.row::after {
  content: "";
  clear: both;
  display: table;
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;

  cursor: pointer;
  
}
.button:hover {
  opacity: 0.7;
}
</style>
<body>

<div class="bgimg-1">
  <div class="caption">
  <span class="border">RESERVATION</span>
  </div>
</div>
<?php include("menu.php"); ?>
<div style="color: #777;background-color:white;text-align:center;padding:15px 80px;text-align: justify;">
  <h3 style="text-align:center;">Nos modeles</h3>
<div class="row">
  <div class="column">
    <img src="image/modele1.jpg" alt="Snow" style="width:80%">
  </div>
  <div class="column">
    <img src="image/modele2.jpg" alt="Forest" style="width:80%">
  </div>
  <div class="column">
    <img src="image/modele3.jpg" alt="Mountains" style="width:80%">
  </div>
</div>

</div>


<div style="position:relative;">
  <div style="color:#ddd;background-color:#282E34;text-align:center;padding:50px 80px;text-align: justify;">
    <center> <a href="reservation/reservation1.php"class="button">Reserver une trottinette</a></center>

  </div>
</div>

<?php include("modele2.php"); ?>

</body>
</html>
