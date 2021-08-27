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
		return $this->photoProvider->photoPreviewList($data);
	}

	function getPhotoDetails()
	{
		$data = $this->storage->read();
		return $this->photoProvider->photoDetailList($data);
	}
}
