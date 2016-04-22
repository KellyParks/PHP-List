<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<h3 class="text-center">Create a free account to start using E-list.</h3>
		<?php echo $errors ?>
		<form method="post" class="form-horizontal">
			<div class="form-group">
				<label for="username">Username:</label>
		    	<input type="text" class="form-control" name="username" id="username" value="<?php echo submittedValue('username') ?>">
    		</div>
		    <div class="form-group">
			    <label for="email">Email:</label>
			    <input type="email" class="form-control" name="email" id="email" value="<?php echo submittedValue('email') ?>">
		    </div>
		    <div class="form-group">
			    <label for="password">Password:</label>
			    <input type="text" class="form-control" name="password" id="password" value="<?php echo submittedValue('password') ?>">
		    </div>
		    <div class="form-group">
    			<button class="btn btn-success btn-lg" type="submit" name="Submit">Submit</button>
    		</div>
    	</form>
    </div>
</div>