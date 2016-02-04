<?php

Namespace app;

use webd\clustering\KMeans;

/**
* Main Class
*/
class Main
{
	public function __invoke()
	{
		$set = new ObjectParser([
			// the objects and its tags
			'The Matrix' => ['Action', 'Sci-Fi'],
			'Lord of The Rings' => ['Adventure', 'Drama', 'Fantasy'],
			'Batman' => ['Action', 'Drama', 'Crime'],
			'Fight Club' => ['Drama'],
			'Pulp Fiction' => ['Drama', 'Crime'],
			'Django' => ['Drama', 'Western'],
		]);

		// Simple KMeans
		$kmeans = new KMeans();
		$kmeans->k = 2;
		$kmeans->n = 10;
		$kmeans->points = $set->getPoints();
		$kmeans->run();
		
		foreach ($kmeans->centers as $center) {
			var_dump($center->getPoints());
		}
	}
}