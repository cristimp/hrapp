<?php

//If the HTTPS is not found to be "on"
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
{
    //Tell the browser to redirect to the HTTPS URL.
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    exit;
}

//Session start
session_start();

// Include Config
require('config.php');

require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
require('classes/Messages.php');
require_once('classes/fpdf.php');


require('controllers/users.php');
require('controllers/home.php');
require('controllers/members.php');
require('controllers/forms.php');
require('controllers/recruitment.php');
require('controllers/onboarding.php');
require('controllers/activities.php');
require('controllers/news.php');
require('controllers/settings.php');
require('controllers/myrequests.php');


require('models/home.php');
require('models/member.php');
require('models/form.php');
require('models/recruitment.php');
require('models/onboarding.php');
require('models/activities.php');
require('models/user.php');
require('models/news.php');
require('models/settings.php');
require('models/myrequests.php');


$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

if($controller){
	$controller->executeAction();
}
?>