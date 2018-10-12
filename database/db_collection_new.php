<?php

session_start();

if (isset($_POST['submit'])) {
  include 'db_connect.php';

  $uniqeID = uniqid();
  $collectionID = nl2br($uniqeID);

  $collectionOC = nl2br($_SESSION['uName']);
  $collectionDate = nl2br(time());

  $collectionTitle = nl2br($_POST['collectionName']);

  $collectionSDescription = nl2br($_POST['sDescription']);
  $collectionDescription = nl2br($_POST['description']);
  $collectionCategory = nl2br($_POST['category']);
  $collectionTags = nl2br($_POST['tags']);

  $collectionVideoSelect     = "";
  $videoSelect = $_POST['videoSelect'];
  foreach ($videoSelect  as $value) {
      $collectionVideoSelect .= $value." / "; // concatenate your checked values
  }

  $collectionPrivacy = nl2br($_POST['privacy']);

  if (empty($collectionTitle) || empty($collectionSDescription) || empty($collectionDescription) || empty($collectionCategory) || empty($collectionTags) || empty($collectionVideoSelect) || empty($collectionPrivacy)){
    echo 'All Fields are Required!';
  } elseif(!$mySQL) {
    die("Connection failed: " . mysqli_connect_error());
  } else {
    echo '<p>1 ID:' . $collectionID . '</p>';
    echo '<p>2 Opus Creator:' . $collectionOC . '</p>';
    echo '<p>3 Uploaded On:' . $collectionDate . '</p>';
    echo '<p>4 Video Title:' . $collectionTitle . '</p>';
    echo '<p>5 Short Description:' . $collectionSDescription . '</p>';
    echo '<p>6 Description:' . $collectionDescription . '</p>';
    echo '<p>7 Category:' . $collectionCategory . '</p>';
    echo '<p>8 Tags:' . $collectionTags . '</p>';
    echo '<p>9 Videos:' . $collectionVideoSelect . '</p>';
    echo '<p>10 Privacy:' . $collectionPrivacy . '</p>';

    $sqlInsert = "INSERT INTO collections (id, opus_creator, created_on, collection_title, short_description, description, category, tags, videos, privacy) VALUES ('$collectionID', '$collectionOC', '$collectionDate', '$collectionTitle', '$collectionSDescription', '$collectionDescription', '$collectionCategory', '$collectionTags',
    '$collectionVideoSelect', '$collectionPrivacy')";

    $results = mysqli_query($mySQL, $sqlInsert);
    //header("Location: ../player?id=$uniqeID");
   }
  }
