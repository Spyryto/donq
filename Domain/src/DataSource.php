<?php

namespace Domain;

interface DataSource
{
	/** @return string */
	function refreshData();
}
