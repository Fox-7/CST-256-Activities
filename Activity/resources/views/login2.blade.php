@extends('layouts.appmaster') 
@section('title', 'Login Page')
@section('content')

<form action="doLogin" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
	<center>
		<body>

			<h2>User Login Form</h2>

			<!-- Username -->
			<span
				style="display: inline-block; width: 100px; padding-bottom: 5px;">Username:
			</span>
			<input type="text" name="Username">
			<br>

			<!-- Password -->
			<span
				style="display: inline-block; width: 100px; padding-bottom: 5px;">Password:
			</span>
			<input type="password" name="Password">
			<br>
			<input type="submit" value="Login">
			<br>

</form>
</body>
</center>

</form>

@endsection
