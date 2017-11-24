<!DOCTYPE HTML>
<html>
<head>
    <title>Constant Contact API v2 Add/Update Contact Example</title>
    <link href="css/validation.css" rel="stylesheet">
	<link href="examples/styles.css" rel="stylesheet">
</head>

<!--
README: Add or update contact example
This example flow illustrates how a Constant Contact account owner can add or update a contact in their account. In order for this example to function 
properly, you must have a valid Constant Contact API Key as well as an access token. Both of these can be obtained from 
http://constantcontact.mashery.com.
-->

<?php
// require the autoloader
require_once 'src/Ctct/autoload.php';

use Ctct\ConstantContact;
use Ctct\Components\Contacts\Contact;
use Ctct\Components\Contacts\ContactList;
use Ctct\Components\Contacts\EmailAddress;
use Ctct\Exceptions\CtctException;

// Enter your Constant Contact APIKEY and ACCESS_TOKEN
define("APIKEY", "z4dfd2e7ayyry6vcn4kj49an");
define("ACCESS_TOKEN", "3cce053e-35b0-4463-baf9-0ce421164edd");

$cc = new ConstantContact(APIKEY);

// attempt to fetch lists in the account, catching any exceptions and printing the errors to screen
try {
    $lists = $cc->getLists(ACCESS_TOKEN);
} catch (CtctException $ex) {
    foreach ($ex->getErrors() as $error) {
        print_r($error);
    }
}

// check if the form was submitted
if (isset($_POST['email']) && strlen($_POST['email']) > 1) {
    $action = "Getting Contact By Email Address";
    try {
        // check to see if a contact with the email addess already exists in the account
        $response = $cc->getContactByEmail(ACCESS_TOKEN, $_POST['email']);

        // create a new contact if one does not exist
        if (empty($response->results)) {
            $action = "Creating Contact";

            $contact = new Contact();
            $contact->addEmail($_POST['email']);
            $contact->addList($_POST['list']);
            $contact->first_name = $_POST['first_name'];
            $contact->last_name = $_POST['last_name'];

            /*
             * The third parameter of addContact defaults to false, but if this were set to true it would tell Constant
             * Contact that this action is being performed by the contact themselves, and gives the ability to
             * opt contacts back in and trigger Welcome/Change-of-interest emails.
             *
             * See: http://developer.constantcontact.com/docs/contacts-api/contacts-index.html#opt_in
             */
            $returnContact = $cc->addContact(ACCESS_TOKEN, $contact, true);

            // update the existing contact if address already existed
        } else {
            $action = "Updating Contact";

            $contact = $response->results[0];
            $contact->addList($_POST['list']);
            $contact->first_name = $_POST['first_name'];
            $contact->last_name = $_POST['last_name'];

            /*
             * The third parameter of updateContact defaults to false, but if this were set to true it would tell
             * Constant Contact that this action is being performed by the contact themselves, and gives the ability to
             * opt contacts back in and trigger Welcome/Change-of-interest emails.
             *
             * See: http://developer.constantcontact.com/docs/contacts-api/contacts-index.html#opt_in
             */
            $returnContact = $cc->updateContact(ACCESS_TOKEN, $contact, true);
        }

        // catch any exceptions thrown during the process and print the errors to screen
    } catch (CtctException $ex) {
        /*echo '<span class="label label-important">Error ' . $action . '</span>';
        echo '<div class="container alert-error"><pre class="failure-pre">';
        print_r($ex->getErrors());
        echo '</pre></div>';
        die();*/
		echo "<script language='javascript'>window.location.href='http://www.onlinerecruitersdirectory.com/thank-you-job-seeker-recommendations.php';</script>";	
    }
	
	if (isset($returnContact)) {
	echo "<script language='javascript'>window.location.href='http://www.onlinerecruitersdirectory.com/thank-you-job-seeker-recommendations.php?opt=success';</script>";
	 /*echo "<script language='javascript'>history.go(-1)</script>";		
   echo '<div class="container alert-success"><pre class="success-pre">';
    print_r($returnContact);
    echo '</pre></div>';*/
	exit;
	}
}
?>

<body>
<div>
	<form class="form-horizontal" name="submitContact" id="submitContact" method="POST" action="constantcontact/addOrUpdateContactJSThankyou.php">
    	<?php if($_REQUEST['opt']=='success'){echo '<div style="color:#1D7F23;text-align:center;font-size:12px;"><strong></strong></div>';} else {?>
        	<div style="color:#3AA542;text-align:center;font-size:10px;"></div>
        <? }?>
        <div class="control-group" style="margin:3px -10px 0px 0px; float:right;">
            <div class="controls">
                <input type="email" id="email" name="email" placeholder="Email Address" style="width:392px; margin-right:7px; margin-bottom:6px;">
            </div>
        </div>
        <div class="control-group" style="margin:3px -10px 0px 0px; float:right;">
            <div class="controls">
                <input type="text" id="first_name" name="first_name" placeholder="Your Name"  style="width:392px; margin-right:7px;">
            </div>
        </div>
        <!--<div class="control-group">
            <label class="control-label" for="last_name">Last Name</label>

            <div class="controls">
                <input type="text" id="last_name" name="last_name" placeholder="Last Name">
            </div>
        </div>-->
        <!--<div class="control-group">
            <label class="control-label" for="list">List</label>

            <div class="controls">
                <select name="list">
                    <?php /*?><?php
                    foreach ($lists as $list) {
                        echo '<option value="' . $list->id . '">' . $list->name . '</option>';
                    }
                    ?><?php */?>
                </select>
            </div>
        </div>-->
        <input type="hidden" id="last_name" name="last_name" placeholder="Last Name" value="">
        <input type="hidden" id="list" name="list" placeholder="" value="7">        
        <div class="join_now">                    
        	<input type="submit" value="" class="subscribe_btn_tips" style="background:url('images/subscribe_btn.png') no-repeat scroll center top rgba(0, 0, 0, 0); width:101% !important;" onClick="javascript:overlay();"/>
        </div>
    </form>
</div>

<!-- Success Message -->
<?php /*if (isset($returnContact)) {
	echo "<script language='javascript'>history.go(-1)</script>";		
    echo '<div class="container alert-success"><pre class="success-pre">';
    print_r($returnContact);
    echo '</pre></div>';
}*/ ?>

</body>
</html>