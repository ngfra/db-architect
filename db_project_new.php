<!DOCTYPE html>
<html lang="en">

<?php include'head.php'; ?>
<title>ARCHI Projekt erstellen</title>
</head>

<body>
  <?php include('nav_backend.php'); ?>

  <main class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Neues Projekt hinzufügen</h1>

          <form action="db_project_insert.php" method="post" enctype="multipart/form-data">
            <label for="name">Projektname</label>
            <input id="name" name="name" type="text" required="">
            <br>
            <label for="subtitle">Ort und Jahr</label>
            <input id="subtitle" name="subtitle" type="text" required="" placeholder="Beispiel: Innsbruck | 2024">
            <br>
            <label for="beschreibung">Beschreibung</label>
            <textarea class="" id="beschreibung" name="beschreibung" required ></textarea>
            <br>
            <label for="flaeche">Fläche</label>
            <input id="flaeche" name="flaeche" type="text" required="">
            <br>
            <label for="planungbeginn">Planungbeginn</label>
            <input id="planungbeginn" name="planungbeginn" type="date" required="" value=<?php echo $planungbeginn; ?>>
            <br>
            <label for="fertigstellung">Fertigstellung</label>
            <input type="date" id="fertigstellung" name="fertigstellung" value=<?php echo $fertigstellung; ?>>
            <br>
            <label for="bauzeit">Bauzeit</label>
            <input type="text" id="bauzeit" name="bauzeit">
            <br>

            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*">
            <br>
            <br>

            <button id="submit" name="submit" type="submit">Neues Projekt erfassen</button>
          </form>
        </div>


      </div>
    </div>
  </main>

</body>


</html>