<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Thank you</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<h1>Thank you!</h1>
<hr />

<h2>You have been registered as <?= $_SESSION["name"] ?>.</h2>
<h3>Here is your data:</h3>
    <dl>
        <fieldset>
            <legend><strong>Personal</strong></legend>
            <dt class="thankyou">Name</dt>
            <dd class="thankyou">
                <?= $_SESSION["name"] ?>

            </dd>
            <dt class="thankyou">Email</dt>
            <dd class="thankyou">
                <?= $_SESSION["email"] ?>

            </dd>
            <dt class="thankyou">Username</dt>
            <dd class="thankyou">
                <?= $_SESSION["username"] ?>
            </dd>
            <dt class="thankyou">Date of Birth</dt>
            <dd class="thankyou">
                <?= $_SESSION["bday"] ?>

            </dd>
            <dt class="thankyou">Gender</dt>
            <dd class="thankyou">
                <?= $_SESSION["gender"] ?>
            </dd>
            <dt class="thankyou">Marital Status</dt>
            <dd class="thankyou">

                <?= $_SESSION["maritalstatus"] ?>
            </dd>
        </fieldset>
        <fieldset>
            <legend><strong>Residence</strong></legend>
            <dt class="thankyou">Address</dt>
            <dd class="thankyou">
                <?= $_SESSION["address"] ?>
            </dd>
            <dt class="thankyou">City</dt>
            <dd class="thankyou">
                <?= $_SESSION["city"] ?>

            </dd>
            <dt class="thankyou">Postal Code</dt>
            <dd class="thankyou">
                <?= $_SESSION["postal"] ?>

            </dd>
        </fieldset>
        <fieldset>
            <legend><strong>Phone numbers</strong></legend>
            <dt class="thankyou">Home Phone</dt>
            <dd class="thankyou">
                <?= $_SESSION["homephone"] ?>

            </dd>
            <dt class="thankyou">Mobile Phone</dt>
            <dd class="thankyou">
                <?= $_SESSION["mobilephone"] ?>

            </dd>
        </fieldset>
        <fieldset>
            <legend><strong>Credit Card</strong></legend>
            <dt class="thankyou">Credit Card Number</dt>
            <dd class="thankyou">
                <?= $_SESSION["card"] ?>

            </dd>
            <dt class="thankyou">Credit Card Expiry Date</dt>
            <dd class="thankyou">
                <?= $_SESSION["expiry"] ?>

            </dd>
        </fieldset>
        <fieldset>
            <legend><strong>Additional</strong></legend>
            <dt class="thankyou">Monthly Salary</dt>
            <dd class="thankyou">
                <?= $_SESSION["salary"] ?>

            </dd>
            <dt class="thankyou">Web Site URL</dt>
            <dd class="thankyou">
               <?= $_SESSION["url"] ?>

            </dd>
            <dt class="thankyou">Overall GPA</dt>
            <dd class="thankyou">
                <?= $_SESSION["gpa"] ?>

            </dd>
        </fieldset>
    </dl>
    <div>
        <form action="index.php">
        <input type="submit" Value="Register Again">
        </form>
    </div>

</body>
</html>