<?php
session_start();
$name1 = isset($_SESSION["name"])?$_SESSION["name"]:"";
$namePattern = "/^[A-Z]{1}[a-z]+(\s[A-Z]{1}[a-z]+)?$/";
$isPost = $_SERVER["REQUEST_METHOD"]=="POST";
$isValid = TRUE;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>My First Validation Form</title>
    <style>

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<h2>Address Form</h2>

<form action="check.php" method="post">
    <input type="text" name="name" placeholder="John Doe" value="<?php $name1 ?>" size="30" required>
    <?php
    if($isPost && !preg_match($namePattern, $name1)){
        $isValid =FALSE;?>
        <span class="error">Please, follow the name pattern</span>
    <?php }?>
    <table>

        <tr>
            <td></td>
            <td>
                <input type="submit" value="Submit" />
            </td>
        </tr>
    </table>
</form>
<?php
if($isPost && $isValid) {
    header("Location: thankyou.php", TRUE, 301);
}
?>


</body>
</html>

<!--            <fieldset>-->
<!--                <legend><strong>Credit Card</strong></legend>-->
<!--            <dt>Credit Card Number</dt>-->
<!--            <dd>-->
<!---->
<!--                <input name="card" placeholder="1234 1234 1234 1234" required size="30" type="text" value="--><?//= $card ?><!--" >-->
<!--                --><?php///*
//                if($isPost && !preg_match($cardPattern, $card)){
//                    $isValid = FALSE;*/ ?>
<!--                    <span class="error">Please, provide a 16-digit number with spaces every 4 digits"</span>-->
<!--                --><?php//// }?>
<!--            </dd>-->
<!---->
<!--            <dt>Credit Card Expiry Date</dt>-->
<!--            <dd>-->
<!--                <input name="cardexp" placeholder="01.01.2021" required size="30" type="text" value="--><?//= $cardexp ?><!--">-->
<!--                --><?php
//                if($isPost && !preg_match($cardexpPattern, $cardexp)){
//                    $isValid = FALSE;?>
<!--                    <span class="error">Please, provide date in the range of 2020-2039 yy.</span>-->
<!--                --><?php //}?>
<!--            </dd>-->
<!---->
<!--            </fieldset>-->
<!--            <fieldset>-->
<!--                <legend><strong>Additional</strong></legend>-->
<!--            <dt>Monthly Salary</dt>-->
<!--            <dd>-->
<!--                <input name="salary" placeholder="UZS 2,000,000.00" required size="30" type="text" value="--><?//= $salary ?><!--">-->
<!--                --><?php
//                if($isPost && !preg_match($salaryPattern, $salary)){
//                    $isValid = FALSE; ?>
<!--                    <span class="error">Please, follow the pattern</span>-->
<!--                --><?php //}?>
<!--            </dd>-->
<!--            <dt>Web Site URL</dt>-->
<!--            <dd>-->
<!--                <input name="url" placeholder="http://github.com" required size="30" type="text" value="--><?//= $url ?><!--">-->
<!--                                --><?php
//                //                if($isPost && !preg_match($urlPattern, $url)){
//                //                    $isValid =FALSE; ?>
<!--                                    <span class="error">Please, provide valid URL</span>-->
<!--                                --><?php ////}?>
<!--            </dd>-->
<!--            <dt>Overall GPA</dt>-->
<!--            <dd>-->
<!--                <input name="gpa" placeholder="Your GPA 0.0~4.5" required size="30" type="text" value="--><?//= $gpa ?><!--">-->
<!--                --><?php
//                if($isPost && !preg_match($gpaPattern, $gpa)){
//                    $isValid = FALSE; ?>
<!--                    <span class="error">Please, provide your floating point GPA 0.0~4.5</span>-->
<!--                --><?php //}?>
<!--            </dd>-->
<!--            </fieldset>-->

<!--            <fieldset>-->
<!--                <legend><strong>Credit Card</strong></legend>-->
<!--            <dt>Credit Card Number</dt>-->
<!--            <dd>-->
<!---->
<!--                <input name="card" placeholder="1234 1234 1234 1234" required size="30" type="text" value="--><?//= $card ?><!--" >-->
<!--                --><?php///*
//                if($isPost && !preg_match($cardPattern, $card)){
//                    $isValid = FALSE;*/ ?>
<!--                    <span class="error">Please, provide a 16-digit number with spaces every 4 digits"</span>-->
<!--                --><?php//// }?>
<!--            </dd>-->
<!---->
<!--            <dt>Credit Card Expiry Date</dt>-->
<!--            <dd>-->
<!--                <input name="cardexp" placeholder="01.01.2021" required size="30" type="text" value="--><?//= $cardexp ?><!--">-->
<!--                --><?php
//                if($isPost && !preg_match($cardexpPattern, $cardexp)){
//                    $isValid = FALSE;?>
<!--                    <span class="error">Please, provide date in the range of 2020-2039 yy.</span>-->
<!--                --><?php //}?>
<!--            </dd>-->
<!---->
<!--            </fieldset>-->
<!--            <fieldset>-->
<!--                <legend><strong>Additional</strong></legend>-->
<!--            <dt>Monthly Salary</dt>-->
<!--            <dd>-->
<!--                <input name="salary" placeholder="UZS 2,000,000.00" required size="30" type="text" value="--><?//= $salary ?><!--">-->
<!--                --><?php
//                if($isPost && !preg_match($salaryPattern, $salary)){
//                    $isValid = FALSE; ?>
<!--                    <span class="error">Please, follow the pattern</span>-->
<!--                --><?php //}?>
<!--            </dd>-->
<!--            <dt>Web Site URL</dt>-->
<!--            <dd>-->
<!--                <input name="url" placeholder="http://github.com" required size="30" type="text" value="--><?//= $url ?><!--">-->
<!--                                --><?php
//                //                if($isPost && !preg_match($urlPattern, $url)){
//                //                    $isValid =FALSE; ?>
<!--                                    <span class="error">Please, provide valid URL</span>-->
<!--                                --><?php ////}?>
<!--            </dd>-->
<!--            <dt>Overall GPA</dt>-->
<!--            <dd>-->
<!--                <input name="gpa" placeholder="Your GPA 0.0~4.5" required size="30" type="text" value="--><?//= $gpa ?><!--">-->
<!--                --><?php
//                if($isPost && !preg_match($gpaPattern, $gpa)){
//                    $isValid = FALSE; ?>
<!--                    <span class="error">Please, provide your floating point GPA 0.0~4.5</span>-->
<!--                --><?php //}?>
<!--            </dd>-->
<!--            </fieldset>-->