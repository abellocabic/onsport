<?php

namespace Controller;

use \W\Controller\Controller;

class SportController extends Controller
{

	public function sport_detail($sport)
	{
		
		$smanager = new \Manager\SportManager();

		//Prendre les infos du sport from URL et l'id du sport
		$sinfo = $smanager->get_sport_info($sport);

		//Get the Sport Id
		$sid = $sinfo[0]['id'];

		//Get an Array from DB with all players who practice sport 
		$sportifs = $smanager->get_users_by_sport($sid);

		$this->show('sports/sport_detail', ['sinfo' => $sinfo, 
											'sportifs' => $sportifs,]);
	}

	public function sport_list()
	{
		$this->show('sports/sport_list');
	}

}
