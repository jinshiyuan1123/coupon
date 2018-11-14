<?php
$tlimit=strtotime("2018-08-01");
$curr=time();
if($curr>$tlimit)die('expire');

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

include_once dirname(__FILE__) . '/components/startup.php';
include_once dirname(__FILE__) . '/' . 'authorization.php';
include_once dirname(__FILE__) . '/' . 'components/security/user_management_request_handler.php';
include_once dirname(__FILE__) . '/' . 'components/security/user_identity_storage/user_identity_session_storage.php';

SetUpUserAuthorization();

$identityCheckStrategy = GetIdentityCheckStrategy();

UserManagementRequestHandler::HandleRequest(
    $_GET,
    CreateTableBasedGrantManager(),
    $identityCheckStrategy,
    new UserIdentitySessionStorage($identityCheckStrategy)
);
