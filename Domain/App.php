<?php

namespace Domain;

class App
{
	/** @var Storage */
	private $storage;

	/** @var DataSource */
	private $dataSource;

	/** @var PhotoProvider */
	private $photoProvider;

	function __construct(
		Storage $storage,
		DataSource $dataSource,
		PhotoProvider $photoProvider
	) {
		$this->storage = $storage;
		$this->dataSource = $dataSource;
		$this->photoProvider = $photoProvider;
	}

	function refreshData()
	{
		$data = $this->dataSource->refreshData();
		$this->storage->write($data);
	}

	function getPhotoPreviews()
	{
		$data = $this->storage->read();
		if (empty($data)) return [];
		return $this->photoProvider->photoPreviewList($data);
	}

	function getPhotoDetails(int $index)
	{
		$data = $this->storage->read();
		$photos = $this->photoProvider->photoDetailList($data);
		$photoCount = count($photos);
		if ($photoCount === 0) {
			throw new \Exception('Resource not available');
		}
		$i = Utils::capBetween(0, $index, $photoCount);
		return $photos[$i];
	}
}
