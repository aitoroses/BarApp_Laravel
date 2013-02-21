
@if($errors->has())
<ul id="errors">
	<li>{{ $errors->first('username') }}</li>
	<li>{{ $errors->first('password') }}</li>
	<li>{{ $errors->first('type') }}</li>
</ul>
@endif