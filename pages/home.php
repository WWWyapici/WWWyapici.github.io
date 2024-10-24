<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Playful Plants</title>
  <link rel="stylesheet" type="text/css" href="site.css" />
</head>

<body>

  <?php

  // feedback message CSS classes
  $name_feedback_class = 'hidden';
  $genus_feedback_class = 'hidden';
  $species_feedback_class = 'hidden';
  $id_feedback_class = 'hidden';
  $type_feedback_class = 'hidden';

  // variables
  $sql_filter_expressions = array();
  $sql_where_part = "";
  $sort = '';

  // radio variable
  $radio_val = 'asc';

  // values
  $name = '';
  $genus = '';
  $species = '';
  $id = '';

  $constructive = '';
  $physical = '';
  $imaginative = '';
  $restorative = '';
  $expressive = '';
  $rules = '';
  $bio = '';


  // sticky values
  $sticky_name = '';
  $sticky_genus = '';
  $sticky_species = '';
  $sticky_id = '';

  $sticky_constructive = '';
  $sticky_physical = '';
  $sticky_imaginative = '';
  $sticky_restorative = '';
  $sticky_expressive = '';
  $sticky_rules = '';
  $sticky_bio = '';

  // filter values

  $filter_constructive = '';
  $filter_physical = '';
  $filter_imaginative = '';
  $filter_restorative = '';
  $filter_expressive = '';
  $filter_rules = '';
  $filter_bio = '';


  // sticky values

  $sticky_az = '';
  $sticky_za = '';

  $sticky_constructive_filter = '';
  $sticky_physical_filter = '';
  $sticky_imaginative_filter = '';
  $sticky_restorative_filter = '';
  $sticky_expressive_filter = '';
  $sticky_rules_filter = '';
  $sticky_bio_filter = '';

  ?>

  <?php
include_once("/Applications/Abyss Web Server/htdocs/project3/includes/sessions.php");
include_once ('/Applications/Abyss Web Server/htdocs/project3/includes/db.php');
$db = init_sqlite_db('/Applications/Abyss Web Server/htdocs/project3/db/site.sqlite', '/Applications/Abyss Web Server/htdocs/project3/db/init.sql');
// $session_messages = array();
// process_session_params($db, $session_messages);


  ?>

  <h1>Playful Plants</h1>


  <!-- session related -->
  <?php

  $session_messages = array();
  process_session_params($db, $session_messages);
  if (!is_user_logged_in()){
  echo_login_form('home.php', $session_messages);}
  else {?> <p class="align-right" > <?php echo "Welcome, " . htmlspecialchars($current_user['name']);} ?></p>



  <div>
  <?php
    if (is_user_logged_in()){ ?>
    <p class="align-left"> <a href="admin_page.php">Admin Page View</a></p>
  <?php } ?>
  </div>

  <hr>

  <h2>Plant Catalog</h2>


  <div class="catalog">
    <div class="hide">
    <div class="filters">

      <form id="filter-sort" method="get" action="" novalidate>

        <div class="padding-ten">
          <label for="az_sort">Sort by:</label>
          <label for="az_sort">A-Z</label>
          <input type="radio" id="az_sort" name="sort" value="asc">
          <label for="za_sort">Z-A</label>
          <input type="radio" id="za_sort" name="sort" value="desc">
        </div>
        <div>
          <input class="margin-fifteen" type="submit" name="submit">
        </div>


        <fieldset>
          <legend>Choose your play types</legend>

          <div class="label-input">
            <input type="checkbox" name="constructive" id="select-constructive" value="1" <?php echo $sticky_constructive_filter; ?> />
            <label for="select-constructive">Constructive Play</label>
          </div>

          <div class="label-input">
            <input type="checkbox" name="physical" id="select-physical" value="1" <?php echo $sticky_physical_filter; ?> />
            <label for="select-physical">Physical Play</label>
          </div>

          <div class="label-input">
            <input type="checkbox" name="imaginative" id="select-imaginative" value="1" <?php echo $sticky_imaginative_filter; ?> />
            <label for="select-imaginative">Imaginative Play</label>
          </div>

          <div class="label-input">
            <input type="checkbox" name="restorative" id="select-restorative" value="1" <?php echo $sticky_restorative_filter; ?> />
            <label for="select-restorative">Restorative Play</label>
          </div>

          <div class="label-input">
            <input type="checkbox" name="expressive" id="select-expressive" value="1" <?php echo $sticky_expressive_filter; ?> />
            <label for="select-expressive">Expressive Play</label>
          </div>

          <div class="label-input">
            <input type="checkbox" name="rules" id="select-rules" value="1" <?php echo $sticky_rules_filter; ?> />
            <label for="select-rules">Play with Rules</label>
          </div>

          <div class="label-input">
            <input type="checkbox" name="bio" id="select-bio" value="1" <?php echo $sticky_bio_filter; ?> />
            <label for="select-bio">Bio Play</label>
          </div>

          <div class="align-right">
            <input id="filter-items" type="submit" name="filter" value="Apply Filter" />
          </div>
        </fieldset>


        <h3>Play Categories</h3>

        <div><a href='plays.php?cd=1'>Constructive Play</a></div>
        <div><a href='plays.php?cd=2'>Physical Play</a></div>
        <div><a href='plays.php?cd=3'>Imaginative Play</a></div>
        <div><a href='plays.php?cd=4'>Restorative Play</a></div>
        <div><a href='plays.php?cd=5'>Expressive Play</a></div>
        <div><a href='plays.php?cd=6'>Rules Play</a></div>
        <div><a href='plays.php?cd=7'>Bio Play</a></div>

        <!-- <div><a href='/play-type?cd=1'>Constructive Play</a></div>
        <div><a href='/play-type?cd=2'>Physical Play</a></div>
        <div><a href='/play-type?cd=3'>Imaginative Play</a></div>
        <div><a href='/play-type?cd=4'>Restorative Play</a></div>
        <div><a href='/play-type?cd=5'>Expressive Play</a></div>
        <div><a href='/play-type?cd=6'>Rules Play</a></div>
        <div><a href='/play-type?cd=7'>Bio Play</a></div> -->

        <h3>Plant Classification</h3>

        <div><a href='plays.php?cd=8'>Shrub</a></div>
        <div><a href='plays.php?cd=9'>Grass</a></div>
        <div><a href='plays.php?cd=10'>Vine</a></div>
        <div><a href='plays.php?cd=11'>Tree</a></div>
        <div><a href='plays.php?cd=12'>Flower</a></div>
        <div><a href='plays.php?cd=13'>Groundcover</a></div>
        <div><a href='plays.php?cd=14'>Other</a></div>

        <!-- <div><a href='/play-type?cd=8'>Shrub</a></div>
        <div><a href='/play-type?cd=9'>Grass</a></div>
        <div><a href='/play-type?cd=10'>Vine</a></div>
        <div><a href='/play-type?cd=11'>Tree</a></div>
        <div><a href='/play-type?cd=12'>Flower</a></div>
        <div><a href='/play-type?cd=13'>Groundcover</a></div>
        <div><a href='/play-type?cd=14'>Other</a></div> -->

        <h3>Plant Lifespan</h3>

        <div><a href='plays.php?cd=15'>Perennial</a></div>
        <div><a href='plays.php?cd=16'>Annual</a></div>

        <!-- <div><a href='/play-type?cd=15'>Perennial</a></div>
        <div><a href='/play-type?cd=16'>Annual</a></div> -->

    </div>
    </div>



    </form>

    <!-- sort part -->
    <?php
    if (isset($_GET["submit"])) {
      if (isset($_GET["sort"])) {
        $radio_val = $_GET["sort"];
      } else {
        $radio_val = "asc";
      }
    }
    ?>

    <!-- filter part -->
    <?php

    // values; Store as true ('1') or false (NULL)
    $filter_constructive = (bool)($_GET['constructive'] ?? 0); // untrusted
    $filter_physical = (bool)($_GET['physical'] ?? 0); // untrusted
    $filter_imaginative = (bool)($_GET['imaginative'] ?? 0); // untrusted
    $filter_restorative = (bool)($_GET['restorative'] ?? 0); // untrusted
    $filter_expressive = (bool)($_GET['expressive'] ?? 0); // untrusted
    $filter_rules = (bool)($_GET['rules'] ?? 0); // untrusted
    $filter_play = (bool)($_GET['bio'] ?? 0); // untrusted


    // sticky values
    $sticky_constractive_filter = ($filter_constructive ? 'checked' : '');
    $sticky__physical_filter = ($filter_physical ? 'checked' : '');
    $sticky__imaginative_filter = ($filter_imaginative ? 'checked' : '');
    $sticky_restorative_filter = ($filter_restorative ? 'checked' : '');
    $sticky_expressive_filter = ($filter_expressive ? 'checked' : '');
    $sticky_rules_filter = ($filter_rules ? 'checked' : '');
    $sticky_bio_filter = ($filter_bio ? 'checked' : '');

    if ($filter_constructive) {
      array_push($sql_filter_expressions, "(constructive = 1)");
    }

    if ($filter_physical) {
      array_push($sql_filter_expressions, "(physical = 1)");
    }

    if ($filter_imaginative) {
      array_push($sql_filter_expressions, "(imaginative = 1)");
    }

    if ($filter_restorative) {
      array_push($sql_filter_expressions, "(restorative = 1)");
    }

    if ($filter_expressive) {
      array_push($sql_filter_expressions, "(expressive = 1)");
    }

    if ($filter_rules) {
      array_push($sql_filter_expressions, "(rules = 1)");
    }

    if ($filter_bio) {
      array_push($sql_filter_expressions, "(bio = 1)");
    }

    if (count($sql_filter_expressions) > 0) {
      $sql_where_part = ' WHERE ' . implode(' OR ', $sql_filter_expressions);
    }

    ?>

    <div class="tile-list">

      <?php
      $result = exec_sql_query($db, 'SELECT * FROM plants ' . $sql_where_part . 'order by plant_name ' . $radio_val . ';');

      $records = $result->fetchAll();

      if (count($records) > 0) {

        foreach ($records as $record) { ?>

          <a href="details.php?<?php echo http_build_query(array('id' => $record['id'])); ?>">
            <img src="<?php echo $record['id'] . '.' . $record['image_type']; ?>" alt="<?php echo htmlspecialchars($record['plant_name']); ?>" width="250" height="250" />
            <h3><?php echo ucfirst($record['plant_name']); ?></h3>
          </a>
        <?php
        } ?>

      <?php
      } else { ?>

        <p>No results found.</p>

      <?php } ?>


    </div>


</body>

</html>
