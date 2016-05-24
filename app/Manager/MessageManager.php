<?php

namespace Manager;

class MessageManager extends \W\Manager\Manager {

	public function testy()
	{
		$sql = "SELECT `id_partenaire` FROM `messages` WHERE `id_user`= :id_user GROUP BY `id_partenaire`ORDER BY `date` DESC";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id_user", $_SESSION['user']['id']);
		$sth->execute();
		

		return $sth->fetchAll();
	}	

}

