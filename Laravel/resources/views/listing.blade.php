<button onclick="javascript:location.href='/refresh';"> Refresh data </button>

<br><br>

<table border="1">
	<thead>
		<th> Image </th>
		<th> Title </th>
		<th> Subtitle </th>
	</thead>
	<tbody>

	@foreach ($photos as $photo)
		<tr onclick="javascript:location.href='/detail/{{ $loop->index }}';">
			<td><img src="{{ $photo->imageUrl() }}"></td>
			<td>{{ $photo->title() }}</td>
			<td>{{ $photo->dateTaken()->format('Y-m-d') }}</td>
		</tr>
	@endforeach

	</tbody>
</table>

<br><br>

<button onclick="javascript:location.href='/refresh';"> Refresh data </button>