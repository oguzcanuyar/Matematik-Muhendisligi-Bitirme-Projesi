<!DOCTYPE html>
<html>
<style>
  body,
  html {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  .container {
    display: flex;
    flex-direction: column;
    height: 100%;
  }

  .top-div {
    flex: 5;
    display: flex;
    overflow: hidden;
  }

  .left-div {
    flex: 4;
    border: 1px solid black;
  }

  .right-div {
    flex: 1;
    border: 1px solid black;
    overflow: hidden;
    display: flex;
    flex-direction: column;
  }

  .scrollable-table {
    flex: 1;
    overflow: auto;
  }

  .bottom-div {
    flex: 2;
    display: flex;
    overflow: hidden;
  }

  .sub-div {
    flex: 1;
    border: 1px solid black;
    overflow: auto;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  th,
  td {
    border: 1px solid black;
    padding: 8px;
  }
</style>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>World Happiness Map</title>
<script type="text/javascript" src="countryList.js"></script>
<script src="mapdata.js"></script>
<script src="worldmap.js"></script>
<link rel="stylesheet" href="mystyle.css">


<body>

  <div class="container">
    <div class="top-div">
      <div class="left-div">
        <div class="baslik">World Happiness Map</div>
        <div class="" id="map"></div>
      </div>
      <div class="right-div">
        <div class="scrollable-table">
          <table>
            <thead>
              <th colspan="100%">
                Happiest countries Index
              </th>
            </thead>
            <thead>
              <tr>
                <th>Rank</th>
                <th>Country Name</th>
                <th>Score</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $json = file_get_contents('countryList.json');
              $countries = json_decode($json, true);
              $i = 1;
              foreach ($countries as $key) {
                echo "<tr><td>" . $i . "</td><td>" . $key["country"] . "</td><td>" . $key["happyScore"] . "</td></tr>";
                $i++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="bottom-div">
      <div class="sub-div">
        <div class="scrollable-table">
          <table>
            <thead>
              <tr>
                <th>Country Name</th>
                <th>TaxRate/GDP</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $json = file_get_contents('countryList.json');
              $countries = json_decode($json, true);
              foreach ($countries as $key) {
                echo "<tr><td>" . $key["country"] . "</td><td>" . $key["taxRate"] . "</td></tr>";
                $i++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="sub-div">
        <div class="scrollable-table">
          <table>
            <thead>
              <tr>
                <th>Country Name</th>
                <th>Life Expectancy</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $json = file_get_contents('countryList.json');
              $countries = json_decode($json, true);
              foreach ($countries as $key) {
                echo "<tr><td>" . $key["country"] . "</td><td>" . ($key["lifeExpectancy"] == 0 ? "-" : $key["lifeExpectancy"]) . "</td></tr>";
                $i++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="sub-div">

        <div class="scrollable-table">
          <table>
            <thead>
              <tr>
                <th>Country Name</th>
                <th>GDP Per Capita</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $json = file_get_contents('countryList.json');
              $countries = json_decode($json, true);
              foreach ($countries as $key) {
                echo "<tr><td>" . $key["country"] . "</td><td>" . $key["gdpPerCapita"] . "</td></tr>";
                $i++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="sub-div">

        <div class="scrollable-table">
          <table>
            <thead>
              <tr>
                <th>Country Name</th>
                <th> Youth Unemployment Rate</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $json = file_get_contents('countryList.json');
              $countries = json_decode($json, true);
              foreach ($countries as $key) {
                echo "<tr><td>" . $key["country"] . "</td><td>" . $key["youthUnemployment"] . "%</td></tr>";
                $i++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="sub-div">

        <div class="scrollable-table">
          <table>
            <thead>
              <tr>
                <th>Country Name</th>
                <th>Population</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $json = file_get_contents('countryList.json');
              $countries = json_decode($json, true);
              $i = 1;
              foreach ($countries as $key) {
                echo "<tr><td>" . $key["country"] . "</td><td>" . $key["population"] . "</td></tr>";
                $i++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="sub-div">

        <div class="scrollable-table">
          <table>
            <thead>
              <tr>
                <th>Country Name</th>
                <th>Airports</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $json = file_get_contents('countryList.json');
              $countries = json_decode($json, true);
              $i = 1;
              foreach ($countries as $key) {
                echo "<tr><td>" . $key["country"] . "</td><td>" . $key["airports"] . "</td></tr>";
                $i++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="sub-div">

        <div class="scrollable-table">
          <table>
            <thead>
            <th colspan="100%">
                Correlation Results
              </th>
              <tr>
                <th>Index</th>
                <th>Result</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $servername = "localhost";
              $username = "oguzcan";
              $password = "oguzcan";
              $conn = new mysqli($servername, $username, $password, "mutlulukoranlari");
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              $sql = "SELECT * FROM mutlulukoranlari.correlationresults;";
              $result = $conn->query($sql);

              if (!empty($result->num_rows) && $result->num_rows > 0) {
                $results = [];

                while ($row = $result->fetch_assoc()) {
                  echo "<tr><td>" . $row["IndexName"] . "</td><td>" . $row["CorrelationResult"] . "</td></tr>";
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</body>

</html>