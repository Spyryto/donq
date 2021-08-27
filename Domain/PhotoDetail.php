<?php

namespace Domain;

use DateTime;

interface PhotoDetail
{
	function title(): string;

	function pageUrl(): string;

	function imageUrl(): string;

	function dateTaken(): DateTime;

	function description(): string;

	function datePublished(): DateTime;

	function author(): string;

	function authorId(): string;

	/** @return string[] */
	function tags(): array;
}
