<?php
require_once 'Modele.php';
class HorairreDb extends Modele {

	public function getHorairre() {
        $sql = "SELECT id, date, heureDebAM, heureFinAM, heureDebPM, heureFinPM, idEntreprise FROM horairre";
		$horairre = $this->executerRequete($sql);
		return $horairre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHorairreId ($id) {
		$sql = "SELECT date, heureDebAM, heureFinAM, heureDebPM, heureFinPM, idEntreprise FROM horairre WHERE id = ?"; 
		$resultat = $this->executerRequete($sql, array($id));
		if ($resultat->rowCount() > 0)
			return $resultat->fetch();
		else
			throw new Exception("Pas de résultat");
    }

	public function getHorairreIdEntreprise ($idEntreprise) {
		$sql = "SELECT id, date, heureDebAM, heureFinAM, heureDebPM, heureFinPM FROM horairre WHERE idEntreprise = ?"; 
		$resultat = $this->executerRequete($sql, array($idEntreprise));
		if ($resultat->rowCount() > 0)
			return $resultat->fetchAll(PDO::FETCH_ASSOC);
		else
			throw new Exception("Pas de résultat");
    }

	public function getHorairreIdEntrepriseAndDate ($idEntreprise, $date) {
		$sql = "SELECT id, heureDebAM, heureFinAM, heureDebPM, heureFinPM FROM horairre WHERE idEntreprise = ? AND date = ?"; 
		$resultat = $this->executerRequete($sql, array($idEntreprise, $date));
		return $resultat->fetch();
    }


	public function modifHorairreId ($idEntreprise, $date, $heureDebAM, $heureFinAM, $heureDebPM, $heureFinPM) {
		$sql = "UPDATE horairre SET heureDebAM = ?, heureFinAM = ?, heureDebPM = ?, heureFinPM = ? WHERE idEntreprise = ? AND date = ?"; 
		$this->executerRequete($sql, array ($heureDebAM, $heureFinAM, $heureDebPM, $heureFinPM, $idEntreprise, $date));
	}

	public function ajoutHorairreId ($date, $heureDebAM, $heureFinAM, $heureDebPM, $heureFinPM, $idEntreprise) {
		$sql = "INSERT INTO horairre(date, heureDebAM, heureFinAM, heureDebPM, heureFinPM, idEntreprise) VALUES (?, ?, ?, ?, ?, ?)"; 
		$this->executerRequete($sql, array ($date, $heureDebAM, $heureFinAM, $heureDebPM, $heureFinPM, $idEntreprise));
	}
}