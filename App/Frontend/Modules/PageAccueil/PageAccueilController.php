<?php
namespace App\Frontend\Modules\PageAccueil;

use OCFram\BackController;
use OCFram\HTTPRequest;



class PageAccueilController extends BackController
{
	public function executeIndex (HTTPRequest $request)
	{
		$this->page->addVar('title', 'Jeu-Vote');
		
		
	}
	
	
	
	public function executeLienfooter(HTTPRequest $request)
	{
		
		$contenu = file_get_contents('..\Web\infos\\'.$request->getData('subject').'.txt', FILE_USE_INCLUDE_PATH);
		$this->page->addVar('contenu', $contenu);
	}
	
}
	