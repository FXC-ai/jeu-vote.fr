<?php
namespace App\Frontend\Modules\PresidentielleFormulaire;

use OCFram\BackController;
use OCFram\HTTPRequest;



class PresidentielleFormulaireController extends BackController
{
	public function executeFormulairePresidentielle2017 (HTTPRequest $request)
	{
		$this->page->addVar('title', 'Questionnaire Présidentielle 2017');
		
		$ListeCandidats = array("Macron", "Le Pen", "Hamon", "Mélenchon", "Fillon");
		
		$ListeThemes = array("Economie", "Environnement", "Institutions", "International et Europe", "Sécurité", "Société", "Culture");
		
		$this->page->addVar("ListeThemes", $ListeThemes);
		
		$PointsCandidats = array("Macron" => 0, "Le Pen"=>0, "Hamon"=>0, "Mélenchon"=>0, "Fillon"=>0);
		
		$ListePropositions = [];
		
		$ListePropositionsUniq = [];
		
		$ListePropositionId = [];
		
		$propositionsManager = $this->managers->getManagerOf('Propositions');
		
		
		if (!isset($_POST['envoiFormulaire'])) {
			
			//Recupération en BDD
			foreach ($ListeThemes as $theme) {
				foreach ($ListeCandidats as $candidat)
					$ListePropositions[$theme][$candidat] = $propositionsManager -> getListThemeCandidat($theme, $candidat);
			}
				
			//Récupération au hasard d'une proposition par candidat et par theme
			foreach ($ListeThemes as $theme) {
				foreach ($ListeCandidats as $candidat) {
					$cle = array_rand($ListePropositions[$theme][$candidat]);
					$proposition = $ListePropositions[$theme][$candidat][$cle];
					$ListePropositionsUniq[$theme][$candidat] = $proposition;
					
										
					$ListePropositionsId[$proposition->id()] = $proposition;
		
				};
					
				shuffle($ListePropositionsUniq[$theme]);
			}
			
			$_SESSION['ListePropositionsId'] = $ListePropositionsId;
			$_SESSION['ListePropositionsUniq'] = $ListePropositionsUniq;
			
			$this->page->addVar("ListePropositionsUniq", $ListePropositionsUniq);
		}
		else {
			
			

			$reponses = $_POST;		
			$ListePropositionsId = $_SESSION['ListePropositionsId'];
			$ListePropositionsUniq = $_SESSION['ListePropositionsUniq'];
			
			
			
			$this->page->addVar('ListePropositionsUniq', $ListePropositionsUniq);
			//$this->page->addVar('ListePropositionsId', $ListePropositionsId);
			$this->page->addVar('reponses', $reponses);
			
			$erreursId = $this->FormulaireIsValid($reponses, $ListePropositionsId);
			
			if (empty($erreursId)) {	
			
				foreach ($ListePropositionsId as $proposition) {
					
					// on attribut la note donnée par l'utilisateur à chaque proposition
					if (isset($reponses['checkImportant'.$proposition->id()])) {
						$note = 2*$reponses[$proposition->id()];
					}
					else 
					{
						(int)$note = 1*$reponses[$proposition->id()];
					}
					
					$proposition->setNote($note);
					
					// on attribut la note à chaque candidat
					$PointsCandidats[$proposition->idCandidat()] += $proposition->note();
					arsort($PointsCandidats);		
				}
				
				$this->page->addVar('PointsCandidats', $PointsCandidats);
				$this->page->addVar('revelation', 'ok');
			}
			else 
			{
				$this->page->addVar('erreursId', $erreursId);
				$this->page->addVar('msgErreur', 'Vous devez donner un avis à chaque proposition pour pouvoir valider votre formulaire.');
			}	
		}
	}
	
	public function FormulaireIsValid($reponses, $ListePropositionsId)
	{
		
		$keyPropositions = array_keys($ListePropositionsId);
	
		$erreurs = 0;
		$erreursId = [];
		
		foreach ($keyPropositions as $value)
		{
			if (array_key_exists($value, $reponses) == FALSE) {
				$erreurs += 1;
				$erreursId[] = $value;
				
			}
		}
		
		return $erreursId;	
	}


	public function executeLienfooter(HTTPRequest $request)
	{

		$contenu = file_get_contents('..\Web\infos\\'.$request->getData('subject').'.txt', FILE_USE_INCLUDE_PATH);
		$this->page->addVar('contenu', $contenu);
	}
	
	public function executePresidentielleFormulaire (HTTPRequest $request)
	{
		$this->page->addVar('title', 'Questionnaire Présidentielle 2017');
	
		$PointsCandidats = array("Macron" => 0, "Le Pen" => 0, "Hamon" => 0, "Mélenchon" => 0, "Fillon" => 0);
	
		$ListeCandidats = array("Macron", "Le Pen", "Hamon", "Mélenchon", "Fillon");
	
		$ListeThemes = array("Economie", "Environnement", "Institutions", "International et Europe", "Sécurité", "Société", "Culture");
	
	
		$themes = array("Economie" => [], "Environnement" => [], "Institutions"=>[], "International et Europe" => [], "Sécurité"=>[], "Société" => [], "Culture"=>[]);
	
		$ListePropositionsThemeCandidat = array();
		$ListePropositionsThemeCandidatUniq = array();
	
		$PropositionsManager = $this->managers->getManagerOf('Propositions');
	
		$ListePropositionsBDD = $PropositionsManager->getList();
	
		$ListePropositions = [];
	
		foreach ($ListeCandidats as $candidat) {
			foreach ($ListeThemes as $theme) {
	
	
				$ListePropositionsThemeCandidat[$candidat][$theme] = $PropositionsManager->getListThemeCandidat($theme, $candidat);
	
				$key = array_rand($ListePropositionsThemeCandidat[$candidat][$theme]).'<br>';
	
				/*
					echo $key;
					echo '<pre>';
					var_dump($ListePropositionsThemeCandidat[$candidat][$theme][$key]);
					echo '</pre>';
					*/
				//$ListePropositionsThemeCandidatUniq = $ListePropositionsThemeCandidat[$candidat][$theme][$key];
				//echo $theme.' '.$candidat.'<br>';
			};
		}
	
		echo '<pre>';
		print_r($ListePropositionsThemeCandidat['Macron']['International et Europe']);
		echo'<pre>';
	
		$k = array_rand($ListePropositionsThemeCandidat['Macron']['International et Europe']);
	
		echo $k;
	
		echo '<pre>';
		print_r($ListePropositionsThemeCandidat['Macron']['International et Europe'][$k]);
		echo'<pre>';
	
	
		foreach ($ListeCandidats as $candidat) {
			foreach ($ListeThemes as $cle => $theme) {
					
				$key_rand = array_rand($ListePropositionsThemeCandidat[$candidat][$theme]);
				//echo $key_rand.'<br>';
				//$ListePropositionsThemeCandidatUniq[$cle] = $ListePropositionsThemeCandidat[$candidat][$theme][$key_rand];
			};
		}
	
	
	
		/*
		 echo '<pre>';
		 print_r($ListePropositionsThemeCandidat);
		 echo'<pre>';
		 */
	
	
	
		foreach ($ListePropositionsBDD as $key => $proposition) {
			$ListePropositions[$proposition->id()] = $proposition;
		}
	
	
		$themes['Environnement'] = $PropositionsManager->getListTheme('Environnement');
	
		$themes['Economie'] = $PropositionsManager->getListTheme('Economie');
	
		$themes['Société'] = $PropositionsManager->getListTheme('Société');
	
		$themes['Sécurité'] = $PropositionsManager->getListTheme('Sécurité');
	
		$themes['International et Europe'] = $PropositionsManager->getListTheme('International et Europe');
	
		$themes['Culture'] = $PropositionsManager->getListTheme('Culture');
	
		$themes['Institutions'] = $PropositionsManager->getListTheme('Institutions');
	
		$this->page->addVar('themes', $themes);
	
		if (isset($_POST)) {
			/*echo '<pre>';
				print_r($_POST);
				echo '</pre>';*/
			$reponses = $_POST;
				
		}
	
	
		if (isset($reponses['envoiFormulaire'])) {
				
			$this->page->addVar('reponses', $reponses);
	
			if ($this->FormulaireIsValid($reponses, $ListePropositions)) {
					
				//var_dump($this->FormulaireIsValid($reponses, $ListePropositions));
					
				foreach ($ListePropositions as $key => $proposition) {
	
					if (array_key_exists('checkImportant'.$key, $reponses)) {
						$proposition->setNote($reponses[$key]*2);
					}
					else
					{
						$proposition->setNote($reponses[$key]);
					}
						
				}
					
				foreach ($ListePropositions as $key => $proposition) {
					$PointsCandidats[$proposition->idCandidat()] += $proposition->note();
				}
					
				$this->page->addVar('PointsCandidats', $PointsCandidats);
			}
			else {
				$this->page->addVar("msgErreur", "*Vous devez donner un avis pour chaque proposition avant de valider.");
			}
	
		}
	
	}
	
	

}