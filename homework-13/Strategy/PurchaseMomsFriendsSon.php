<?php

namespace Strategy;

use Entity\Service;

class PurchaseMomsFriendsSon implements PurchaseStrategy
{

	public function purchase(): Service
	{
		// take money
		$service = new Service();

		$service->setActivatedUntil((new \DateTime())->modify("+ 365 days"));
		$service->setType(Service::TYPES['momsFriendsSon']);
		return $service;
	}
}