<?php
//Initial control variable
$paginationControls = "";

//Looks to see if there's more than one page of results
if($lastPage != 1){
	if ($currentPage > 1) {
	$previousPage = $currentPage - 1; //Goes back one page
		$paginationControls .= '<a href="profile?id='.$userName.'&pn='.$previousPage.'">Previous Page</a>';
		for($i = $currentPage-4; $i < $currentPage; $i++){ //Left side of pages
			if($i > 0){
			  $paginationControls .= '<a href="profile?id='.$userName.'&pn='.$i.'">'.$i.'</a>';//Generates page numbers
			}
		}
	}

	$paginationControls .= ''.$currentPage.''; //The current page

	for($i = $currentPage+1; $i <= $lastPage; $i++){ // Right side of pages
		$paginationControls .= '<a href="profile?id='.$userName.'&pn='.$i.'">'.$i.'</a>';
		if($i >= $currentPage+4){
			break; // After displaying 4 of pages on each side of navagation; then it display 1 more page everytime you go to the next one
		}
	}
	if ($currentPage != $lastPage) {
		$nextPage = $currentPage + 1; //Goes to the next page
		$paginationControls .= '<a href="profile?id='.$userName.'&pn='.$nextPage.'">Next Page</a>';
	}
}
?>