<?php $this->_tpl_include('header.html'); ?>

<?php

include ('dto/Adherent.class.php');
include ('dto/Club.class.php');


$id_demandeur = $_SESSION['id_demandeur'];
$id = $_GET['num'];
$rows = mesClub();
$monAdherent = monAdherent($id);



$submit = isset($_POST['submit']);
if ($submit)
	{     
        $adherent = new Adherent();
        $adherent->numLicence = $_POST['numLicence'];
        $adherent->nom = $_POST['nom'];
        $adherent->prenom = ($_POST['prenom']);
        $adherent->dateNaissance = ($_POST['dateNaissance']);
        $adherent->idClub = ($_POST['club']);

		modifierAdherent($adherent, $id);
        
        header('Location: licence.php');
	}

?>

<div id="modifierLicence">

	<form id="formulaire" action="#" method="post">
            <p>
            	<label for="numLicence">Numero de licence</label><br />
                <input type="integer" value="<?php echo $monAdherent[0]['numLicence']; ?>" name="numLicence" required="required" /><br /> 
                <label for="nom" >Nom</label><br />
                <input type="text" value="<?php echo $monAdherent[0]['Nom']; ?>" name="nom" required="required" /><br /> 
                <label for="prenom">Prénom</label><br />
                <input type="text" value="<?php echo $monAdherent[0]['Prenom']; ?>" name="prenom" required="required" /><br /> 
            	<label for="dateNaissance" >Date de naissance</label><br />
                <input type="date" value="<?php  $monAdherent[0]['dateNaissance']; ?>" name="dateNaissance" required="required" /><br />

				<select name="club">
				<?php foreach($rows as $row) { 
				 echo "<option type='integer' value='".$row['idClub']."'>".$row['Nom']."</option>";
				 } ?>
				</select>        
                </div>
            </p>

            <input type="submit" value="Envoyer" name="submit" />
            <input type="reset" value="Réinitialiser" name="Réinitialiser" />
        </form>
</div>


   



<?php $this->_tpl_include('footer.html'); ?>