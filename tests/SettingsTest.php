<?php

use Config\Settings;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertIsString;
use function PHPUnit\Framework\assertNotEmpty;

class SettingsTest extends TestCase
{
	public function testSettingsClassIsReachable()
	{
		$folderName = Settings::STORAGE_DIR;
		assertIsString($folderName);
		assertNotEmpty($folderName);
	}
}
