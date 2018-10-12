<?php
include 'db_connect.php';

$profileID = $_SESSION['uName'];
$collectionID = $_GET['id'];

$collectionSQL = "SELECT * FROM collections WHERE id= '" . mysqli_escape_string($mySQL,$collectionID) . "';";
$resultCollection = mysqli_query($mySQL, $collectionSQL);

$selectSQL = "SELECT videos FROM collections WHERE id = '" . mysqli_escape_string($mySQL, $collectionID) . "';";
$selectResult = mysqli_query($mySQL, $selectSQL);
$selectRow = mysqli_fetch_assoc($selectResult);
$selectCount = mysqli_num_rows($selectResult);
$slectedVid = explode(' / ', $selectRow['videos'], -1);

//echo $slectedVid[0];

/*for ($x = 0; $x <= $selectCount; $x++){
    $vidID = $slectedVid[$x];

    $videoSQL = "SELECT * FROM videos WHERE id = '$vidID'";
    $videoResults = mysqli_query($mySQL, $videoSQL);
    $video = mysqli_fetch_assoc($videoResults);

    <div class="videoWrapperCollection">
      <input type="checkbox" name ="videoSelect[]" id ="videoSelect" value="<php echo $video['id'];  selected?>">
      <img class="thumbDash" src="<php echo $video['thumbnail_path']; ?>" alt="Thumbnail <php echo $video['id']; ?>">

      <div class="videoInfo">
        <h3><php echo $video['video_title']; ?></h3>
        <p>Uploaded on: <php echo date('D M j, Y', $video['uploaded_on']); ?></p>
      </div>
    </div>


    /*$videos = array();
    if (mysqli_num_rows($videoResults) > 0) {
      while ($video = mysqli_fetch_assoc($videoResults)) {
        $videos[] = $video;
      }
    }
}

/*for ($x = 0; $x <= $selectCount; $x++){
    $vidID = $slectedVid[$x];

    $videoSQL = "SELECT * FROM videos WHERE id = '$vidID'";
    $videoResults = mysqli_query($mySQL, $videoSQL);

    $videos = array();
    if (mysqli_num_rows($videoResults) > 0) {
      while ($video = mysqli_fetch_assoc($videoResults)) {
        $videos[] = $video;
      }
    }
}

/*foreach ($slectedVids as $select) {
    $videoSQL = "SELECT * FROM videos WHERE id = '$select'";
    $resultVideo = mysqli_query($mySQL, $videoSQL);

    //$selected = array();
    /*if (mysqli_num_rows($resultSelect) > 0) {
      while ($select = mysqli_fetch_assoc($resultSelect)) {
        $selected[] = $select;
      }
    }
}


/*if ($result=mysqli_query($mySQL,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
      $slectedVids = explode(' / ', $row, -1); //Explodes the file name (name . extention)
    printf ($slectedVids);
    }
  // Free result set
  mysqli_free_result($result);
}
*/
/*
    $tqs = "SELECT * FROM `table_two`";
    $tqr = mysqli_query($dbc, $tqs);
    $row = mysqli_fetch_assoc($tqr);

    // Prints e.g.: 164, 165, 166
    print_r($row['some_text_id']);

    echo "<br/><br/>";
    echo "<br/><br/>";

    $thearray = explode(", ", $row['some_text_id']);
    print_r($thearray);

*/


//$vids = "5ba85682d768f / 5ba5c8c9 / ";
//$slectedVids = explode(' / ', $result, -1); //Explodes the file name (name . extention)



//$videoExtention = strtolower(end($videoExplode)); //Changes the file extention into a lowercase name"


/*$profileID = $_SESSION['uName'];
$collectionID = $_GET['id'];

$collectionSQL = "SELECT * FROM collections WHERE id= '" . mysqli_escape_string($mySQL,$collectionID) . "';";
$resultCollection = mysqli_query($mySQL, $collectionSQL);

$selecedVidSQL = "SELECT videos FROM collections";
$resultSelect = mysqli_query($mySQL, $selecedVidSQL);

$selected = array();
if (mysqli_num_rows($resultSelect) > 0) {
  while ($select = mysqli_fetch_assoc($resultSelect)) {
    $selected[] = $select;
  }
}*/
