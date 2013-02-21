
@if($errors->has())
<ul id="errors">
	<li>{{ $errors->first('name') }}</li>
	<li>{{ $errors->first('description') }}</li>
	<li>{{ $errors->first('category') }}</li>
	<li>{{ $errors->first('rating') }}</li>
	<li>{{ $errors->first('price') }}</li>
	<li>{{ $errors->first('picture') }}</li>
</ul>
@endif
