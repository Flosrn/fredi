<?php $this->_tpl_include('header.html'); ?>

<?php

include ('dto/LigneFrai.class.php');
include ('dto/Motif.class.php');

//Si l'utiliateur est connecté
if (isset($_SESSION['connecter'])) {
    $submit = isset($_POST['submit']);
    if ($submit)
    	{
    		
    		$id_demandeur = $_SESSION['id_demandeur'];
    		
    		
     $dateDeplacement = $_POST['dateDeplacement'];
     
     $date = date_parse($dateDeplacement);
        $jour = $date['day'];
        $mois = $date['month'];
        $annee = $date['year'];
    	
     $tarifKm = indemniter($annee);

         
            $noteDeFrais = new Lignefrai();
            $noteDeFrais->date = $_POST['dateDeplacement'];
            $noteDeFrais->trajet = $_POST['trajet'];
            $noteDeFrais->km = ($_POST['nbKM']);
            $noteDeFrais->coutTrajet = $_POST['nbKM'] * $tarifKm[0]['tarifKilometrique'];
            $noteDeFrais->coutPeage = ($_POST['coutPeage']);
            $noteDeFrais->coutHebergement= ($_POST['coutHebergement']);
            $noteDeFrais->coutRepas = ($_POST['coutRepas']);
            $noteDeFrais->coutTotal = $noteDeFrais->coutTrajet + $noteDeFrais->coutPeage + $noteDeFrais->coutHebergement + $noteDeFrais->coutRepas;
    		$noteDeFrais->annee = $annee;
    		
    		
    		
            
    		$motif = new Motif();
    		$motif->libelle = ($_POST['motif']);
    		insertMotif($motif);
    		
    		$idMotif = idMotif($motif->libelle);
    		$noteDeFrais->idMotif = $idMotif['idMotif'];
    		
    		
    		
    		insertLigneDeFrait($noteDeFrais, $id_demandeur);

            
            
            header('Location: Gerer_bordereau.php');
    		}
        }
        else {
            echo "Veuillez vous connecter pour accéder à la page de gestion  des bordereaux";
            echo "<p><a href='login.php'>Se connecter</a>";
        }

?>



<div id="noteFrait">

	<form id="formulaire" action="#" method="post">
            <p>
            	<div class="formLeft">
            	<label for="dateDeplacement">Date du déplacement</label><br />
                <input type="date" value="" name="dateDeplacement" required="required" /><br /> 
                <label for="motif" >motif</label><br />
                <input type="text" value="" name="motif" required="required" /><br /> 
                <label for="trajet">Trajet</label><br />
                <input type="text" value="" name="trajet" required="required" /><br /> 
            	<label for="nbKM" >Nombre de kilometre</label><br />
                <input type="integer" value="" name="nbKM" required="required" /><br />             
                </div>

                <div class="formRight">
                <label for="coutPeage">cout péage</label><br />
                <input type="integer" value="" name="coutPeage" required="required" /><br />
                <label for="coutHebergement" >cout hébergement</label><br />
                <input type="integer" value="" name="coutHebergement" required="required" /><br />
                <label for="coutRepas" >cout repas</label><br />
                <input type="integer" value="" name="coutRepas" required="required" /><br />
                
                
                
                </div>
            </p>

            <input type="submit" value="Envoyer" name="submit" />
            <input type="reset" value="Réinitialiser" name="Réinitialiser" />
        </form>
</div>



<?php $this->_tpl_include('footer.html'); ?>