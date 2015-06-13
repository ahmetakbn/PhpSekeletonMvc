<div style="margin:5px;">
	<a href="<?php echo BASE_URL; ?>">Home</a>
</div>
<?php

if($this->success){
	echo 'Registiration was successful.';
}else{

	if(!empty($this->error)){
		foreach ($this->error as $val) {
			echo '<li>'.$val.'</li>';
		}
	}
?>
<div>
	<form method="post" action="<?php echo BASE_URL.'userapp/user/register'; ?>">
		<div>
			Name : <input type="text" name="name"/>
		</div>
		<div>
			Email : <input type="text" name="email"/>
		</div>
		<div>
			Password : <input type="password" name="password"/>
		</div>
		<div>
			Repeat Password  : <input type="password" name="password_repeat"/>
		</div>
		<div>
			<input type="submit" name="register" value="Register"/>
		</div>
	</form>
</div>
<?php } ?>