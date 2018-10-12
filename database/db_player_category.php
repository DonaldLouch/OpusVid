<?php
  include 'db_connect.php';

  //Gets the video ID
  $playerID = $_GET['type'];

  //Find out how many items are in the videos table
  $countSQL = "SELECT COUNT(order_number) FROM videos WHERE privacy='public' AND category = '$playerID'";
  $query = mysqli_query($mySQL, $countSQL);
  $row = mysqli_fetch_row($query);
  $rows = $row[0];

  //Number of items to display per page
  $per_page = 8;

  include '../../page-templates/pagination_init.php';

  $playerSQL = "SELECT * FROM videos WHERE privacy = 'public' AND category = '$playerID' ORDER BY order_number DESC $limit";
  $resultPlayer = mysqli_query($mySQL, $playerSQL);

  $queryResultPlayer = mysqli_num_rows($resultPlayer);

  //Initial control variable
  $paginationControls = '';

  //Looks to see if there's more than one page of results
  if($lastPage != 1){
  	if ($currentPage > 1) {
      $previousPage = $currentPage - 1; //Goes back one page
  		$paginationControls .= '<a href="?type='.$playerID.'&pn='.$previousPage.'">Previous Page</a>';
  		for($i = $currentPage-4; $i < $currentPage; $i++){ //Left side of pages
  			if($i > 0){
  		      $paginationControls .= '<a href="?type='.$playerID.'&pn='.$i.'">'.$i.'</a>';//Generates page numbers
  			}
  	    }
      }

  	$paginationControls .= ''.$currentPage.''; //The current page

  	for($i = $currentPage+1; $i <= $lastPage; $i++){ // Right side of pages
  		$paginationControls .= '<a href="?type='.$playerID.'&pn='.$i.'">'.$i.'</a>';
  		if($i >= $currentPage+4){
  			break; // After displaying 4 of pages on each side of navagation; then it display 1 more page everytime you go to the next one
  		}
  	}
      if ($currentPage != $lastPage) {
          $nextPage = $currentPage + 1; //Goes to the next page
          $paginationControls .= '<a href="?type='.$playerID.'&pn='.$nextPage.'">Next Page</a>';
      }
  }

  $players = array();
  if (mysqli_num_rows($resultPlayer) > 0) {
    while ($player = mysqli_fetch_assoc($resultPlayer)) {
      $players[] = $player;
    }

}
