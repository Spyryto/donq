<?php

namespace Domain;

use DateTime;

interface PhotoPreview
{
	function title(): string;

	function imageUrl(): string;

	function dateTaken(): DateTime;
}
