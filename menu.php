<!DOCTYPE html>
<html>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
}

</style>
<body>
<div id ="menu">
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="localisation/index.php">Localisation</a></li>
  <li><a href="modele.php">Reservation</a></li>
  <li><a href="login.html">Connexion</a></li>
</ul>
</div>

</body>
</html>

