<?php
namespace Model;

use \Entity\Proposition;


class PropositionsManagerPDO extends PropositionsManager
{
	public function getList()
	{
		$sql = 'SELECT * FROM propositions2017 ORDER BY THEME';
		
		$requete = $this->dao->query($sql);
	
	
		$a = $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Proposition');
	
		$listeNews = $requete->fetchAll();
		
		$requete->closeCursor();
	
		return $listeNews;
	}
	
	public function getListTheme ($theme)
	{
		$q = $this->dao->prepare('SELECT * FROM propositions2017 WHERE theme = :theme');
		$q->bindValue(':theme', $theme);
		$q->execute();
		
		$q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Proposition');
		$propositions = $q->fetchAll();
		
		return $propositions;	
	}
	
	public function getListCandidat ($candidat)
	{
		$q = $this->dao->prepare('SELECT * FROM propositions2017 WHERE candidat = :candidat');
		$q->bindValue(':candidat', $candidat);
		$q->execute();
	
		$q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Proposition');
		$propositions = $q->fetchAll();
	
		return $propositions;
	}
	
	public function getListThemeCandidat ($theme, $candidat)
	{
		$q = $this->dao->prepare('SELECT * FROM propositions2017 WHERE theme = :theme AND idCandidat = :idCandidat');
		$q->bindValue(':theme', $theme);
		$q->bindValue(':idCandidat', $candidat);
		$q->execute();
	
		$q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Proposition');
		$propositions = $q->fetchAll();
	
		return $propositions;
	}
	
	public function insertProposition ($theme, $idCandidat, $proposition, $detail)
	{
		$q = $this->dao->prepare('INSERT INTO propositions2017 SET theme = :theme, idCandidat = :idCandidat, proposition = :proposition, detail = :detail');
		
		$q->bindValue(':theme', $theme);
		$q->bindValue(':idCandidat', $idCandidat);
		$q->bindValue(':proposition', $proposition);
		$q->bindValue(':detail', $detail);
		
		$q->execute();
	}
	
	public function updateProposition ()
	{
		$q = $this->dao->prepare('UPDATE propositions2017 SET theme = :nouveauTheme WHERE theme = :themeAchanger ');
	
		$q->bindValue(':nouveauTheme', 'International et Europe');
		$q->bindValue(':themeAchanger', 'International');
	
		$q->execute();
	}
	
	
}