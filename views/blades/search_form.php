  <form action="../search" method="post" id="searchForm">
      <input type="search" name="search" placeholder="Search">
      <label>
          <input type="submit" name="submit" style="display:none;" />
          <?php echo file_get_contents($baseFileURL."/ui/searchVector.svg"); ?>
      </label>
  </form>