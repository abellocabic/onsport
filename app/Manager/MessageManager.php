<?php

namespace Manager;

class MessageManager extends \W\Manager\Manager {

	public function testy()
	{
		$sql = "SELECT * FROM `messages` WHERE `id_user`= :id_user GROUP BY `id_partenaire`ORDER BY `date` DESC";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id_user", $_SESSION['user']['id']);
		$sth->execute();
		

		return $sth->fetchAll();
	}	

	/*public function get_users_by_message()
	{
		$sql = "SELECT "
	}*/

	public function findAllById($id, $pid){
		$sql ="SELECT * FROM messages WHERE (id_user = :id_user or id_user = :pid) AND (id_partenaire = :pid or id_partenaire = :id_user) ORDER BY date ASC";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id_user", $id);
		$sth->bindValue(":pid", $pid);
		$sth->execute();

		return $sth->fetchAll();
	}

}

