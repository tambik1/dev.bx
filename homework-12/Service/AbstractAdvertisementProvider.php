<?php

namespace Service;

use Service\Formatting\Formatter;

abstract class AbstractAdvertisementProvider implements AdvertisementProviderInterface
{

	protected $formatter;

	public function __construct(Formatter $formatter)
	{
		$this->formatter=$formatter;
	}
}