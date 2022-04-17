<?php
namespace App\Frontend\Modules\BDDFormulaire;

use OCFram\BackController;
use OCFram\HTTPRequest;



class BDDFormulaireController extends BackController
{
	public function executeIndex (HTTPRequest $request)
	{
		$this->page->addVar('title', 'BDDFormulaire');
		
		if ($_POST['theme']!="") {
			var_dump($_POST);
		
		
		$propositionsManager = $this->managers->getManagerOf('Propositions');
		
		$propositionsManager->insertProposition($_POST['theme'], $_POST['idCandidat'], $_POST['proposition'], $_POST['detail']);
		}
	}
	
	public function executeModif (HTTPRequest $request)
	{
		$propositionManager = $this->managers->getManagerOf('Propositions');
		
		$propositionManager->updateProposition();
	}


}