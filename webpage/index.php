<?php
$namePattern = "/^[A-Z]{1}[a-z]+(\s[A-Z]{1}[a-z]+)?$/";
$emailPattern = "/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}/";
$usernamePattern = "/[0-9\w\.,!\?]{5,}/";
$passwordPattern = "/[0-9\w\.,!\?]{8,}/";
$bdayPattern = "/[0-3]{1}[0-9]{1}\.((0{1}[0-9]{1})|(1{1}[0-2]{1}))\.((19[3-9][0-9])|(20[01][0-9]))/";
$cityPattern= "/^[A-Z][a-z]+([ -][A-Z][a-z]+)*$/";
$postcodePattern = "/^[0-9]{6}$/";
$phonePattern = "/^[0-9]{2}\s[0-9]{7}$/";
$cardPattern = "/^([0-9]{4}\s){3}[0-9]{4}$/";
$expiryPattern = "/[0-3]{1}[0-9]{1}\.((0{1}[0-9]{1})|(1{1}[0-2]{1}))\.((20[1-3][0-9]))/";
$salaryPattern = "/[A-Z]{3}\s([1-9])([0-9]+)?(,[0-9]{3})+(\.[0-9]{2})/";
$urlPattern = "/(https?:\/\/)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.\~\#\?\&\/\/\=]*)/";
$gpaPattern = "/^(([0-3]\.[0-9][0-9]?)|(4\.[0-4][0-9]?)|(4\.5))$/";

session_start();

$name = isset($_SESSION["name"])?$_SESSION["name"]:"";
$email = isset($_SESSION["email"])?$_SESSION["email"]:"";
$username = isset($_SESSION["username"])?$_SESSION["username"]:"";
$password = isset($_SESSION["password"])?$_SESSION["password"]:"";
$conpassword = isset($_SESSION["conpassword"])?$_SESSION["conpassword"]:"";
$bday = isset($_SESSION["bday"])?$_SESSION["bday"]:"";
$gender = isset($_SESSION["gender"])?$_SESSION["gender"]:"";
$maritalstatus = isset($_SESSION["maritalstatus"])?$_SESSION["maritalstatus"]:"";
$address = isset($_SESSION["address"])?$_SESSION["address"]:"";
$city = isset($_SESSION["city"])?$_SESSION["city"]:"";
$postcode = isset($_SESSION["postal"])?$_SESSION["postal"]:"";
$homephone = isset($_SESSION["homephone"])?$_SESSION["homephone"]:"";
$mobilephone = isset($_SESSION["mobilephone"])?$_SESSION["mobilephone"]:"";
$card = isset($_SESSION["card"])?$_SESSION["card"]:"";
$expiry = isset($_SESSION["expiry"])?$_SESSION["expiry"]:"";
$salary = isset($_SESSION["salary"])?$_SESSION["salary"]:"";
$url = isset($_SESSION["url"])?$_SESSION["url"]:"";
$gpa = isset($_SESSION["gpa"])?$_SESSION["gpa"]:"";

$isPost = $_SERVER["REQUEST_METHOD"]=="POST";
$isValid = TRUE;

if($isPost){
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $conpassword = $_REQUEST["conpassword"];
    $bday = $_REQUEST["bday"];
    $gender = $_REQUEST["gender"];
    $maritalstatus = $_REQUEST["maritalstatus"];
    $address = $_REQUEST["address"];
    $city = $_REQUEST["city"];
    $postcode = $_REQUEST["postal"];
    $homephone = $_REQUEST["homephone"];
    $mobilephone = $_REQUEST["mobilephone"];
    $card = $_REQUEST["card"];
    $expiry = $_REQUEST["expiry"];
    $salary = $_REQUEST["salary"];
    $url = $_REQUEST["url"];
    $gpa = $_REQUEST["gpa"];

    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password ;
    $_SESSION["conpassword"] =  $conpassword;
    $_SESSION["bday"] = $bday;
    $_SESSION["gender"] = $gender;
    $_SESSION["maritalstatus"] = $maritalstatus;
    $_SESSION["address"] = $address;
    $_SESSION["city"] = $city;
    $_SESSION["postal"] = $postcode;
    $_SESSION["homephone"] = $homephone;
    $_SESSION["mobilephone"] = $mobilephone;
    $_SESSION["card"] = $card;
    $_SESSION["expiry"]= $expiry;
    $_SESSION["salary"]= $salary;
    $_SESSION["url"] = $url;
    $_SESSION["gpa"] = $gpa;

}
ob_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns:abc="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Validating Form</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<h1>Registration Form</h1>
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
        <form action="index.php" method="post">

		<dl>
            <fieldset>
                <legend><strong>Personal</strong></legend>
            <dt>Name</dt>
            <dd>
                <input name="name" placeholder="John Doe" required size="30" type="text" value="<?= $name ?>">
                <?php
                if($isPost && !preg_match($namePattern, $name)){
                    $isValid = FALSE;?>
                    <span class="error">Please, follow the name pattern</span>
                <?php }?>
            </dd>

            <dt>Email</dt>
            <dd>
                <input name="email" placeholder="john5@example.com" required size="30" type="text" value="<?= $email ?>">
                <?php
                if($isPost && !preg_match($emailPattern, $email)){
                    $isValid = FALSE;?>
                    <span class="error">Please, follow the email pattern</span>
                <?php }?>
            </dd>

            <dt>Username</dt>
            <dd>
                <input name="username" placeholder="More than 5 characters" required size="30" type="text" value="<?= $username ?>">
                <?php
                if($isPost && !preg_match($usernamePattern, $username)){
                    $isValid = FALSE;?>
                    <span class="error">Please, provide a valid username</span>
                <?php }?>
            </dd>

            <dt>Password</dt>
            <dd>
                <input name="password" placeholder="More than 8 characters" required size="30" type="password" value="<?= $password ?>">
                <?php
                if($isPost && !preg_match($passwordPattern, $password)){
                    $isValid = FALSE;?>
                    <span class="error">Please, provide a valid password</span>
                <?php }
                if($isPost && $password == ""){
                    $isValid = FALSE;?>
                    <span class="error">Please, provide a password</span>
                <?php }?>
            </dd>

            <dt>Password Confirmation</dt>
            <dd>
                <input name="conpassword" placeholder="Type your password again" required size="30" type="password" value="<?= $conpassword ?>">
                <?php
                if($isPost && $password != $conpassword){
                    $isValid = FALSE;?>
                    <span class="error">Your passwords are not the same</span>
                <?php }
                if($isPost && $conpassword == ""){
                    $isValid = FALSE;?>
                    <span class="error">Please, provide a password</span>
                <?php }
                if($isPost && !preg_match($passwordPattern, $conpassword)){
                    $isValid = FALSE; ?>
                    <span class="error">Please, provide a valid password</span>
                <?php }?>
            </dd>
            <dt>Date of Birth</dt>
            <dd>
                <input name="bday" placeholder="01.01.1975" required size="30" type="text" value="<?= $bday ?>">
                <?php
                if($isPost && !preg_match($bdayPattern, $bday)){
                $isValid = FALSE; ?>
                <span class="error">Please, follow the pattern dd.mm.yyyy</span>
                <?php }?>
            </dd>

            <dt>Gender</dt>
            <dd>
                <input type="radio" name="gender" value="Male"  checked >
                <label for="male">Male</label>
                <input type="radio" name="gender" value="Female" >
                <label for="female">Female</label>
            </dd>

            <dt>Marital Status</dt>
            <dd>
                <select name="maritalstatus" >
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                </select>
            </dd>
            </fieldset>

            <fieldset>
                <legend><strong>Residence</strong></legend>
            <dt>Address</dt>
            <dd>
                <input name="address" placeholder="Neverland Rd, 58" required size="30" type="text" value="<?= $address ?>">
            </dd>

            <dt>City</dt>
            <dd>
                <input name="city" placeholder="New York" required size="30" type="text" value="<?= $city ?>">
                <?php
                if($isPost && !preg_match($cityPattern, $city)){
                    $isValid = FALSE; ?>
                    <span class="error">Please, provide a valid city name</span>
                <?php }?>
            </dd>

            <dt>Postal Code</dt>
            <dd>
                <input name="postal" placeholder="123456" required size="30" type="text" value="<?= $postcode ?>"></dd>
                <?php
                if($isPost && !preg_match($postcodePattern, $postcode)){
                    $isValid = FALSE; ?>
                    <span class="error">Please, provide a 6-digit Post Code</span>
                <?php }?>

            </fieldset>

            <fieldset>
                <legend><strong>Phone numbers</strong></legend>
            <dt>Home Phone</dt>
            <dd><input name="homephone" placeholder="71 1234567" required size="30" type="text" value="<?= $homephone ?>">
                <?php
                if($isPost && !preg_match($phonePattern, $homephone)){
                    $isValid = FALSE; ?>
                    <span class="error">Please, follow the pattern "71 1234567"</span>
                <?php }?>
            </dd>
            <dt>Mobile Phone</dt>
            <dd><input name="mobilephone" placeholder="90 1234567" required size="30" type="text" value="<?= $mobilephone ?>">
                <?php if($isPost && !preg_match($phonePattern, $mobilephone)){
                    $isValid = FALSE;
                ?>
                    <span class="error">Please, follow the pattern "90 1234567"</span>
                <?php }?>
            </dd>
            </fieldset>
            <fieldset>
                <legend><strong>Credit Card</strong></legend>
            <dt>Credit Card Number</dt>
            <dd><input type="text" name="card" value="<?=$card?>" placeholder="1234 1234 1234 1234" size="30" required>
                <?php
                if($isPost && !preg_match($cardPattern, $card)){
                $isValid = FALSE; ?>
                <span class="error">Please, provide a 16-digit number with spaces every 4 digits"</span>
                <?php }?>
            </dd>
            <dt>Credit Card Expiry Date</dt>
            <dd><input type="text" name="expiry" value="<?=$expiry?>" placeholder="01.01.2021" size="30" required></dd>
                <?php
                if($isPost && !preg_match($expiryPattern, $expiry)){
                    $isValid = FALSE;?>
                    <span class="error">Please, provide date in the range of 2020-2039 yy.</span>
                <?php }?>
            </fieldset>
            <fieldset>
                <legend><strong>Additional</strong></legend>
            <dt>Monthly Salary</dt>
            <dd><input name="salary" placeholder="UZS 2,000,000.00" required size="30" type="text" value="<?= $salary ?>">
                <?php
                if($isPost && !preg_match($salaryPattern, $salary)){
                    $isValid = FALSE; ?>
                    <span class="error">Please, follow the pattern</span>
                <?php }?>
            </dd>
            <dt>Web Site URL</dt>
            <dd><input name="url" placeholder="http://github.com" required size="30" type="text" value="<?= $url ?>">
                <?php
                 if($isPost && !preg_match($urlPattern, $url)){
                     $isValid =FALSE; ?>
                     <span class="error">Please, provide valid URL</span>
                 <?php }?>
            </dd>
            <dt>Overall GPA</dt>
            <dd><input name="gpa" placeholder="Your GPA 0.0~4.5" required size="30" type="text" value="<?= $gpa ?>">
                <?php
                if($isPost && !preg_match($gpaPattern, $gpa)){
                    $isValid = FALSE; ?>
                    <span class="error">Please, provide your floating point GPA 0.0~4.5</span>
                <?php }?>
            </dd>
            </fieldset>
		</dl>
            <input type="submit" Value="Register">
        </form>
        <?php if($isPost && $isValid){
            header("Location: thankyou.php", TRUE, 301);}?>
	</body>
</html>