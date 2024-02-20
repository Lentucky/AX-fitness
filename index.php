<?php include('partials-front/menu.php'); ?>

    <?php 
      if(isset($_SESSION['customer']))
      {
          echo $_SESSION['customer'];
          
      }
    ?>

<header class="trailer">
    <div class="container">
        
    </div>
</header>



<?php include('partials-front/footer.php'); ?>