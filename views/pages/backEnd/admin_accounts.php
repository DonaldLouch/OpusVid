<?php  
  require '../../blades/portalHeaderAdmin.php'; 
  $userClass = new Users;
?>

<body>
  <script> document.title = "Accounts Manager | <?php echo $websiteName; ?>"</script>
  <?php require '../../blades/portalHeader.php'; ?> 
  <?php require '../../blades/errors.php'; ?>
    <section id="manageVideo" class="">
      <h3><span class="underline pageTitle">Admin: Accounts Manager</span></h3>
        <div id="manageVideoWrap">
          <?php echo $userClass->getUsers(); ?>
        </div> <!-- #manageVideoWrap -->
    </section> <!-- #manageVideo -->
  </main>
  </div> <!-- .portalContent -->
<?php require '../../blades/footer.php'; ?>