<?php

$w_routes = array(
	['GET', '/', 'Default#home', 'home'],
	['GET|POST', '/inscription', 'Default#inscription', 'inscription'],
	['POST', '/login', 'Default#login', 'login'],
	['GET', '/logout', 'Default#logout', 'logout'],
	['GET', '/erreur', 'Default#erreur', 'erreur'],
	['GET', '/profil', 'Default#profil', 'profil'],
	['GET|POST', '/oubli', 'Default#oubli', 'oubli'],
	['GET|POST', '/envoiMessage', 'Default#envoiMessage', 'envoiMessage'],

	);