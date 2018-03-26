<?php
include_once("jetwebinar.php");

$jw = new JetWebinar("webinars.test.jetwebinar.com","09fe34b8f5aedff29d9b853cffbf110f")


$result = $jw->new_registrant(array(
	"webinar_id"=>"707",
	"date"=>"03/26/2018",
	"time"=>"10:50 PM",
	"fname"=>"Brandon",
	"lname"=>"Burr",
	"email"=>"brandon@jetwebinar.com",
	"timezone"=>"America/Chicago"
));

print $result;

?>