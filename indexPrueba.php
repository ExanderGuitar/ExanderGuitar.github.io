<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <title>Ultramarinos ultramar</title>
    <link href="./indexStyle.css" type="text/css" rel="stylesheet">
    <meta charset="utf-8">
  </head>
  <body>

    <?php
      date_default_timezone_set('Europe/Madrid');

      function fecha() {
        $dayName = date("N");
        $dayNumber = date("d");
        $month = date("n");
        $dias = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septeimbte", "Octubre", "Noviembre", "Diciembre"];

        $diaNombre = $dias[$dayName -1];
        $mes = $meses[$month -1];

        return $fechaTxt = $diaNombre . " " . $dayNumber . " de " . $mes;
      }
    ?>

    <?php
      $servername = "sql311.epizy.com";
      $username = "epiz_29844788";
      $password = "LMENsFlNiW1";
      $dbname = "epiz_29844788_Ultramarinos";

      //Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      //Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      echo "Connected succesfully";

      $sql = "SELECT Def_id, Def_titulo, Def_titulo_en FROM Definiciones Biologia";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["Def_id"]. " - Name: " . $row["Def_titulo"]. " " . $row["Def_titulo_en"]. "<br>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
    <!-- Titulo principal de la pagina-->
    <div class = "titulo-principal">
      <h1>Ultramarinos ultramar</h1>
      <p><?php echo fecha()?></p>
    </div>
    <!--<div class = "divisor"></div>-->

    <!-- Cuerpo principal -->
    <div>
      <h2><a href="./Academic/academicSection.html">Academic</a></h2>
      <div class="seccion_dinamica">
        <p><a href="./Academic/Biology.html">Biologia</a></p>
        <p><a href="./Academic/English.html">Inglés</a></p>
        <p><a href="./Academic/peerReview.html">Peer Review</a></p>
        <p><a href="./Academic/empresa.html">Empresa</a></p>
      </div>

      <h2><a href="./Learning/learningSection.html">Learning</a></h2>
      <div class="seccion_dinamica">
        <p><a href="./Learning/cssSection.html">CSS</a></p>
        <p><a href="./Learning/htmlSection.html">HTML</a></p>
      </div>

      <h2><a href="./Warcraft/warcraftSection.html">Warcraft</a></h2>
      <div class="seccion_dinamica">
        <p><a href="./Warcraft/wowWarrior.html">Guerrero</a></p>
      </div>
    </div>
    <!--<div>
      <h2><a href="./Academic/academicSection.html">Academic</a></h2>
      <h2><a href="./Learning/learningSection.html">Learning</a></h2>
      <h2><a href="./Warcraft/warcraftSection.html">Warcraft</a></h2>
    </div>-->

    <div class="formulario">
      <form method="post">
        <label for="titulo" id="titulo">Título</label>
        <input type="text" name="titulo">
        <label for="referencia" id="referencia">Referencia</label>
        <input type="text" name="referencia">
        <button type="submit">Subir</button>
      </form>
    </div>
  </body>
</html>
