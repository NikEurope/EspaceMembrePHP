
<!-- VIDEO https://www.youtube.com/watch?v=bv3D3U5d2ck&index=15&list=PL8407690672542830 -->


<meta charset="utf-8" />
<?php include('includes/config.php'); ?>

<?php
if(isset($_SESSION['pseudo'])) { ?>

<p>
Vous etes connecté, <?php echo $_SESSION['pseudo']; ?> . <br /><br />
<a href="logout.php"/>Se déconnecter</a><br /></p>

<?php  } else { ?>


<br />
<p>
Vous n'etes pas connecté, visiteur.
</p>

<p><a href="login.php"/>Se connecter</a><br /><br />
<a href="register.php" />S'inscrire</a>
</p>


<?php  }  ?>
