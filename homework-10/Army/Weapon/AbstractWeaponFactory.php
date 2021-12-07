<?php

namespace Army\Weapon;

interface AbstractWeaponFactory
{
	public function createKnife(): Knife;

	public function createBow(): Bow;
}