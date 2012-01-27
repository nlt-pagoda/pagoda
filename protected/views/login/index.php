<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);?>
<h1>Login to Pagoda</h1>

<br>
<p>
<form name="login" method="POST" action="Login/VerifyCredentials">
Username:<input type="text" name="username"><br>
Password:<input type="password" name="password"><br>
<input type="submit" value="Submit">
</form>


</p>
<p>
</p>
