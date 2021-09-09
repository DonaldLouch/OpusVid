<?php
//Sees what page number will be the final page
$lastPage = ceil($rows/$per_page);

//If the last page is less then one page (no other pages) it will set the it to be the only page
if($lastPage < 1){
	$lastPage = 1;
}

//Sets the current page to one
$currentPage = 1;
if(isset($_GET['pn'])){
	$currentPage = preg_replace('#[^0-9]#', '', $_GET['pn']);
}

//Makes sure that there's still pages left in navagation
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $lastPage) {
    $currentPage = $lastPage;
}

//Makes sure that there's only the number of items per page set in $per_page
$limit = 'LIMIT ' .($currentPage - 1) * $per_page .',' .$per_page;
?>
