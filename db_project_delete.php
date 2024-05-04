<!DOCTYPE html>
<html lang="en">

<?php include'head.php'; ?>
<title>ARCHI Projekt gelöscht</title>
</head>
<body>
<?php include'nav_backend.php'; ?>

<main class="mt-5">

  <div class="container">
   
      <h1>Eintrag in der Datenbank gelöscht</h1>

      <?php
      // Verbindung zur Datenbank herstellen
      include 'db_connect.php';
      
      if ($conn) {
        
        $id_arch = $_GET['id'];
        $name_arch = $_GET['name'];

        echo "Projekt" . " ". $name_arch . " ". "wurde gelöscht." ;
        $sql = "DELETE FROM `wda_architekt`.`arch_projekte` WHERE (`id_arch` = '$id_arch');";

        $result = mysqli_query($conn, $sql);

        if ($result) {
          echo "<p>Daten wurden erfolgreich gelöscht.</p>";
        } else {
          echo "<p>Fehler</p>";
        }
      }

      ?>
   
    <div class="d-flex gap-3 mt-3">
        <div>
          <a class="ed-btn" href=<?php echo 'db_project_uebersicht.php' ?>>Zurück zum allen Projekten</a>
        </div>

        <div>
         <a class="ed-btn" href=<?php echo 'db_project_new.php' ?>>Projekt erstellen</a>
        </div>
    </div>

        
  </div>

  </main>

</body>

</html>