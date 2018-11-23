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
    <a href="category?type=Vlog">
      <div class="catWrap" id="vlogCat">
        <h3>Vlog</h3>
      </div>
    </a>

    <a href="category?type=Life/Event">
      <div class="catWrap" id="lifeEventCat">
        <h3>Life/Event</h3>
      </div>
    </a>
    
    <a href="category?type=Pet/Animals">
      <div class="catWrap" id="petAnimalsCat">
        <h3>Pet/Animals</h3>
      </div>
    </a>

    <a href="category?type=Tutorial">
      <div class="catWrap" id="tutorialCat">
        <h3>Tutorial</h3>
      </div>
    </a>

    <a href="category?type=Technology">
      <div class="catWrap" id="techCat">
        <h3>Technology</h3>
      </div>
    </a>

    <a href="category?type=Music">
      <div class="catWrap" id="musicCat">
        <h3>Music</h3>
      </div>
    </a>

    <a href="category?type=Interview">
      <div class="catWrap" id="interviewCat">
        <h3>Interview</h3>
      </div>
    </a>

    <a href="category?type=Gaming">
      <div class="catWrap" id="gamingCat">
        <h3>Gaming</h3>
      </div>
    </a>

    <a href="category?type=News">
      <div class="catWrap" id="newsCat">
        <h3>News</h3>
      </div>
    </a>

    <a href="category?type=Educational">
      <div class="catWrap" id="educationCat">
        <h3>Educational</h3>
      </div>
    </a>

    <a href="category?type=Non-profit">
      <div class="catWrap" id="nonprofitCat">
        <h3>Non-profit</h3>
      </div>
    </a>

    <a href="category?type=Advertisement">
      <div class="catWrap" id="advertismentCat">
        <h3>Advertisement</h3>
      </div>
    </a>

    <a href="category?type=Automotive">
      <div class="catWrap" id="automotiveCat">
        <h3>Automotive</h3>
      </div>
    </a>

    <a href="category?type=Animation">
      <div class="catWrap" id="animationCat">
        <h3>Animation</h3>
      </div>
    </a>

    <a href="category?type=TV">
      <div class="catWrap" id="tvCat">
        <h3>TV</h3>
      </div>
    </a>

    <a href="category?type=Film/Movie">
      <div class="catWrap" id="filmCat">
        <h3>Film/Movie</h3>
      </div>
    </a>
  </div>

  <?php include '../../page-templates/footer.php'; ?>
