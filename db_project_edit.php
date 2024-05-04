<!DOCTYPE html>
<html lang="en">

<?php include'head.php'; ?>
<title>ARCHI Projekt bearbeiten</title>
</head>

<body>
<?php include('nav_backend.php'); ?>
<main  class="mt-5">
  <div class="container">
      <h1>Projekt bearbeiten</h1>

      <?php 
        include 'db_connect.php';

        if ($conn) {
          $id_arch = $_GET['id'];

          $sql = "SELECT * FROM `wda_architekt`.`arch_projekte` WHERE (`id_arch` = '$id_arch')";
         
          $result = mysqli_query($conn, $sql);

          $row = mysqli_fetch_assoc($result); 

          extract($row);

          mysqli_close($conn);
        }
      ?>

      <form action="db_project_update.php?id=<?php echo $id_arch; ?>" method="post" enctype="multipart/form-data">
        <label for="name">Projektname</label>
        <input id="name" name="name" type="text" required="" value=<?php echo $name; ?>>
        <br>
        <label for="subtitle">Ort und Zeit</label>
        <input id="subtitle" name="subtitle" type="text" required="" value=<?php echo $subtitle; ?>>
        <br>
        <label for="beschreibung">Beschreibung</label>
     
        <textarea class="" id="beschreibung" name="beschreibung" required><?php echo $beschreibung; ?></textarea>
        <br>
        <label for="flaeche">Fläche</label>
        <input id="flaeche" name="flaeche" type="text" required="" value=<?php echo $flaeche; ?>>
        <br>
        <label for="planungbeginn">Planungbeginn</label>
        <input id="planungbeginn" name="planungbeginn" type="date" required="" value=<?php echo $planungbeginn; ?>>
        <br>
        <label for="fertigstellung">Fertigstellung</label>
        <input type="date" id="fertigstellung" name="fertigstellung" value=<?php echo $fertigstellung; ?>>
        <br>

        <label for="bauzeit">Bauzeit</label>
        <input type="text" id="bauzeit" name="bauzeit" value="<?php echo $bauzeit; ?>">
        <br>
        
        <label for="foto">Foto:</label>
        <input id="foto" type="file" name="foto" accept="image/*">

        <button id="submit" name="submit" type="submit">Änderungen speichern</button>
      </form>
   
  </div>
  </main>

  
</body>

</html>