<?php
namespace Entity;

use \OCFram\Entity;

class Proposition extends Entity
{
	protected $idCandidat, $proposition, $detail, $theme, $note;
	
	const IDCANDIDAT_INVALID = 1;
	const PROPOSITION_INVALID = 2;
	const DETAIL_INVALID = 3;
	const THEME_INVALID = 4;
	const NOTE_INVALID = 5;
	
	public function isValid()
	{
		return !(empty($this->idCandidat) || empty($this->proposition) || empty($this->detail) || empty($this->theme));
	}
	
	public function setIdCandidat($idCandidat)
	{
		if (!is_string($auteur) || empty($auteur)) {
			$this->erreurs[] = self::IDCANDIDAT_INVALID;
		}
		$this->idCandidat = $idCandidat;
	}
	
	public function setProposition($proposition)
	{
		if (!is_string($auteur) || empty($auteur)) {
			$this->erreurs[] = self::PROPOSITION_INVALID;
		}
		$this->proposition = $proposition;
	}
	
	public function setDetail($detail)
	{
		if (!is_string($auteur) || empty($auteur)) {
			$this->erreurs[] = self::DETAIL_INVALID;
		}
		$this->detail = $detail;		
	}
	
	public function setTheme($theme)
	{
		if (!is_string($auteur) || empty($auteur)) {
			$this->erreurs[] = self::THEME_INVALID;
		}
		$this->theme = $theme;
	}
	
	public function setNote($note)
	{
		if (!is_int($note) || empty($note)) {
			$this->erreurs[] = self::NOTE_INVALID;
		}
		$this->note = $note;
	}
	
	public function idCandidat()
	{
		return $this->idCandidat;
	}
	
	public function proposition()
	{
		return $this->proposition;
	}
	
	public function detail()
	{
		return $this->detail;
	}
	
	public function theme()
	{
		return $this->theme;
	}
	
	public function note()
	{
		return $this->note;
	}
}