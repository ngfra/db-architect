
<!DOCTYPE html>
<html lang="en">

<?php include'head.php'; ?>
<title>ARCHI Projekte Übersicht</title>
</head>
<body>
  <?php include('nav_backend.php'); ?>
 
    <main class="mt-5">

    <div class="container">

      <h1>Alle Projekte</h1>

        <?php
      // Verbindung zur Datenbank herstellen
      include 'db_connect.php';
      
      if ($conn) {
        $sql = "SELECT * FROM wda_architekt.arch_projekte";
        $result = mysqli_query($conn, $sql);
  
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            extract($row);
            ?>

      <div class="row">
        <div class="col-md-6">
          <p>Projektname: <?php echo $name ?></p>
          <p>Ort und Zeit: <?php echo $subtitle ?></p>
          <p>Beschreibung: <?php echo $beschreibung  ?></p>
          <p>Fläche: <?php echo $flaeche ?></p>
          <p>Planungbeginn: <?php echo $planungbeginn ?></p>
          <p>Fertigstellung: <?php echo $fertigstellung ?></p>
          <p>Bauzeit: <?php echo $bauzeit ?></p>
        </div>

        <div class="col-md-6">
          <img class="w-100" src=<?php echo 'imgs/'. $foto; ?> >
        </div>
      </div>

      <div class="d-flex gap-3 mt-3">
        <div>
        <a class="ed-btn" href="db_project_delete.php?id=<?php echo $id_arch; ?>&name=<?php echo urlencode($name); ?>">Projekt löschen</a>

        </div>

        <div>
         <a class="ed-btn" href=<?php echo 'db_project_edit.php?id=' . $id_arch; ?>>Projekt bearbeiten</a>
        </div>
      </div>
      <hr>
      <?php
          }
        }
      }
      ?>

      </div>
    </main>


</body>

</html>