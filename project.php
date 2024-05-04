<!DOCTYPE html>
<html lang="en">

<?php include'head.php'; ?>
<title>ARCHI Alle Projekte</title>
</head>
<body>

  <?php include('nav.php'); ?>

  <header>
    <div class="container">
      <?php
      // Verbindung zur Datenbank herstellen
      include 'db_connect.php';
      
      if ($conn) {
        $sql = "SELECT * FROM wda_architekt.arch_projekte WHERE fertigstellung ='2024' ORDER BY RAND() LIMIT 1";
        $result = mysqli_query($conn, $sql);
  
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            extract($row);
            ?>

            <div class="row d-flex justify-content-center align-items-center">
              <div class="col-md-12">
                <div>
                  <h1 class="h1-h1">OUR PROJECTS</h1>
                </div>
              </div>

              <div class="col-md-12">
                <div>
                  <img class="header-img w-100" src=<?php echo 'imgs/'. $foto; ?>>
                </div>
              </div>
            </div>

            <?php
          }
        }
      }
      ?>
    </div>

    <div class="container">
    <div class="row mt-5 mb-3">
        <div>
          <h2 class="text-uppercase">Your all in one solution</h2>
          <p class="col-md-6">Es gibt viele Lösungen für dein Haus. Aber nur wenige, die dich überzeugen werden. Einige
            gute Gründe für Archi Vision:</p>
        </div>
      </div>

      <div class="row mb-5">
        <div class="col-md-4">
          <p class="text-uppercase fs-5"><img class="me-2" width="50px" src="imgs/individuell-icon.png" alt="">individuell</p>
          <p>Archi Vision bedeutet grenzenlose Individualität, denn dein wichtigster Lebensraum sollte sich ganz nach
            deinen Wünschen richten</p>
        </div>

        <div class="col-md-4">
          <p class="text-uppercase fs-5"><img class="me-2" width="50px" src="imgs/nachhaltig-icon.png" alt="">nachhaltig</p>
          <p>Für dein Haus verwenden wir ausschließlich sorgfältig ausgewähltes Holz aus nachhaltig bewirtschafteten
            regionalen Wäldern.</p>
        </div>

        <div class="col-md-4">
          <p class="text-uppercase fs-5"><img class="me-2" width="50px" src="imgs/premium-icon.png" alt="">premium</p>
          <p>Qualität prägt jedes unserer individuellen Häuser. Von der innovativen Planung über die exakte Fertigung
            bis hin zur reibungslosen Montage.</p>
        </div>
      </div>
    </div>
  </header>

  <main>
    <div class="container">
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

            <div class="row project-name-container mt-5  ">
              <div class="d-flex justify-content-between ">
                <div class="d-flex align-items-end gap-3 flex-column flex-md-row">
                  <h3 class="text-uppercase m-0"><?php echo $name ?></h3>
                  <?php echo $subtitle ?>
                </div>

                <div class="h3"><?php echo $id_arch ?></div>
              </div>
            </div>

            <div class="row d-flex justify-content-center align-items-start flex-md-row flex-column-reverse flex-sm-column-reverse my-5 ">
              <div class="col-md-5">
                <p><?php echo $beschreibung ?></p>
                <p><strong>Nutzfläche:</strong> <?php echo $flaeche ?> <br>
                  Planungsbeginn: <?php echo $planungbeginn ?> <br>
                  Fertigstellung: <?php echo $fertigstellung ?><br>
                  Bauzeit: <?php echo $bauzeit ?></p>
              </div>

              <div class="col-md-7 mb-3 ">
                <img class=" w-100" src=<?php echo 'imgs/'. $foto; ?>>
              </div>
            </div>

            <?php
          }
        }
      }
      ?>
    </div>
  </main>

  <?php include('footer.php');?>
</body>

</html>
