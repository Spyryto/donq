<?php

use Domain\Utils;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class UtilsTest extends TestCase
{
	public function testCapLegitNumber()
	{
		$n = Utils::capBetween(0, 5, 10);
		assertEquals(5, $n);
	}

	public function testCapTooLowANumber()
	{
		$n = Utils::capBetween(0, -1, 10);
		assertEquals(0, $n);
	}

	public function testCapTooHighANumber()
	{
		$n = Utils::capBetween(0, 12, 10);
		assertEquals(10, $n);
	}
}
