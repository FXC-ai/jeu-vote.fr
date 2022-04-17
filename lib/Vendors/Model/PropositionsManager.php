<?php
namespace Model;

use \OCFram\Manager;

abstract class PropositionsManager extends Manager
{
	abstract public function getList();
	
	abstract public function getListTheme($theme);
	
	abstract public function getListCandidat($candidat);
}