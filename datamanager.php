<?php
$servername = "localhost";
$username = "oguzcan";
$password = "oguzcan";

// Create connection
$conn = new mysqli($servername, $username, $password, "mutlulukoranlari");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM mutlulukoranlari.datatable;;";

class CountryData
{
    public $rank, $country, $happyScore, $GDP, $socialSupport, $lifeExpectancy, $freedom_lifeChoices, $Generosity, $perceptionsOfCorruption;
    public $airports, $alcohol, $birthRate, $deathRate, $gdpPerCapita, $internetUsers, $medianAge, $migrationRate;
    public $obesity, $population, $railways, $roadways, $taxRate, $youthUnemployment;
    function __construct($a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10, $a11, $a12, $a13, $a14, $a15, $a16, $a17, $a18, $a19, $a20, $a21, $a22, $a23)
    {
        $this->country = $a2;
        $this->happyScore = $a3;
        $this->socialSupport = $a4;
        $this->lifeExpectancy = $a5;
        $this->freedom_lifeChoices = $a6;
        $this->Generosity = $a7;
        $this->perceptionsOfCorruption = $a8;
        $this->airports = $a9;
        $this->alcohol = $a10;
        $this->birthRate = $a11;
        $this->deathRate = $a12;
        $this->gdpPerCapita = $a13;
        $this->internetUsers = $a14;
        $this->lifeExpectancy = $a15;
        $this->medianAge = $a16;
        $this->migrationRate = $a17;
        $this->obesity = $a18;
        $this->population = $a19;
        $this->railways = $a20;
        $this->roadways = $a21;
        $this->taxRate = $a22;
        $this->youthUnemployment = $a23;


    }
    function echoVals()
    {
       // echo "<td>" . $this->country . "</td>";
    }
}


$result = $conn->query($sql);

if (!empty($result->num_rows) && $result->num_rows > 0) {
    // output data of each row
    $results = [];

    //echo "<table><th>Rank</th><th>Country</th>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        $data = new CountryData(
            $row["Country"],
            $row["HappyScore"],
            $row["Social support"],
            $row["Healty life expectancy"],
            $row["Freedom to make life choices"],
            $row["Generosity"],
            $row["Perceptions of corruption"],
            $row["airports"],
            $row["alcohol"],
            $row["birthRate"],
            $row["deathRate"],
            $row["gdpPerCapita"],
            $row["internetUsers"],
            $row["lifeExpectancy"],
            $row["medianAge"],
            $row["migrationRate"],
            $row["obesity"],
            $row["population"],
            $row["railways"],
            $row["roadways"],
            $row["taxRate"],
            $row["youthUnemployment"],
        );
        $data->echoVals();
        $results[$row["Country"]] = $data;
    }

    $json = json_encode($results);
    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/countryList.json", "wb");
    fwrite($fp, $json);
    fclose($fp);

    //echo "</table>";
    echo "Update Success";
    //header("Location:  index.php", true, 301);
} else {
    echo "0 results";
}

$conn->close();
?>