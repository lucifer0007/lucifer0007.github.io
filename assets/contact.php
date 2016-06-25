<?php

// Email address verification
function isEmail($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if($_POST) {

    // Enter the email where you want to receive the message
    $emailTo = 'himworld001@gmail.com';

    $contact-email = addslashes(trim($_POST['contact-email']));
    $contact-subject = addslashes(trim($_POST['contact-subject']));
    $contact-message = addslashes(trim($_POST['contact-message']));
    $contact-no = addslashes(trim($_POST['contact-no']));

    $array = array('emailMessage' => '', 'subjectMessage' => '', 'messageMessage' => '');

    if(!isEmail($contact-email)) {
        $array['emailMessage'] = 'Invalid email!';
    }
     if(!isEmail($contact-no)) {
        $array['contactNo'] = 'Invalid Phone no!';
    }
    if($contact-subject == '') {
        $array['subjectMessage'] = 'Empty subject!';
    }
    if($contact-message == '') {
        $array['messageMessage'] = 'Empty message!';
    }
    if(isEmail($contact-email) && $contact-subject != '' && $contact-message != '') {
        // Send email
		$headers = "From: " . $contact-email . " <" ,. $contact-no . " <". $contact-email . ">" . "\r\n" . "Reply-To: " . $contact-email;
		mail($emailTo, $contact-subject . " (bootstrap contact form)", $contact-message, $headers);
    }

    echo json_encode($array);

}

?>
