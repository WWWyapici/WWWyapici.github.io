<?php

include_once ('/Applications/Abyss Web Server/htdocs/project3/includes/sessions.php');

include_once ('/Applications/Abyss Web Server/htdocs/project3/includes/db.php');

$db = init_sqlite_db('/Applications/Abyss Web Server/htdocs/project3/db/site.sqlite', '/Applications/Abyss Web Server/htdocs/project3/db/init.sql');



  // feedback message CSS classes

  $plant_name_feedback_class = 'hidden';

  $genus_species_feedback_class = 'hidden';

  $plant_id_feedback_class = 'hidden';

  $classification_id_feedback_class = 'hidden';

  $lifespan_id_feedback_class = 'hidden';

  $range_id_feedback_class = 'hidden';

  $play_type_feedback_class = 'hidden';

  $image_feedback_class = 'hidden';


  // variables

  $sql_filter_expressions = array();

  $sql_where_part = "";

  $plant_image = "";

  $sort = '';

  $form_valid = True;

  $Plant_id_not_unique = False;

  $record_inserted = False;

  // radio variable

  $radio_val = 'asc';



  // values

  $plant_name = null;

  $plant_genus_species = null;

  $plant_id = null;



  $constructive = 0;

  $physical = 0;

  $imaginative = 0;

  $restorative = 0;

  $expressive = 0;

  $rules = 0;

  $bio = 0;

  $classification_id = 0;
  $classification_id0 = 0;
  $classification_id1 = 0;
  $classification_id2 = 0;
  $classification_id3 = 0;
  $classification_id4 = 0;
  $classification_id5 = 0;
  $classification_id6 = 0;
  $classification_id7 = 0;

  $lifespan_id = 0;
  $lifespan_id0 = 0;
  $lifespan_id1 = 0;
  $lifespan_id2 = 0;

  $range_id = 0;
  $range_id0 = 0;
  $range_id1 = 0;
  $range_id2 = 0;
  $range_id3 = 0;
  $range_id4 = 0;
  $range_id5 = 0;
  $range_id6 = 0;
  $range_id7 = 0;
  $range_id8 = 0;

  $image_type = null;
  $upload_filename = null;
  $upload_ext = null;
  $record_id = null;



  // sticky values

  $sticky_plant_name = '';

  $sticky_genus_species = '';

  $sticky_plant_id = '';



  $sticky_constructive = '';

  $sticky_physical = '';

  $sticky_imaginative = '';

  $sticky_restorative = '';

  $sticky_expressive = '';

  $sticky_rules = '';

  $sticky_bio = '';

  $sticky_classification_id = '';

  $sticky_classification_id0 = '';

  $sticky_classification_id1 = '';

  $sticky_classification_id2 = '';

  $sticky_classification_id3 = '';

  $sticky_classification_id4 = '';

  $sticky_classification_id5 = '';

  $sticky_classification_id6 = '';

  $sticky_classification_id7 = '';

  $sticky_lifespan_id = '';

  $sticky_lifespan_id0 = '';

  $sticky_lifespan_id1 = '';

  $sticky_lifespan_id2 = '';

  $sticky_range_id = '';

  $sticky_range_id0 = '';

  $sticky_range_id1 = '';

  $sticky_range_id2 = '';

  $sticky_range_id3 = '';

  $sticky_range_id4 = '';

  $sticky_range_id5 = '';

  $sticky_range_id6 = '';

  $sticky_range_id7 = '';

  $sticky_range_id8 = '';

  $sticky_range_id9 = '';

  $sticky_image_type = '';


?>


<!-- // insert plant -->

<?php

define("MAX_FILE_SIZE",1000000);


if (isset($_POST["new-entry"])) {

  // file upload

  $upload = $_FILES['upload-file'];

  $upload_filename = basename($upload['name']);

  $upload_ext = strtolower(pathinfo($upload_filename, PATHINFO_EXTENSION));

  $image_type = $upload_ext;



    $plant_name = trim($_POST['plant-name']);

    $plant_genus_species = trim($_POST['plant-genus-species']);

    $plant_id = trim($_POST['plant-id']);

    $classification_id = trim($_POST['classificationid']);

    $lifespan_id = trim($_POST['lifespanid']);

    $range_id = trim($_POST['rangeid']);



    $form_valid = True;



    // name is required

    if (empty($plant_name)) {

      $form_valid = False;

      $plant_name_feedback_class = '';

    }



    // genus is required

    if (empty($plant_genus_species)) {

      $form_valid = False;

      $genus_species_feedback_class = '';

    }



    //plant_id is required

    if (empty($plant_id)) {

      $form_valid = False;

      $plant_id_feedback_class = '';

    }



    if(isset($_POST['constructive-play'])){
      $constructive=1;
    } else {
      $constructive=0;
    }

    if(isset($_POST['physical-play'])){
      $physical=1;
    } else {
      $physical=0;
    }

    if(isset($_POST['imaginative-play'])){
      $imaginative=1;
    } else {
      $imaginative=0;
    }

    if(isset($_POST['restorative-play'])){
      $restorative=1;
    } else {
      $restorative=0;
    }

    if(isset($_POST['expressive-play'])){
      $expressive=1;
    } else {
      $$expressive=0;
    }

    if(isset($_POST['rules-play'])){
      $rules=1;
    } else {
      $rules=0;
    }

    if(isset($_POST['bio-play'])){
      $bio=1;
    } else {
      $bio=0;
    }

    // Was at least one check box checked?
    echo $constructive; echo $physical; echo $imaginative; echo $restorative; echo $expressive; echo $rules; echo $bio;
    if ($constructive == 0 && $physical == 0 && $imaginative == 0 && $restorative == 0 && $expressive == 0 && $rules == 0 && $bio == 0) {

    // if (empty($constructive) && empty($physical) && empty($imaginative) && empty($restorative) && empty($expressive) && empty($rules) && empty($bio)) {


      $form_valid = False;

      $play_type_feedback_class = '';
    }


    if (empty($classification_id)) {
      $classification_id = 0;
    }
    else  {
      $classification_id = trim($_POST['classificationid']);
    }


    if (empty($lifespan_id)) {
      $lifespan_id = 0;
    }
    else  {
      $lifespan_id = trim($_POST['lifespanid']);
    }

    if (empty($range_id)) {
      $range_id = 0;
    }
    else  {
      $range_id = trim($_POST['rangeid']);
    }



    if ($form_valid) {

      //insert new record

      $db -> beginTransaction();


      $result = exec_sql_query(

        $db,

        "INSERT INTO plants (plant_name, genus_species,plant_id,constructive,physical,imaginative,restorative,expressive,rules,bio,classification_id,lifespan_id,range_id,image_type)

       VALUES (:plant_name,:genus_species,:plant_id,:constructive,:physical,:imaginative,:restorative,:expressive,:rules,:bio,:classificationid,:lifespanid,:rangeid,:image_type);",

        array(

          ':plant_name' => $plant_name,

          ':genus_species' => $plant_genus_species,

          ':plant_id' => $plant_id,

          ':constructive' => $constructive,

          ':physical' => $physical,

          ':imaginative' => $imaginative,

          ':restorative' => $restorative,

          ':expressive' => $expressive,

          ':rules' => $rules,

          ':bio' => $bio,

          ':classificationid' => $classification_id,

          ':lifespanid' => $lifespan_id,

          ':rangeid' => $range_id,

          ':image_type' => $image_type)

      );



      if ($result) {

        $record_inserted = True;

        // move uploaded file
        $record_id = $db->lastInsertId('id');

        $id_filename = "/Applications/Abyss Web Server/htdocs/project3/pages/" .  $record_id . '.' . $upload_ext;

        move_uploaded_file($upload['tmp_name'],$id_filename);

        $db -> commit();

      }

    } else {

      // form is invalid, set sticky values

      $sticky_plant_name = $plant_name;

      $sticky_genus_species = $plant_genus_species;

      $sticky_plant_id = $plant_id;



      $sticky_constructive = (!$constructive == 0 ? 'checked' : '');

      $sticky_physical = (!$physical == '' ? 'checked' : '');

      $sticky_imaginative = (!$imaginative == '' ? 'checked' : '');

      $sticky_restorative = (!$restorative == '' ? 'checked' : '');

      $sticky_expressive = (!$expressive == '' ? 'checked' : '');

      $sticky_rules = (!$rules == '' ? 'checked' : '');

      $sticky_bio = (!$bio == '' ? 'checked' : '');



      $sticky_classification_id0 = ($classification_id0 == '-' ? 'selected' : '');

      $sticky_classification_id1 = ($classification_id1 == 'Shrub' ? 'selected' : '');

      $sticky_classification_id2 = ($classification_id2 == 'Grass' ? 'selected' : '');

      $sticky_classification_id3 = ($classification_id3 == 'Vine' ? 'selected' : '');

      $sticky_classification_id4 = ($classification_id4 == 'Tree' ? 'selected' : '');

      $sticky_classification_id5 = ($classification_id5 == 'Flower' ? 'selected' : '');

      $sticky_classification_id6 = ($classification_id6 == 'Groundcovers' ? 'selected' : '');

      $sticky_classification_id7 = ($classification_id7 == 'Other' ? 'selected' : '');

      $sticky_lifespan_id0 = ($lifespan_id0 == '-' ? 'selected' : '');

      $sticky_lifespan_id1 = ($lifespan_id1 == 'Perennial' ? 'selected' : '');

      $sticky_lifespan_id2 = ($lifespan_id2 == 'Annual' ? 'selected' : '');

      $sticky_range_id0 = ($range_id0 == '-' ? 'selected' : '');

      $sticky_range_id1 = ($range_id1 == '2-8' ? 'selected' : '');

      $sticky_range_id2 = ($range_id2 == '3-7' ? 'selected' : '');

      $sticky_range_id3 = ($range_id3 == '3-8' ? 'selected' : '');

      $sticky_range_id4 = ($range_id4 == '3-9' ? 'selected' : '');

      $sticky_range_id5 = ($range_id5 == '4-8' ? 'selected' : '');

      $sticky_range_id6 = ($range_id6 == '4-9' ? 'selected' : '');

      $sticky_range_id7 = ($range_id7 == '5-8' ? 'selected' : '');

      $sticky_range_id8 = ($range_id8 == '5-9' ? 'selected' : '');

      // $sticky_image_type = (!$image_type == '' ? 'checked' : '');

    }

  }

  ?>

  </div>





<!DOCTYPE html>

<html lang="en">


<head>

  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Playful Plants</title>

  <link rel="stylesheet" type="text/css" href="site.css" />

</head>

<body>


<h1>Playful Plants - Admin View</h1>


  <?php
     $session_messages = array();
     process_session_params($db, $session_messages);
  ?>


  <div>
    <?php if (is_user_logged_in()) { logout_url(); ?>

      <p class="align-right">Welcome,<?php echo htmlspecialchars(' '); ?>  <?php echo htmlspecialchars($current_user['name']); ?></p>

    <?php } ?>

  </div>


  <div class="align-right">

    <form id="log-out" method="get" action="home.php" novalidate>
    <input type="submit" name="logout" value="Logout">
    </form>

    <?php  if (isset($_GET["logout"]) && is_user_logged_in()) {logout();}   ?>

  </div>


  <a class="align-left" href="home.php">Home Page</a>


  <hr>




<h2>Plant Catalog</h2>


  <div class="catalog">



      <form id="filter-sort" method="get" action="" novalidate>

        <!-- sort -->

        <div class="padding-ten">

          <label for="az_sort">Sort by:</label>

          <label for="az_sort">A-Z</label>

          <input type="radio" id="az_sort" name="sort" value="asc">

          <label for="za_sort">Z-A</label>

          <input type="radio" id="za_sort" name="sort" value="desc">

          <input class="margin-fifteen" type="submit" name="submit" value="Sort">

        </div>



        <?php



        if (isset($_GET["submit"])) {

          if (isset($_GET["sort"])) {

            $radio_val = $_GET["sort"];

          } else {

            $radio_val = "asc";

          }

        }



        $result = exec_sql_query($db, 'SELECT * FROM plants order by plant_name ' . $radio_val . ';');

        $records = $result->fetchAll();

        if (count($records) > 0) { ?>

          <table>

            <tr>

              <th>id</th>

              <th>Plant Name</th>

              <th>Genus, species</th>

              <th>Plant Id</th>

              <th></th>


            </tr>



            <?php foreach ($records as $record) { ?>

              <tr>

                <td><?php echo htmlspecialchars($record['id']) ?></td>

                <td><?php echo htmlspecialchars($record['plant_name']) ?></td>

                <td><?php echo htmlspecialchars($record['genus_species']) ?></td>

                <td><?php echo htmlspecialchars($record['plant_id']) ?></td>
                <td>
                    <form  method="get" action="">

                      <input type="hidden" name="delete-plant" value="<?php echo htmlspecialchars($id); ?>" />

                      <button type="submit" aria-label="aria-label" title="update plant info.">
                        <img src="edit-icon.svg" alt="" width="14" height="14" />
                      </button>
                    </form>
                  </td>

              </tr>



            <?php } ?>



          </table>





        <div class="label-input padding-box">

          <label for="request-delete">Enter Plant ID to delete </label>

          <input type="text" name="plant-delete" id="request-delete" > </input>

          <button class="align-right padding-ten" name="delete-button" type="submit">Delete</button>

          <?php if (isset($_GET['plant-delete']) && isset($_GET['delete-button'])) {

            $xx = $_GET['plant-delete'];

             exec_sql_query($db,"DELETE from plants where id = " .  $xx); echo 'deleted'; } ?>

        </div>



      </form>

    </div>

  </div>



  <?php } ?>




<!-- New plant entry form -->

<h2>Insert New Entry</h2>



    <div class="add-plant" id="insert">



      <form id="add-form" method="post" name="insert-plant" enctype="multipart/form-data" action="" novalidate>


        <h3>Fill out the form below to add a plant to our catalog:</h3>



        <p id="plant_name_feedback_class" class="feedback" <?php echo $plant_name_feedback_class; ?>>Please enter a name.</p>

        <div class="label-input padding-box">

          <label for="request-name">Plant Name:</label>

          <input type="text" name="plant-name" id="request-name" value="<?php echo htmlspecialchars($sticky_plant_name); ?>" />

        </div>



        <p id="genus_species_feedback-class" class="feedback" <?php echo $genus_species_feedback_class; ?>>Please enter a genus, species.</p>



        <div class="label-input padding-box">

          <label for="request-genus">Genus, species:</label>

          <input type="text" name="plant-genus-species" id="request-genus" value="<?php echo htmlspecialchars($sticky_genus_species); ?>"/>

        </div>



        <p id="plant_id_feedback_class" class="feedback" <?php echo $plant_id_feedback_class; ?>>Please enter a plant ID.</p>



        <div class="label-input padding-box">

          <label for="request-id">Plant ID:</label>

          <input type="text" name="plant-id" id="request-id" value="<?php echo htmlspecialchars($sticky_plant_id); ?>" />

        </div>




        <h3>Play Type(s) - Select all that apply:</h3>



        <p id="play_type_feedback_class" class="feedback" <?php echo $play_type_feedback_class; ?>>Please select at least one play type.</p>



        <div class="label-input padding-box">

          <input type="checkbox" name="constructive-play" id="select-constructive" value="<?php echo htmlspecialchars($sticky_constractive); ?>"/>

          <label for="select-constructive">Exploratory Constructive Play</label>

        </div>



        <div class="label-input padding-box">

          <input type="checkbox" name="physical-play" id="select-physical" value="<?php echo htmlspecialchars($sticky_physical); ?>"/>

          <label for="select-physical">Physical Play</label>

        </div>



        <div class="label-input padding-box">

          <input type="checkbox" name="imaginative-play" id="select-imaginative" value="<?php echo htmlspecialchars($sticky_imaginative); ?>"/>

          <label for="select-imaginative">Imaginative Play</label>

        </div>



        <div class="label-input padding-box">

          <input type="checkbox" name="restorative-play" id="select-restorative" value="<?php echo htmlspecialchars($sticky_restorative); ?>"/>

          <label for="select-restorative">Restorative Play</label>

        </div>



        <div class="label-input padding-box">

          <input type="checkbox" name="expressive-play" id="select-expressive" value="<?php echo htmlspecialchars($sticky_expressive); ?>"/>

          <label for="select-expressive">Expressive Play</label>

        </div>



        <div class="label-input padding-box">

          <input type="checkbox" name="rules-play" id="select-rules" value="<?php echo htmlspecialchars($sticky_rules); ?>"/>

          <label for="select-rules">Play with Rules</label>

        </div>



        <div class="label-input padding-box">

          <input type="checkbox" name="bio-play" id="select-bio" value="<?php echo htmlspecialchars($sticky_bio); ?>"/>

          <label for="select-bio">Bio Play</label>

        </div>



        <p id="classification_id_feedback_class" class="feedback" <?php echo $classification_id_feedback_class; ?>>Please select a plant classification.</p>


        <div class="label-input padding-box">

          <label for="request-classification">Classification:</label>

          <select id="request-classification" name="classificationid">

            <option value=0 <?php echo htmlspecialchars($sticky_classification_id0); ?>>-</option>

            <option value=1 <?php echo htmlspecialchars($sticky_classification_id1); ?>>Shrub</option>

            <option value=2 <?php echo htmlspecialchars($sticky_classification_id2); ?>>Grass</option>

            <option value=3 <?php echo htmlspecialchars($sticky_classification_id3); ?>>Vine</option>

            <option value=4 <?php echo htmlspecialchars($sticky_classification_id4); ?>>Tree</option>

            <option value=5 <?php echo htmlspecialchars($sticky_classification_id5); ?>>Flower</option>

            <option value=6 <?php echo htmlspecialchars($sticky_classification_id6); ?>>Groundcovers</option>

            <option value=7 <?php echo htmlspecialchars($sticky_classification_id7); ?>>Other</option>

          </select>

        </div>



        <p id="lifespan_id_feedback_class" class="feedback" <?php echo $lifespan_id_feedback_class; ?>>Please enter a lifespan.</p>



        <div class="label-input padding-box">

          <label for="request-lifespan">Lifespan:</label>

          <select id="request-lifespan" name="lifespanid">

            <option value=0 <?php echo htmlspecialchars($sticky_lifespan_id0); ?>>-</option>

            <option value=1 <?php echo htmlspecialchars($sticky_lifespan_id1); ?>>Perennial</option>

            <option value=2 <?php echo htmlspecialchars($sticky_lifespan_id2); ?>>Annual</option>

          </select>

        </div>



        <p id="range_id_feedback_class" class="feedback" <?php echo $range_id_feedback_class; ?>>Please enter a hardiness zone range.</p>



        <div class="label-input padding-box">

          <label for="request-range">Hardiness Range:</label>

          <select id="request-range" name="rangeid">

            <option value=0 <?php echo htmlspecialchars($sticky_range_id0); ?>>-</option>

            <option value=1 <?php echo htmlspecialchars($sticky_range_id1); ?>>2-8</option>

            <option value=2 <?php echo htmlspecialchars($sticky_range_id2); ?>>3-7</option>

            <option value=3 <?php echo htmlspecialchars($sticky_range_id3); ?>>3-8</option>

            <option value=4 <?php echo htmlspecialchars($sticky_range_id4); ?>>3-9</option>

            <option value=5 <?php echo htmlspecialchars($sticky_range_id5); ?>>4-8</option>

            <option value=6 <?php echo htmlspecialchars($sticky_range_id6); ?>>4-9</option>

            <option value=7 <?php echo htmlspecialchars($sticky_range_id7); ?>>5-8</option>

            <option value=8 <?php echo htmlspecialchars($sticky_range_id8); ?>>5-9</option>

          </select>

        </div>




        <p id="image_feedback_class" class="feedback" <?php echo $image_feedback_class; ?>>Please upload at least one image.</p>

        <div>

        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE;?> " />
        <label for="image_uploads">Choose images to upload </label>
        <input id="image_uploads" type="file" name="upload-file" accept=".png, .jpg, .svg, .jpeg">

        </div>



        <div class="label-input padding-box">

            <label for="request-submit"></label>

            <input id="request-submit" type="submit" name="new-entry" value="Insert New Entry" />


        </div>



    </form>



  </div>



</body>



</html>
