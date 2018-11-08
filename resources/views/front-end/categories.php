<?php
session_start();

include '../../../database/db_connect.php';
include '../../page-templates/head.php';
?>

<body>
  <script> document.title = "Categories | OpusVid"; </script>
  <?php include '../../page-templates/header.php';?>
<h2 class="wrapper pageTitle">Categories</h2>
<div class="wrapper CAT">
    <div class="catWrap" id="vlogCat">
      <h3><a href="category?type=Vlog">Vlog</a></h3>
    </div>

    <div class="catWrap" id="lifeEventCat">
      <h3><a href="category?type=Life/Event">Life/Event</a></h3>
    </div>

    <div class="catWrap" id="petAnimalsCat">
      <h3><a href="category?type=Pet/Animals">Pet/Animals</a></h3>
    </div>

    <div class="catWrap" id="tutorialCat">
      <h3><a href="category?type=Tutorial">Tutorial</a></h3>
    </div>

    <div class="catWrap" id="techCat">
      <h3><a href="category?type=Technology">Technology</a></h3>
    </div>

    <div class="catWrap" id="musicCat">
      <h3><a href="category?type=Music">Music</a></h3>
    </div>

    <div class="catWrap" id="interviewCat">
      <h3><a href="category?type=Interview">Interview</a></h3>
    </div>

    <div class="catWrap" id="gamingCat">
      <h3><a href="category?type=Gaming">Gaming</a></h3>
    </div>

    <div class="catWrap" id="newsCat">
      <h3><a href="category?type=News">News</a></h3>
    </div>

    <div class="catWrap" id="educationCat">
      <h3><a href="category?type=Educational">Educational</a></h3>
    </div>

    <div class="catWrap" id="nonprofitCat">
      <h3><a href="category?type=Non-profit">Non-profit</a></h3>
    </div>

    <div class="catWrap" id="advertismentCat">
      <h3><a href="category?type=Advertisement">Advertisement</a></h3>
    </div>

    <div class="catWrap" id="automotiveCat">
      <h3><a href="category?type=Automotive">Automotive</a></h3>
    </div>

    <div class="catWrap" id="animationCat">
      <h3><a href="category?type=Animation">Animation</a></h3>
    </div>

    <div class="catWrap" id="tvCat">
      <h3><a href="category?type=TV">TV</a></h3>
    </div>

    <div class="catWrap" id="filmCat">
      <h3><a href="category?type=Film/Movie">Film/Movie</a></h3>
    </div>
  </div>

  <?php include '../../page-templates/footer.php'; ?>
