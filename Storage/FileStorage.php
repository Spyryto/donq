<?php

namespace Storage;

require __DIR__ . '/../vendor/autoload.php';

use Domain\Storage;

use function Safe\file_get_contents;
use function Safe\file_put_contents;
use function Safe\realpath;

class FileStorage implements Storage
{
	/** @var string */
	private $filePath;

	function __construct(string $filePath)
	{
		$this->createFileIfNotExists($filePath);
		$this->filePath = realpath($filePath);
	}

	function read(): string
	{
		return file_get_contents($this->filePath);
	}

	function write(string $contents)
	{
		file_put_contents($this->filePath, $contents);
	}

	function createFileIfNotExists(string $filePath)
	{
		if (!file_exists($filePath)) {
			file_put_contents($filePath, '');
		}
	}
}
