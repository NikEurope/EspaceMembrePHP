
<!-- VIDEO https://www.youtube.com/watch?v=bv3D3U5d2ck&index=15&list=PL8407690672542830 -->
<meta charset="utf-8" />
<?php include('includes/config.php'); ?>

<br />
<h1>
Bienvenue sur notre site !
</h1>



<?php
if(isset($_SESSION['pseudo'])) { ?>

<p>
Vous etes connecté, <?php echo $_SESSION['pseudo']; ?> . <br /><br />
<a href="logout.php"/>Se déconnecter</a><br /></p>

<br />
<p>
Espace privé site web
</p>

<br />
<img src = "http://www.oneupweb.com/wp-content/uploads/2015/12/connection.png" height="200" width="200"/>
<br />
<br />

<?php  } else { ?>

<br />
<p>
Vous n'etes pas connecté, visiteur.
</p>



<p><a href="login.php"/>Se connecter</a><br /><br />
<a href="register.php" />S'inscrire</a>
</p>



<?php  }  ?>
