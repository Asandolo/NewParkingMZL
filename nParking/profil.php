 <?php

$titre = "Profile";
include("includes/pages/header.php");
//include("controller/membre.ctrl.php");
$error = null;
if (isset($_POST["repsw"])) {
	
	$oldpsw = htmlspecialchars($_POST["oldpsw"]);
	$newpsw = htmlspecialchars($_POST["newpsw"]);
	$cknewpsw = htmlspecialchars($_POST["cknewpsw"]);
	$check = verifNewMdp($_SESSION["mail"], $oldpsw);
	if ($check) {
		if ($newpsw==$cknewpsw) {
			setNewMdpByMail($_SESSION["mail"],$newpsw);
		}else{
			$error = "Les mots de pass sont différent";
		}
	}else{
		$error = "Ancien mot de passe faux";
	}
}
?>
<div class="row">
	<div class="col-md-12 black">
		<h2>Votre profil</h2>


		<table class="table table-bordered">
			<tr>
				<th>Civilite</th>
				<td><?php echo $user["civilite_membre"]; ?></td>
			</tr>
			<tr>
				<th>Nom</th>
				<td><?php echo $user["nom_membre"]; ?></td>
			</tr>					
			<tr>
				<th>Prenom</th>
				<td><?php echo $user["prenom_membre"]; ?></td>
			</tr>
			<tr>
				<th>Mail</th>
				<td><?php echo $user["mail_membre"]; ?></td>
			</tr>
			<tr>
				<th>Adresse</th>
				<td><?php echo $user["adRue_membre"]; ?></td>
			</tr>
			<tr>
				<th>Code Postal</th>
				<td><?php echo $user["adCP_membre"]; ?></td>
			</tr>
			<tr>
				<th>Ville</th>
				<td><?php echo $user["adVille_membre"]; ?></td>
			</tr>
			<tr>
				<th>Date de naissance</th>
				<td><?php echo date("d/m/Y", strtotime($user["date_naiss_membre"])); ?></td>
			</tr>
		</table>
		<a href="modif_profil.php"><button class="btn btn-info">Modifier votre profil</button></a>

		<hr />
		<h3>Modification du mot de passe</h3>
		<?php echo "<center span style='color:red;'>".$error."</center>"; ?>
		<form method="POST">
			<div class="form-group">
				<input class="form-control" type="password" name="oldpsw" placeholder="Ancien mot de passe" required=""><br />
				<input class="form-control" type="password" name="newpsw" placeholder="Nouveau mot de passe" required=""><br />
				<input class="form-control" type="password" name="cknewpsw" placeholder="Valider le nouveau mot de passe"  required=""><br />
			</div>
			<input type="submit" name="repsw" value="Changer le mot de passe" class="btn btn-success form-control">
		</form>
	</div>
</div>

<?php include("includes/pages/footer.php"); ?>