<div style="margin:5px;">
	<a href="<?php echo BASE_URL; ?>">Home</a>
</div>
<?php
if(!empty($this->error)){
	foreach ($this->error as $val) {
		echo '<li>'.$val.'</li>';
	}
}
?>
<div>
	<form method="post" action="<?php echo BASE_URL.'userapp/user/login'; ?>">
		<div>
			Email : <input type="text" name="email"/>
		</div>
		<div>
			Password : <input type="password" name="password"/>
		</div>
		<div>
			<input type="submit" name="login" value="Login"/>
		</div>
	</form>
</div>