<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="signup.php" method="post" novalidate>
                <p><span class="font-italic font-weight-bold">All fields with "*" are required.</span></p>
                <div class="form-group">
                    <label for="f_name">First Name *</label>
                    <input type="text" class="form-control" name="f_name" id="f_name" maxlength="30" value="<?php if (isset($_POST['f_name'])) echo htmlspecialchars($_POST['f_name']); ?>" placeholder="First Name *" autofocus required>
                    <span class="error"><?php if (!empty($errors['f_name'])) echo '* ' . htmlspecialchars($errors['f_name']); ?></span>
                </div>
                <div class="form-group">
                    <label for="l_name">Last Name *</label>
                    <input type="text" class="form-control" name="l_name" id="l_name" maxlength="30" value="<?php if (isset($_POST['l_name'])) echo htmlspecialchars($_POST['l_name']); ?>" placeholder="Last Name *" required>
                    <span class="error"><?php if (!empty($errors['l_name'])) echo '* ' . htmlspecialchars($errors['l_name']); ?></span>
                </div>
                <div class="form-group">
                    <label for="cust_email">Email *</label>
                    <input type="email" class="form-control" name="cust_email" id="cust_email" maxlength="50" value="<?php if (isset($_POST['cust_email'])) echo htmlspecialchars($_POST['cust_email']); ?>" placeholder="Email *" required>
                    <span class="error"><?php if (!empty($errors['cust_email'])) echo '* ' . htmlspecialchars($errors['cust_email']); ?></span>
                </div>
                <div class="form-group">
                    <label for="cust_phone">Phone Number</label>
                    <input type="tel" class="form-control" name="cust_phone" id="cust_phone" maxlength="10" value="<?php if (isset($_POST['cust_phone'])) echo htmlspecialchars($_POST['cust_phone']); ?>" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <label for="pass1">Password *</label>
                    <input type="password" class="form-control" name="pass1" id="pass1" maxlength="40" value="" placeholder="Password *" required>
                    <span class="error"><?php if (!empty($errors['passworderror1'])) echo '* ' . htmlspecialchars($errors['passworderror1']); ?></span>
                </div>
                <div class="form-group">
                    <label for="pass2">Re-type Password *</label>
                    <input type="password" class="form-control" name="pass2" id="pass2" maxlength="40" value="" placeholder="Re-type Password *" required>
                    <span class="error"><?php if (!empty($errors['passworderror2'])) echo '* ' . htmlspecialchars($errors['passworderror2']); ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <input type="reset" class="btn btn-secondary ml-2" value="Clear" id="clear">
                </div>
            </form>
        </div>
    </div>
</div>
