
@if($errors->has())
<ul id="errors">
	<li>{{ $errors->first('name') }}</li>
	<li>{{ $errors->first('description') }}</li>
	<li>{{ $errors->first('link') }}</li>
	<li>{{ $errors->first('picture') }}</li>
</ul>
@endif