<?php
  session_start();
  include('../../../database/db_connect.php');

  $playerID = $_GET['id'];

  $sql = "SELECT * FROM videos WHERE id = '" . mysqli_escape_string($mySQL,$playerID) . "';";
  $result = mysqli_query($mySQL, $sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        include '../../page-templates/head.php';
        ?>
        <body id="">
          <?php include '../../page-templates/header.php'; ?>
          <div class="playerWrap">
            <div class="outer-container">
                  <div class="inner-container">
                      <video id="player" controls="controls"
                      src="<?php echo $row['video_path']; ?>" preload="auto" autoplay poster="<?php echo $row['thumbnail_path']; ?>"></video>
                      <nav id="vidCon"></nav>
                  </div>
              </div>

      				<section id="description">
      					<h1><?php echo $row["video_title"]; ?></h1>
      					<h2>By: <?php echo $row['opus_creator']; ?> on <?php echo date('D M j, Y' , $row['uploaded_on']); ?> </span></h2>
      					<p><?php echo $row['short_description']; ?></p>
      					<a class="toggleButton" onclick="toggle_visibility('fDescription')">Read Full Description</a>
      						<section id="fDescription" class="panel">
      							<p><?php echo $row['description']; ?></p>
      							<a class="toggleButton" onclick="toggle_visibility('metaData')">Meta Data</a>
      								<section id="metaData" class="panel">
      									<article id="meta">
      										<dl>
      											<dt>Category<dt>
      												<dd><?php echo $row['category']; ?> <dd>
      											<dt>Tags</dt>
      													<dd><?php echo $row['tags']; ?></dd>
      											<dt>Music Credit</dt>
      												<dd><?php echo $row['music_credit']; ?></dd>
      											<dt>Filmed</dt>
      												<dd>On:<?php echo $row['filmed_on']; ?></dd>
					                              <dd>By: <?php echo $row['filmed_by']; ?></dd>
					                              <dd>At: <?php echo $row['filmed_at']; ?></dd>
					                              <dd>On: <?php echo $row['filmed_date']; ?></dd>
      											<dt>Audio Captured</dt>
      												<dd>With:<?php echo $row['audio_with']; ?></dd>
	  												<dd>By: <?php echo $row['audio_by']; ?></dd>
      											<dt>Edited</dt>
	  												<dd>By:<?php echo $row['edited_by']; ?></dd>
      												<dd>On: <?php echo $row['edited_on']; ?></dd>
      											<dt>Starting</dt>
      												<dd><?php echo $row['staring']; ?></dd>
      										<dl>
      									</article>
      								</section> <!-- #metaData-->
      						</section>
      				</section>
      	</div>
      </div>
      <script src="resources/js/video.js"></script>
      <script src="resources/js/accordion.js"></script>
      <?php include '../../page-templates/footer.php'; ?>
    <?php }
    } else {
        echo "<h3>Sorry, this video page faild to load. Please try again or contact our support team at support@opusvid.com with the video id:" . $playerID . " and we'll be happy to help you!</h3>";

  }; ?>
