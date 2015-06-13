<div style="margin:5px;">
	<a href="<?php echo BASE_URL; ?>userapp/dashboard">Dashboard</a>
</div>
<?php if(!$this->userLogin){ ?>
	<div>Please Login!</div>
<?php }else{ ?>
<div>
	<form method="post" action="<?php echo BASE_URL.'searchapp/search'; ?>">
		<div>
			Search : <input type="text" name="query"/>
		</div>
		<div>
			<input type="submit" name="search" value="Search"/>
		</div>
	</form>
</div>
<?php if(!empty($this->query)){ ?>
	<div style="margin-top: 10px;">Search Results For : <?php echo $this->query; ?></div>
	<?php if(!$this->result){ ?>
		<div>Nothing found!</div>
	<?php }else{ ?>
		<?php foreach ($this->result as $value) { ?>
				<li><?php echo $value['name']; ?></li>
		<?php } ?>
	<?php } ?>
<?php } ?>
<?php } ?>