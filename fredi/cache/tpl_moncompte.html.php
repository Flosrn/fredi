<?php $this->_tpl_include('header.html'); ?>

<?php

include ('dto/Demandeur.class.php');

$id = $_GET['num'];
$monCompte = monCompte($id);



$submit = isset($_POST['submit']);
if ($submit)
	{
		/*$id_demandeur = $_SESSION['id_demandeur'];
        $rows = lireDemandeur($id_demandeur);*/


	  	
        $demandeur = new Demandeur();
        $demandeur->nom = $_POST['nom'];
        $demandeur->prenom = $_POST['prenom'];
        $demandeur->rue = ($_POST['rue']);
        $demandeur->CP = $_POST['CP'];
        $demandeur->ville = ($_POST['ville']);
        $demandeur->mail= ($_POST['mail']);
        $demandeur->mdp = sha1($_POST['mdp']);
        //$demandeur->mdp = sha1($de)

        
        //$demandeur->idDemandeur = $demandeur['idDemandeur'];
		
        modifierMonCompte($demandeur, $id);
        
         //header('Location: Gerer_bordereau.php');
		}

?>



<div id="contenu">

    <!--Formulaire d'inscription-->
    <h1>Modification du profil</h1>
    <p>Veuillez mettre à jour les informations<p>
    <form id = "formulaireinscription" method="post" action="">
        
        <label for=nom>Nom:</label>
        <input type="text" name="nom" value="<?php echo $monCompte['Nom']; ?>" required><br/><br/>

        <label for=prenom>Prenom:</label>
        <input type="text" name="prenom" value="<?php echo $monCompte['Prenom']; ?>" required><br/><br/>
        
        <label for=rue>Rue:</label>
        <input type="text" name="rue" value="<?php echo $monCompte['Rue']; ?>" required><br/><br/>

        <label for=CP>Code Postal:</label>
        <input type="text" name="CP" value="<?php echo $monCompte['CP']; ?>" required><br/><br/>

        <label for=ville>Ville:</label>
        <input type="text" name="ville" value="<?php echo $monCompte['Ville']; ?>" required><br/><br/>
        
        <label for=mail>Adresse mail: </label>
        <input type="email" name="mail" value="<?php echo $monCompte['AdresseMail']; ?>" required><br/><br/> 

        <label for=mdp>Mot de passe:</label>
        <input type="password" name="mdp" placeholder="Mot de passe" value="" required><br/><br/>

        <input type="submit" name="submit" value="Modifier"><!--Bouton submit-->
        <input type="reset" name="reset" value="Réinitialiser"><!---Bouton reset-->
    </form>
</div>



<?php $this->_tpl_include('footer.html'); ?>