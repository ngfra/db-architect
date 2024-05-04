<!DOCTYPE html>
<html lang="en">
  
<?php include'head.php'; ?>
<title>ARCHI Projekt gespeichert</title>
</head>

<body>
  <?php include('nav_backend.php'); ?>

  <main class="mt-5">
    <div class="container">
      <?php

if (isset($_POST['submit'])) {
  extract($_POST);
  include 'db_connect.php';
  
  if ($conn) {

    // echo $filename;

      $sql = "INSERT INTO arch_projekte
      (name, 
      subtitle,
      beschreibung, 
      flaeche, 
      planungbeginn, 
      fertigstellung,
      bauzeit,
      foto) 
       VALUES ('$name','$subtitle','$beschreibung','$flaeche','$planungbeginn','$fertigstellung','$bauzeit','$filename')";
       $result = mysqli_query($conn, $sql); 
      //  echo $sql;

       if ($result) {
         echo "<h1>Erfolgreich gespeichert!</h1>";
       } else {
         echo "<h1>Fehler beim Speichern</h1>";
       }
  }

  if ($_FILES['foto']['error'] > 0) {
    echo "<p>Kein neues Bild wurde hochgeladen.</p>";
    $filename= '';
  } else {
    $filename = get_uploaded_file($_FILES['foto']['name'], $_FILES['foto']['tmp_name']);
  }
}

function get_uploaded_file($file, $tmp_file) {
  echo "<br> Neues Bild wird gespeichert: " . $file;
  echo "<br> tmp_file:" . $tmp_file;

  $newName = time() . '_' . $file;
  $destination = 'imgs/' . $newName;

  if (move_uploaded_file($tmp_file, $destination)){
    echo "<br> Datei erfolgreich hochgeladen " . $newName;
  }

  return $newName;
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