<?php

namespace Controller;

use \W\Controller\Controller;

class SportController extends Controller
{

	public function sport_detail()
	{
		$this->show('sports/sport_detail');
	}

	public function sport_list()
	{
		$this->show('sports/sport_list');
	}

}
