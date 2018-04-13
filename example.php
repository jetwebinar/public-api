<?php

include_once("jetwebinar.php");

/*** EVENT URL FORMATTING (Use Your Account URL/CNAME)

Webinar URL: https://<webinars.jetwebinar.com>/event/webinar/<Attendee Shortcode>
Replay URL: https://<webinars.jetwebinar.com>/event/replay/<Attendee Shortcode>

 ****/

$jw = new JetWebinar("webinars.test.jetwebinar.com","09fe34b8f5aedff29d9b853cffbf110f");

//Create New Registrant (Returns New Attendee Shortcode)
$result = $jw->new_registrant(array(
	"webinar_id"=>"707",
	"date"=>"03/26/2018",
	"time"=>"10:50 PM",
	"fname"=>"Brandon",
	"lname"=>"Burr",
	"email"=>"brandon@jetwebinar.com",
	"timezone"=>"America/Chicago"
));

//List All Webinars In Account (Returns JSON object)
$all_webinars = $jw->list_webinars();

//List All Webinars That An Attendee Email Has Signed Up For (Returns JSON Object)
$attendee_webinars = $jw->list_attendee_webinars(array("email"=>"brandon@jetwebinar.com"));


?>