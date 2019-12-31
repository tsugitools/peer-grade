<?php
require_once "../config.php";
use \Tsugi\Blob\BlobUtil;

require_once "peer_util.php";

use \Tsugi\UI\Table;
use \Tsugi\Core\LTIX;

// Sanity checks
$LAUNCH = LTIX::requireData();
$p = $CFG->dbprefix;

// Load the assignment data
$row = loadAssignment();
$assn_json = json_decode(upgradeSubmission($row['json']));
if ( $assn_json == null ) die('Not yet configured');

// View
$OUTPUT->header();
?>
<style>
.hidden
{position:absolute;
left:-10000px;
top:auto;
width:1px;
height:1px;
overflow:hidden;}
</style>
<?php
$OUTPUT->bodyStart();
$OUTPUT->flashMessages();
$OUTPUT->welcomeUserCourse();
?>

<h1>Welcome to Acessibility Options For Peer Grading</h1>
<ul>
<li><a href="index.php">Go back to the main page</a></li>
</ul>
<div class="might-be-hidden">
<p>
If you cannot take the required screen shots for this assignment, download 
the following image and upload it anywhere the assignment is asking for an image
upload.  Then add text comments that show that you fulfilled the assignment.
</p>
<p>
<a href="access.png">
<img src="access.png"
alt="I use a screen reader and cannot produce the images required by this assignment.  Please grade my text comments below.  Thank you."/>
</a>
</p>
<p>
If you cannot grade images from other students because you use a screen reader or other assistive device,
check the box below and we will
<form method="post">
<input type="checkbox" name="screen_reader" value="yes">I use a screen reader and cannot grade my peer's images<br>
<input type="submit" value="Submit">
<input type=submit name=doCancel onclick="location='<?php echo(addSession('index.php'));?>'; return false;" value="Go back"></p>
</form>
</div>
<?php


$OUTPUT->footer();
