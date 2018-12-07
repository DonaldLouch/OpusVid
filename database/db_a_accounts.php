<?php
 /* db_a_accounts.php | Version 1.0
  By: OpusVid
  User Level Required: 0

  The file is to show administrators a list of all the users on OpusVid in which they can then view/edit/delete a user! With the addition of adding new users!

  Blades Included:
    #db_connect: To connect to Database
    #pagination_init: Initiate the pagination
    #pagination_control: Controls the control of the pagination
    #db_templates/foreach_profile: Loops the Foreach loop

  File used in:
    #admin/accounts
*/

require 'db_connect.php'; // Gets database connection

//Find out how many items are in the user table
$countSQL = "SELECT COUNT(id) FROM users";
$query = mysqli_query($mySQL, $countSQL);
$row = mysqli_fetch_row($query);
$rows = $row[0];

//Number of items to display per page
$per_page = 10;

include '../../page-templates/pagination_init.php'; // Initiates pagination

$searchUserSQL = "SELECT * FROM users ORDER BY id DESC $limit";
$resultUser = mysqli_query($mySQL, $searchUserSQL); // The function that gets the database: connects then stores
$queryResultUser = mysqli_num_rows($resultUser); // Get's the number of users in the table

include '../../page-templates/pagination_control.php'; // Creates the pagination and the controls

include 'db_templates/foreach_profile.php'; // Prepares the Foreach Loop
