<?php 


namespace Manager;

class SportManager extends \W\Manager\Manager 
{
	
	public function get_sport_info($sport)
	{
		$sql = "SELECT `id`, `nom` FROM `sports` WHERE `nom` like :nom ";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":nom", $sport);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function get_users_by_sport($id_sport)
	{
		$sql = "SELECT U.*, US.* FROM wusers AS U, user_sport as US WHERE US.id_sport = :id_sport AND US.id_user = U.id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id_sport", $id_sport);
		$sth->execute();

		return $sth->fetchAll();
	}


}