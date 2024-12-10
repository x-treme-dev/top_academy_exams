<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog of Sounds</title>
</head>
<body>
<form action="{{ route('search') }}" method='post' enctype='multipart/form-data'>
@csrf
<input type="text" name='search' id="search" required placeholder="Enter word..."  class="@error('search') is-invalid @else is-valid @enderror">
         @error('search')
         <b>{{ $message }}</b>
         @enderror
<br><br>
    <input type="submit" value="Search">
</form>


@if(count($searchData) != 0)
<?php
$name = $searchData[0]->sound_name . '.mp3';
?>

<br><br>
<form action="" method='post' enctype='multipart/form-data'>
@csrf
<textarea style="width:200px; height:200px;" type="text" name='review' id="review" required placeholder="Do you like this sound?"  class="@error('review') is-invalid @else is-valid @enderror">
</textarea>
@error('review')
<b>{{ $message }}</b>
@enderror
<br>
    <input style="width:200px; height:20px; text-align:center;" type="submit" value="Send">
</form>

<p>
Track Name: <b>{{ $searchData[0]->sound_name}} </b> 
<br><br>
<audio controls>
<source src="uploads/{{$name}}" type="audio/mpeg">
</audio>
</p>
@else 
<p>
    <b>
       Not sound in library
    </b>
</p>
@endif

</body>
</html>