<?php

namespace Domain;

interface Storage
{
	function read(): string;

	function write(string $contents);
}
