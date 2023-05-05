<?php
include('LicenceManagerController.php');

$user = new User();

if(!empty($_POST['action']) && $_POST['action'] == 'listUser') {
	$user->userList();
}

if(!empty($_POST['action']) && $_POST['action'] == 'addLicence') {
	$user->addLicence();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addLicences') {
	$user->addLicences();
}

if(!empty($_POST['action']) && $_POST['action'] == 'getLicence') {
	$user->getLicence();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateLicence') {
	$user->updateLicence();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteLicence') {
	$user->deleteAndInactivateLicence();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getNewCode') {
	$user->getNewLicenceCode();
}
if(!empty($_POST['action']) && $_POST['action'] == 'listStudentGroup'){
	$user->getListStudetGroups();
}
if(!empty($_POST['action']) && $_POST['action'] == 'listTeacherGroup'){
	$user->getListTeachersGroup();
}
if(!empty($_POST['action']) && $_POST['action'] == 'exportFile'){
	$user->getExcelFile();
}
if(!empty($_POST['action']) && $_POST['action'] == 'forcePasswordChange'){
	$user->forcePasswordChange();
}

?>