<!-- register form -->
<div class="regform">
	<form action="signup.php" method="post" novalidate>
    <p><span class="w3-italic w3-bold">All fields with "*" are required.</span></p>		<label for="f_name">First Name *</label>
		<input type="text" name="f_name" id="f_name" maxlength="30" value="<?php if (isset($_POST['f_name'])) echo htmlspecialchars($_POST['f_name']); ?>" placeholder="First Name *" autofocus required>
		<span class="error"><?php if (!empty($errors['f_name'])) echo '* ' . htmlspecialchars($errors['f_name']); ?></span><br>
		<label for="l_name">Last Name *</label>
		<input type="text" name="l_name" id="l_name" maxlength="30" value="<?php if (isset($_POST['l_name'])) echo htmlspecialchars($_POST['l_name']); ?>" placeholder="Last Name *" required>
		<span class="error"><?php if (!empty($errors['l_name'])) echo '* ' . htmlspecialchars($errors['l_name']); ?></span><br>
		<label for="cust_email">Email *</label>
		<input type="email" name="cust_email" id="cust_email" maxlength="50" value="<?php if (isset($_POST['cust_email'])) echo htmlspecialchars($_POST['cust_email']); ?>" placeholder="Email *" required>
		<span class="error"><?php if (!empty($errors['cust_email'])) echo '* ' . htmlspecialchars($errors['cust_email']); ?></span><br>
		<label for="cust_phone">Phone Number </label>
		<input type="tel" name="cust_phone" id="cust_phone" maxlength="10" value="<?php if (isset($_POST['cust_phone'])) echo htmlspecialchars($_POST['cust_phone']); ?>" placeholder="Phone Number"><br>
		<input type="password" name="pass1" id="pass1" maxlength="40" value="" placeholder="Password *" required>
		<span class="error"><?php if (!empty($errors['passworderror1'])) echo '* ' . htmlspecialchars($errors['passworderror1']); ?></span><br>
		<label for="pass2">Re-type Password *</label>
		<input type="password" name="pass2" id="pass2" maxlength="40" value="" placeholder="Re-type Password *" required>
		<span class="error"><?php if (!empty($errors['passworderror2'])) echo '* ' . htmlspecialchars($errors['passworderror2']); ?></span><br><br>
		<input class="w3-btn w3-teal" type="submit" name="submit" value="Submit">
		<input class="w3-btn w3-khaki w3-margin-left" type="reset" value="Clear" id="clear">
	</form>
</div>