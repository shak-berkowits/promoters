<?
$name  = $_REQUEST["name"];
$email = $_REQUEST["email"];
$phone = $_REQUEST["phone"];
var_dump($_REQUEST);exit;
$to    = "shak@berkowits.in"; // ENTER YOUR EMAIL ADDRESS
if (isset($email) && isset($name)) 
{
    $email_subject = "$name sent you a message via YOUR SITE NAME"; // ENTER YOUR EMAIL SUBJECT
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/plain; charset=UTF-8" . "\r\n";
	$headers = 'From: ' . $name ."\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
	$msg     = "
	From: $name,
	Email: $email";
	
    //$mail =  mail($to, $email_subject, $msg, $headers);

	if($mail)
		{
			echo 'success';
		}

	else
		{
			echo 'success';
			//echo 'failed';
		}
}

?>