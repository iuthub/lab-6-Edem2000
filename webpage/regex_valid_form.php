<?php

	$pattern="";
	$pattern2="";
	$pattern_email="/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}/";
	$pattern_phone="/\(\+998[0-9]{2}\)[0-9]{7}/";
	$text="";
	$replaceText="";
	$replacedText="";
    $contains="";
    $contains2="";
	$match=" ";
	$contain=" ";
	$contain_email=" ";
    $contain_phone=" ";
    $nowhite="";
    $nonnum="";
    $nonew="";
    $extracted="";
    $extractedf="";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern= $_POST["pattern"] ;
    $pattern2 .= "/" . $pattern . "/";
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];
    $contains=$_POST["contains"];
    $contains2 .= "/" . $contains . "/";
	$replacedText=preg_replace($pattern2, $replaceText, $text);
    $nowhite=preg_replace("/\s/", "", $text);
    $nonnum=preg_replace("/[^0-9.,]/", "", $text);
    $nonew=preg_replace("/^./", "", $text);
    preg_match("/[({\[][A-Za-z0-9.,?!]+[\])}]/",$text,$extracted);
    $extractedf = substr($extracted[0], 1, strlen($extracted[0])-2);
	if(preg_match( $pattern2 , $text)) {
						$match="Matches.";
					}
	if (!preg_match( $pattern2 , $text)) {
						$match="Does not match.";
					}
    if($pattern2="//") {
        $match=" ";
    }
	if (preg_match( $contains2 , $text)){
                        $contain="Contains '" . $contains . "'.";
                    }
    if (!preg_match( $contains2 , $text)){
                         $contain="Does not contain '" . $contains . "'.";
                    }
    elseif ($contains2=="//"){
                         $contain=" " ;
                    }
    }
    if (preg_match( $pattern_email , $text)){
                     $contain_email="Contains an email. " ;
                    }
    if (preg_match( $pattern_phone , $text)){
                     $contain_phone="Contains a phone number. " ;
                    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>

	<form action="regex_valid_form.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

			<dt>Text</dt>
			<dd><input type="text" name="text" value="<?= $text ?>"></dd>

			<dt>Replace Text</dt>
			<dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

            <dt>Check if Text contains...</dt>
            <dd><input type="text" name="contains" value="<?= $contains ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?> <br><?=$contain ?><br><?= $contain_email?><br> <?=$contain_phone?><br>No-whitespace version: <?=$nowhite?><br>Only numeric: <?=$nonnum?><br>No linebreaks: <?=$nonew?><<br>Extracted from parenthesis: '<?=$extractedf?>'</dd>

			<dt>Replaced Text</dt>
			<dd> <code><?=	$replacedText ?></code></dd>

			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>

		</dl>

	</form>
</body>
</html>
