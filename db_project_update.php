<!DOCTYPE html>
<html lang="en">

<?php include'head.php'; ?>
<title>ARCHI Daten geändert</title>
</head>
<body>
  <?php include('nav_backend.php'); ?>
  <main class="mt-5">
    <div class="container">
      <h1>Eintrag in der Datenbank geändert</h1>

      <?php
    // Verbindung zur Datenbank herstellen
    include 'db_connect.php';
    
    if ($conn) {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_arch = $_GET['id'];
        extract($_POST);

        // Bildupload verarbeiten, falls ein Bild hochgeladen wurde
        if ($_FILES['foto']['error'] === 0) {
          $filename = $_FILES['foto']['name'];
          $temp_name = $_FILES['foto']['tmp_name'];
          $folder = "";

          if (move_uploaded_file($temp_name, $folder . $filename)) {
            // Bild erfolgreich hochgeladen, füge den Dateipfad in die Datenbank ein
            $foto_path = $folder . $filename;
          } else {
            echo "Fehler beim Hochladen des Bildes.";
            $foto_path = null;
          }
        } else {
          echo "Kein neues Bild wurde hochgeladen.";
          $foto_path = null;
        }

        // SQL-Abfrage vorbereiten
        $sql = "UPDATE `wda_architekt`.`arch_projekte` 
                SET `name` = '$name', 
                    `subtitle` = '$subtitle', 
                    `beschreibung` = '$beschreibung', 
                    `flaeche` = '$flaeche', 
                    `planungbeginn` = '$planungbeginn',
                    `fertigstellung` = '$fertigstellung',
                    `bauzeit` = '$bauzeit'";

        // Füge das Feld für das Bild nur hinzu, wenn ein Bild hochgeladen wurde
        if ($foto_path !== null) {
          $sql .= ", `foto` = '$foto_path'";
        }

        $sql .= " WHERE `id_arch` = '$id_arch'";

        // SQL-Abfrage ausführen
        $result = mysqli_query($conn, $sql);

        if ($result) {
          echo "<p>Daten wurden erfolgreich geändert</p>";
        
        } else {
          echo "<p>Fehler beim Ändern der Daten</p>";
        }
      } else {
        echo "<p>Ungültige Anfrage</p>";
      }

      mysqli_close($conn);
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