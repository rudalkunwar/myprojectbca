<!DOCTYPE html>
<html>
<head>
    <style>
* {
  margin: 0;
  padding: 0;
}
body{
    height: 100%;
}

nav {
  background-color: #333;
  color: #fff;
}

nav ul {
  list-style-type: none;
  display: flex;
}

nav ul li {
  margin-right: 10px;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
  padding: 10px;
}


.sidenav a {
  display: block;
  padding: 10px;
  text-decoration: none;
  color: #000;
  margin-bottom: 10px;
}

.sidenav {
  background-color: #f1f1f1;
  width: 150px;
  padding: 20px;
height: 100vh;
}

.content {
  margin-left: 150px; 
  padding: 20px;
}
    </style>
</head>
<body>
  <nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

  <div class="sidenav">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
    <a href="#">Link 4</a>
  </div>

  <div class="content">
  </div>
</body>
</html>
