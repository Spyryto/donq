<?php
	$allTags = join(' / ', $photo->tags());
?>

<table border="1">
	<tr><td> Title: </td><td> {{ $photo->title() }} </td></tr>
	<tr><td> Link: </td><td> <a href="{{ $photo->pageUrl() }}"> Link to photo page </a>  </td></tr>
	<tr><td> Photo: </td><td> <img src="{{ $photo->imageUrl() }}"> </td></tr>
	<tr><td> Date taken: </td><td> {{ $photo->dateTaken()->format('c') }} </td></tr>
	<tr><td> Description: </td><td> {!! $photo->description() !!} </td></tr>
	<tr><td> Published: </td><td> {{ $photo->datePublished()->format('c') }} </td></tr>
	<tr><td> Author: </td><td> {{ $photo->author() }} </td></tr>
	<tr><td> Author ID: </td><td> {{ $photo->authorId() }} </td></tr>
	<tr><td> Tags: </td><td> {{ $allTags }} </td></tr>
</table>