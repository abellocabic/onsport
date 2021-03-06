<?php

$w_routes = array(
	//Tahar
	['GET', '/', 'Default#home', 'home'],
	['GET|POST', '/inscription', 'Default#inscription', 'inscription'],
	['POST', '/login', 'Default#login', 'login'],
	['GET', '/logout', 'Default#logout', 'logout'],
	['GET', '/erreur', 'Default#erreur', 'erreur'],
	['GET', '/profil', 'Default#profil', 'profil'],
	['GET|POST', '/oubli', 'Default#oubli', 'oubli'],
	['GET|POST', '/envoiMessage', 'Default#envoiMessage', 'envoiMessage'],
	['GET|POST', '/reception', 'Default#reception', 'reception'],
	['GET|POST', '/profilPerso', 'Default#profilPerso', 'profilPerso'],

	//Adriana
	['GET|POST', '/sports', 'Sport#sport_list', 'sport_list'],
	['GET|POST', '/sports/[a:sport]', 'Sport#sport_detail', 'sport_detail'],

	);