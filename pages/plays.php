<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Playful Plants</title>
  <link rel="stylesheet" type="text/css" href="site.css"/>
</head>
<body>

<?php
include_once ('/Applications/Abyss Web Server/htdocs/project3/includes/db.php');
$db = init_sqlite_db('/Applications/Abyss Web Server/htdocs/project3/db/site.sqlite', '/Applications/Abyss Web Server/htdocs/project3/db/init.sql');

$where = '';
$title = '';

if ($_GET['cd'] == 1){$where = "where constructive = 1"; $title = 'Constructive Play Plants';}
elseif ($_GET['cd'] == 2){$where = "where physical = 1"; $title = 'Physical Play Plants'; }
elseif ($_GET['cd'] == 3){$where = "where imaginative = 1"; $title = 'Imaginative Play Plants'; }
elseif ($_GET['cd'] == 4){$where = "where restorative = 1"; $title = 'Restorative Play Plants'; }
elseif ($_GET['cd'] == 5){$where = "where expressive = 1"; $title = 'Expressive Play Plants'; }
elseif ($_GET['cd'] == 6){$where = "where rules = 1"; $title = 'Rules Play Plants'; }
elseif ($_GET['cd'] == 7){$where = "where bio = 1"; $title = 'Bio Play Plants'; }
elseif ($_GET['cd'] == 8){$where = "where classification_id = 1"; $title = 'Shrub'; }
elseif ($_GET['cd'] == 9){$where = "where classification_id = 2"; $title = 'Grass'; }
elseif ($_GET['cd'] == 10){$where = "where classification_id = 3"; $title = 'Vine'; }
elseif ($_GET['cd'] == 11){$where = "where classification_id = 4"; $title = 'Tree'; }
elseif ($_GET['cd'] == 12){$where = "where classification_id = 5"; $title = 'Flower'; }
elseif ($_GET['cd'] == 13){$where = "where classification_id = 6"; $title = 'Groundcovers'; }
elseif ($_GET['cd'] == 14){$where = "where classification_id = 7"; $title = 'Other'; }
elseif ($_GET['cd'] == 15){$where = "where lifespan_id = 1"; $title = 'Perennial'; }
elseif ($_GET['cd'] == 16){$where = "where lifespan_id = 2"; $title = 'Annual'; }

?>
<h2><?php echo $title?></h2>
<?php

$result = exec_sql_query($db, "SELECT plants.id as 'plants.id' , plants.plant_name as 'plants.plant_name', plants.genus_species as 'plants.genus_species', classifications.classification as 'classifications.classification', lifespans.lifespan as 'lifespans.lifespan', ranges.hardiness  as 'ranges.hardiness' FROM  plants inner join classifications on plants.classification_id = classifications.id inner join lifespans  on plants.lifespan_id = lifespans.id inner join ranges on plants.range_id = ranges.id " . $where . " order by plant_name asc;");


$records = $result->fetchAll();
foreach ($records as $record) { ?>

  <div class=thumbnail>

  <h3><a href="details.php?<?php echo http_build_query(array('id' => $record['plants.id'])); ?>" > <?php echo htmlspecialchars($record['plants.plant_name']); ?></a></h3>

    <p>
    Genus, species: <?php echo htmlspecialchars($record['plants.genus_species']); ?>
    </p>

    <p>
    Plant Class: <?php echo $record['classifications.classification'];?>
    </p>

    <p>
    Lifespan: <?php echo $record['lifespans.lifespan'];?>
    </p>

    <p>
    Hardiness Range: <?php echo $record['ranges.hardiness'];?>
    </p>

  </div>

  <?php } ?>

<a href="home.php">Go Back</a>

</body>
</html>
