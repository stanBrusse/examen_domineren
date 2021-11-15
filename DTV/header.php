<style>
.container{
  position: relative;
  min-height: 100%;
}

.header {
  position: absolute;
  top: 0;
  width: 100%;
  background-color: black;
  max-width: auto;
}

.header a {
  float: left;
  color: white;
  text-align: center;
  padding: 60px;
  text-decoration: none;
  font-size: 18px;
  margin-right: 10px;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: white;
  color: black;
}

.header-right {
  float: right;
}
</style>
<div class="container">
<div class="header">
  <img src="images/DTV.jpg"></img>
  <div class="header-right">
    <a class="active" href="#home">Home</a>
    <a href="#banen">Banen Reserveren</a>
    <a href="#toernooien">Toernooien</a>
    <a href="#kantine">Kantine</a>
    <a href="#inlog">Inloggen</a>
  </div>
</div>