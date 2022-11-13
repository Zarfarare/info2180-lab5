<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country =$_GET['country'];
$country = strtolower(filter_var($country, FILTER_SANITIZE_STRING));
$lookup = filter_input(INPUT_GET, 'lookup', FILTER_SANITIZE_STRING);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if ($lookup == 'cities'){
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities INNER JOIN countries ON cities.country_code=countries.code WHERE countries.name LIKE '%$country%'");
}else{
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if($lookup == "cities"): ?>
  <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>District</th>
            <th>Population</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($results as $row): ?>
            <tr>
                <td><?= $row['name']?></td>
                <td><?= $row['district']?></td>
                <td><?= $row['population']?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
 
<?php else: ?>
  <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Continent</th>
            <th>Independence Year</th>
            <th>Head of State</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($results as $row): ?>
            <tr>
                <td><?= $row['name']?></td>
                <td><?= $row['continent']?></td>
                <td><?= $row['independence_year']?></td>
                <td><?= $row['head_of_state']?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>