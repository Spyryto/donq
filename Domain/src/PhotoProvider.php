<?php

namespace Domain;

interface PhotoProvider
{
	/** @return PhotoDetail[] */
	function photoDetailList(string $json);

	/** @return PhotoPreview[] */
	function photoPreviewList(string $json);
}
