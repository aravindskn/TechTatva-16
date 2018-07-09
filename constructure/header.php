<!-- Header -->
<?php require_once("sqlconn.php"); ?>
<header id="header">

  <h1>
  <?php 
  echo get_id();
  if (is_logged_in()) {
    echo "Current Score: ".get_score();
  } else {
    echo "Constructure";
  }
  ?>  
  </h1>
  <nav id="nav">
    <ul>
      <li><a href="index.php" class="button">Home</a></li>
    <?php
      if (is_logged_in()) {
        echo '<li><a href="user_home.php" class="button">Check Wall</a></li>';
      }
    ?>
    </ul>
  </nav>
</header>
