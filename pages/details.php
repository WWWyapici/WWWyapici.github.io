<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Playful Plants</title>
  <link rel="stylesheet" type="text/css" href="site.css"/>
</head>
<body>
<h1>Playful Plants</h1>

<?php
include_once ('/Applications/Abyss Web Server/htdocs/project3/includes/sessions.php');
include_once ('/Applications/Abyss Web Server/htdocs/project3/includes/db.php');
$db = init_sqlite_db('/Applications/Abyss Web Server/htdocs/project3/db/site.sqlite', '/Applications/Abyss Web Server/htdocs/project3/db/init.sql');

$result = exec_sql_query($db, 'SELECT * FROM  plants inner join classifications on plants.classification_id = classifications.id
    inner join lifespans  on plants.lifespan_id = lifespans.id
    inner join ranges on plants.range_id = ranges.id
  where plants.id = ' . $_GET['id'] . ' order by plant_name asc;');

$records = $result->fetchAll();

foreach ($records as $record) { ?>


<div class=thumbnail>

  <h1><?php echo htmlspecialchars($record['plant_name']); ?></a></h1>

  <p>
  Genus, species: <?php echo htmlspecialchars($record['genus_species']); ?>
  </p>

  <p>
  <?php if ($record['constructive'] == 1) {
  echo 'Constructive Play';}?>
  </p>
  <p>
  <?php if ($record['physical'] == 1) {
  echo 'Physical Play';}?>
  </p>
  <p>
  <?php if ($record['restorative'] == 1) {
  echo 'Restorative Play';}?>
  </p>
  <p>
  <?php if ($record['expressive'] == 1) {
  echo 'Expressive Play';}?>
  </p>
  <p>
  <?php if ($record['rules'] == 1) {
  echo 'Rules Play';}?>
  </p>
  <p>
  <?php if ($record['bio'] == 1) {
  echo 'Bio Play';}?>
  </p>

  <p>
  Plant Class : <?php echo $record['classification'];?>
  </p>

  <p>
  Lifespan : <?php echo $record['lifespan'];?>
  </p>

  <p>
  Hardiness Range : <?php echo $record['hardiness'];?>
  </p>

  <a class="align-right" href="home.php">Go Back</a>

</div>

<?php } ?>

</body>

</html>
