<?php

use Domain\App;
use Config\Settings;
use DataSource\FlickrPhotoProvider;
use Storage\FileStorage;

require __DIR__ . '/vendor/autoload.php';

$flickerDataStorage = new FileStorage(Settings::STORAGE_DIR . "/flicker-data.json");
$flickerPhotoProvider = new FlickrPhotoProvider;

$app = new App(
	$flickerDataStorage,
	$flickerPhotoProvider,
	$flickerPhotoProvider
);
