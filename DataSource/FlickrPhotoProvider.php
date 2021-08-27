<?php

namespace DataSource;

use DateTime;
use DataSource\Photo;
use Domain\DataSource;
use Domain\PhotoProvider;
use PhotoDetail;
use PhotoPreview;

use function Safe\fclose;
use function Safe\fopen;
use function Safe\json_decode;
use function Safe\stream_get_contents;

class FlickrPhotoProvider implements DataSource, PhotoProvider
{
	const API_URL = 'https://api.flickr.com/services/feeds/photos_public.gne?format=json&lang=en-us&nojsoncallback=1';

	/** @return string */
	function refreshData()
	{
		$handle = fopen(self::API_URL, "rb");
		$contents = stream_get_contents($handle);
		fclose($handle);
		return $contents;
	}

	/** @return Photo */
	static function photoFromJson(string $json)
	{
		$dto = json_decode($json);

		return new Photo(
			$dto->title,
			$dto->link,
			$dto->media['m'],
			new DateTime($dto->date_taken),
			$dto->description,
			new DateTime($dto->published),
			$dto->author,
			$dto->author_id,
			explode(' ', $dto->tags),
		);
	}

	/** @return PhotoDetail[] */
	function photoDetailList(string $json)
	{
		return self::photoFromJson($json);
	}

	/** @return PhotoPreview[] */
	function photoPreviewList(string $json)
	{
		return self::photoFromJson($json);
	}
}
