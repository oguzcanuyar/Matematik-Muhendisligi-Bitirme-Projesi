<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Mutluluk Oranları</title>
  <script src="mapdata.js"></script>
  <!--<script src="mapDataUpdater.js"></script>-->
  <script src="worldmap.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div>
    <div class="center"> <!-- Keep map above fold -->
      <div class="" id="map"></div>

    </div>
  </div>
  <div class="bottom">
    <div class="bottomRight">
    <form action="datamanager.php">
      <input type="submit" value="Update Datas" />
    </form>
    </div>
    <div class="bottomLeft">

    <table class="HappyTable">
    <?php

    // Read the JSON file 
    $json = file_get_contents('countryList.json');

    // Decode the JSON file
    $countries = json_decode($json, true);
    foreach ($countries as $key) {
      echo "<tr><td>".$key["country"]."</td><td>".$key["happyScore"]."</td></tr>";
    }
    ?>
    </table>
    </div>
  </div>
</body>

</html>