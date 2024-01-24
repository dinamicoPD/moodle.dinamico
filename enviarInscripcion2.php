<?php
$old_path = getcwd();
chdir('/var/www/html/moodle/moodle/auth/db/cli/');
$output=shell_exec('php sync_users.php');
chdir($old_path); 
?>