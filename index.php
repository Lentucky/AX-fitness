<?php include('partials-front/menu.php'); ?>

    <?php 
      if(isset($_SESSION['login']))
      {
          echo $_SESSION['login'];
          unset($_SESSION['login']);
      }
    ?>

<header class="trailer">
    <div class="container">
        
    </div>
</header>



<?php include('partials-front/footer.php'); ?>