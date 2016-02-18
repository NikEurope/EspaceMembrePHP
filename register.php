<meta charset="utf-8" />
<?php include('includes/config.php');

if(isset($_POST['envoyer'])) {
  if(isset($_POST['pseudo']) AND !empty($_POST['pseudo'])
  AND isset($_POST['motdepasse']) AND !empty($_POST['motdepasse'])
  AND isset($_POST['motdepasse2']) AND !empty($_POST['motdepasse2'])
  AND isset($_POST['email']) AND !empty($_POST['email']))
  {
  // Tout les champs ont ete remplis
  $pseudo = mysql_escape_string($_POST['pseudo']);
  $motdepasse = mysql_escape_string (md5($_POST['motdepasse']));
  $motdepasse2 = mysql_escape_string (md5($_POST['motdepasse2']));
  $email = mysql_escape_string($_POST['email']);

  $req2 = mysql_query('SELECT pseudo FROME membres WHERE pseudo = "'.$pseudo.'"');
  $info_membre = mysql_fetch_array($req2);

  if(!isset($info_membre['pseudo'])) {

  $longueur_pseudo = strlen($pseudo);
  if($longueur_pseudo <= 30)
  {
  // Pseudo respecte le format
  if($motdepasse == $motdepasse2)
  {
    //Les mots de passe sont identique
  mysql_query('INSERT INTO membres VALUES("", "'.$pseudo.'", "'.$motdepasse.'", "'.$email.'")');
  $succes = 'Le compte a été crée ! Vous pouvez vous connecter en cliquant <a href="login.php"> ici >>> </a>';

  }
  else
  {
  $erreur = 'La confirmation ne coresponde pas a mot de passe';
  }

  }
  else
  {
  $erreur = 'Pseudo est tres long (max: 30)';
  }
  }
  else
  {
  $erreur = 'Pseudo existe deja';
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
<form action="register.php" method="post">
  Pseudo : <input type="text" name="pseudo" value="<?php if(isset($_POST['pseudo'])) {echo $_POST['pseudo'];}?>"/><br /><br />
  Mot de passe : <input type="password" name="motdepasse" value="<?php if(isset($_POST['motdepasse'])) {echo $_POST['motdepasse'];}?>"/><br /><br />
  Mot de passe confirmation : <input type="password" name="motdepasse2" value="<?php if(isset($_POST['motdepasse2'])) {echo $_POST['motdepasse2'];}?>"/><br /><br />
  Mail : <input type="text" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];}?>"/><br /><br />
  <input type="submit" name="envoyer" value ="S'inscrire !"/><br />
</form>
