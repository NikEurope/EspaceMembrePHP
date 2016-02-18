<meta charset="utf-8" />
<?php include('includes/config.php');

if(isset($_POST['envoyer'])) {
  if(isset($_POST['pseudo']) AND !empty($_POST['pseudo'])
  AND isset($_POST['motdepasse']) AND !empty($_POST['motdepasse']))
  {
  // Tout les champs ont ete remplis
  $pseudo = mysql_escape_string($_POST['pseudo']);
  $motdepasse = mysql_escape_string(md5($_POST['motdepasse']));

  $req1 = mysql_query('SELECT * FROM membres WHERE pseudo = "'.$pseudo.'"');
  $info_membre = mysql_fetch_array($req1);

  if(isset($info_membre['pseudo'])) {

  if($motdepasse == $info_membre['motdepasse'])
  {
  // mdp bon
  $_SESSION['pseudo'] = $pseudo;
  $succes = 'Connexion reussie !';

  }
  else
  {
  $erreur = 'Mot de passe est incorrect.';
  }

  }
  else
  {
  $erreur = 'Le pseudo n\'existe pas. ';
  }
  }
  else
  {
  $erreur='Tout les champs sont obligatoires !';
  }
  }
?>
<h1>Creer un compte</h1>
<br />
<?php if(isset($erreur)) {echo ' Erreur : '.$erreur;}?>
<?php if(isset($succes)) {echo $succes;}?>

<hr />
<br />
<form action="login.php" method="post">
  Pseudo : <input type="text" name="pseudo" value="<?php if(isset($_POST['pseudo'])) {echo $_POST['pseudo'];}?>"/><br /><br />
  Mot de passe : <input type="password" name="motdepasse" value="<?php if(isset($_POST['motdepasse'])) {echo $_POST['motdepasse'];}?>"/><br /><br />
  <input type="submit" name="envoyer" value ="Se connecter !"/>
</form>
