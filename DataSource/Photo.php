<?php

namespace DataSource;

use DateTime;
use Domain\PhotoDetail;
use Domain\PhotoPreview;

class Photo implements PhotoPreview, PhotoDetail
{
	/* Properties */

	/** @var string */
	private $title;

	/** @var string */
	private $pageUrl;

	/** @var string */
	private $imageUrl;

	/** @var DateTime */
	private $dateTaken;

	/** @var string */
	private $description;

	/** @var DateTime */
	private $datePublished;

	/** @var string */
	private $author;

	/** @var string */
	private $authorId;

	/** @var string[] */
	private $tags;

	/* Getters */

	function title(): string
	{
		return $this->title;
	}

	function pageUrl(): string
	{
		return $this->pageUrl;
	}

	function imageUrl(): string
	{
		return $this->imageUrl;
	}

	function dateTaken(): DateTime
	{
		return $this->dateTaken;
	}

	function description(): string
	{
		return $this->description;
	}

	function published(): string
	{
		return $this->published;
	}

	function author(): string
	{
		return $this->author;
	}

	function authorId(): string
	{
		return $this->authorId;
	}

	/** @return string[] */
	function tags(): array
	{
		return $this->tags;
	}

	/* Constructors */

	function __construct(
		string $title,
		string $pageUrl,
		string $imageUrl,
		DateTime $dateTaken,
		string $description,
		DateTime $datePublished,
		string $author,
		string $authorId,
		array $tags
	) {
		$this->title = $title;
		$this->pageUrl = $pageUrl;
		$this->imageUrl = $imageUrl;
		$this->dateTaken = $dateTaken;
		$this->description = $description;
		$this->datePublished = $datePublished;
		$this->author = $author;
		$this->authorId = $authorId;
		$this->tags = $tags;
	}

	static function fromStrings(
		string $title,
		string $pageUrl,
		string $imageUrl,
		string $dateTaken,
		string $description,
		string $datePublished,
		string $author,
		string $authorId,
		array $tags
	) {
		return new static(
			$title,
			$pageUrl,
			$imageUrl,
			new DateTime($dateTaken),
			$description,
			new DateTime($datePublished),
			$author,
			$authorId,
			$tags
		);
	}
}
