<?php
require_once "../config.php";

use \Tsugi\Core\LTIX;
use \Tsugi\UI\Analytics;

// Sanity checks
$LAUNCH = LTIX::requireData();

if ( ! $USER->instructor ) die('Must be instructor');

// View
$OUTPUT->header();
$OUTPUT->bodyStart();
$OUTPUT->topNav();
?>
<p>
<input type=submit name=doCancel onclick="location='<?php echo(addSession('index.php'));?>'; return false;" value="Back"></p>
<?php
echo(Analytics::graphBody());
$analytics_url = $CFG->wwwroot."/api/analytics";

$OUTPUT->footerStart();
echo(Analytics::graphScript(addSession($analytics_url)));
$OUTPUT->footerEnd();
