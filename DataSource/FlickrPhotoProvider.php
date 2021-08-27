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

	/** @return Photo[] */
	static function photosFromJson(string $json)
	{
		$dto = json_decode($json);

		$photoCollection = [];
		foreach ($dto->items as $item) {
			$photoCollection[] = new Photo(
				$item->title,
				$item->link,
				$item->media->m,
				new DateTime($item->date_taken),
				$item->description,
				new DateTime($item->published),
				$item->author,
				$item->author_id,
				explode(' ', $item->tags),
			);
		}

		return $photoCollection;
	}

	/** @return PhotoDetail[] */
	function photoDetailList(string $json)
	{
		return self::photosFromJson($json);
	}

	/** @return PhotoPreview[] */
	function photoPreviewList(string $json)
	{
		return self::photosFromJson($json);
	}
}
