<?php

namespace Domain;

class Utils
{
	static function capBetween($min, $value, $max)
	{
		return min(max(0, $value), $max);
	}
}
