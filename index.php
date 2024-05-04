<!DOCTYPE html>
<html lang="en">

<?php include'head.php'; ?>
<title>ARCHI Home</title>
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
            <h1 class="h1-h1">WE DESIGN DREAMS</h1>
          </div>
        </div>

        <div class="col-md-12">
          <div>
            <img class="header-img w-100" src=<?php echo 'imgs/'. $foto; ?>>
          </div>
        </div>
      </div>

      <div class="row project-name">
        <p> <?php echo $name ?> <br><span class="subtitle"><?php echo $subtitle ?></span>
        </p>
      </div>
      <div>

        <div class="row">
          <div class="col-md-7">
            <p><?php echo $beschreibung ?></p>
          </div>

          <div class="col-md-5">
            <p><strong>Nuztfläche:</strong> <?php echo $flaeche ?> <br>
              Planungbeginn: <?php echo $planungbeginn ?> <br>
              Fertigstellung: <?php echo $fertigstellung ?><br>
              Bauzeit: <?php echo $bauzeit ?></p>
          </div>
        </div>
        <?php
          }
        }
      }
      ?>
      </div>
  </header>

  <main class="main-container">
    <div class="container">
      <div class="row">
        <div class="text-end section-container">
          <h2 class="h2-h2">ÜBER UNS</h2>
        </div>
      </div>

      <div class="row d-flex ">
        <div class="col-md-7">
          <img class="w-100" src="imgs/Tom-Lechner.jpeg" alt="Tom Lechner Geschäftführer">
          <p class="mt-2 fs-5">Tom Lechner – Geschäftführer</p>
        </div>

        <div class="col-md-5">
          <p>Im Pongau vermittelt seit 2000 der aus Altenmarkt stammende Architekt Tom Lechner – am Beginn in Partnerschaft mit Alexander Pedevilla – hartnäckig und mit stetig wachsendem Erfolg zeitgemäße Architektur durch gebaute Beispiele und Debatten. LP architektur setzte den Be- oder Verhinderungsversuchen in den Gemeindestuben und dem Widerstand von Beiräten den Dialog entgegen. Die wachsende Wahrnehmung des Mehrwerts qualitätsvoller Architekturkonzepte und die Anerkennung durch Auszeichnungen erleichtern mittlerweile Lechners Arbeit. </p>
        </div>
      </div>
    </div>

    <div class="container">
    <div class="row mt-3">
        <div class="col-md-4 ">
          <img class="w-100" src="imgs/Barbara-Vierthaler.jpeg" alt="">
          <p class="mt-2">Barbara Vierthaler – Büroleitung</p>
          <p>Das Herzstück unseres Teams. Mit jahrelanger Erfahrung und einem ausgeprägten Sinn für Organisation und Effizienz sorgt sie dafür, dass jedes Projekt reibungslos abläuft. Durch ihre visionäre Führung und strategische Planung gewährleistet sie höchste Qualität und Kundenzufriedenheit.</p>
        </div>

        <div class="col-md-4 ">
          <img class="w-100" src="imgs/Christian-Ruthner.jpeg" alt="">
          <p class="mt-2">Christian Ruthner – Planung</p>
          <p>Der kreative Visionär mit einem Auge für Detail und Funktionalität. Durch seine fundierte Fachkenntnis und sein innovatives Denken bringt er frische Ideen in jedes Projekt ein. Seine Leidenschaft für Design und seine Fähigkeit, Kundenwünsche zu interpretieren, machen ihn zu einem unverzichtbaren Mitglied unseres Teams.</p>
        </div>

        <div class="col-md-4 ">
          <img class="w-100" src="imgs/Fritz-Schenner.jpeg" alt="">
          <p class="mt-2">Fritz Schenner - Planung</p>
          <p>Ein äußerst engagierter Profi, der sich leidenschaftlich für die Umsetzung Ihrer Träume einsetzt. Mit einem starken Sinn für Ästhetik und Präzision arbeitet er daran, Ihre Anforderungen in innovative architektonische Konzepte zu verwandeln. Seine Beharrlichkeit und sein Engagement machen ihn zu einem wertvollen Mitglied unseres Teams.</p>
        </div>
      </div>
    </div>
  </main>

  <?php include('footer.php');?>
</body>

</html>