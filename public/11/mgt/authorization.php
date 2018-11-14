<?php

require_once 'phpgen_settings.php';
require_once 'components/security/security_info.php';
require_once 'components/security/datasource_security_info.php';
require_once 'components/security/tablebased_auth.php';
require_once 'components/security/grant_manager/user_grant_manager.php';
require_once 'components/security/grant_manager/composite_grant_manager.php';
require_once 'components/security/grant_manager/hard_coded_user_grant_manager.php';
require_once 'components/security/grant_manager/table_based_user_grant_manager.php';

include_once 'components/security/user_identity_storage/user_identity_session_storage.php';

require_once 'database_engine/mysql_engine.php';

$grants = array();

$appGrants = array();

$dataSourceRecordPermissions = array();

$tableCaptions = array('device' => '礦機管理',
'user' => '用戶列表',
'user.device_owner01' => '用戶列表->擁有的礦機',
'mgroup' => '商會列表',
'mgroup.mgroup_member01' => '商會列表->商會會員',
'package' => '商業計劃管理',
'uorder' => '訂單管理',
'sys_config' => '系統配置管理');

function CreateTableBasedGrantManager()
{
    global $tableCaptions;
    $usersTable = array('TableName' => 'admin_users', 'UserName' => 'user_name', 'UserId' => 'user_id', 'Password' => 'user_password');
    $userPermsTable = array('TableName' => 'admin_user_perms', 'UserId' => 'user_id', 'PageName' => 'page_name', 'Grant' => 'perm_name');

    $passwordHasher = HashUtils::CreateHasher('SHA1');
    $connectionOptions = GetGlobalConnectionOptions();
    $tableBasedGrantManager = new TableBasedUserGrantManager(MyPDOConnectionFactory::getInstance(), $connectionOptions,
        $usersTable, $userPermsTable, $tableCaptions, $passwordHasher, false);
    return $tableBasedGrantManager;
}

function SetUpUserAuthorization()
{
    global $grants;
    global $appGrants;
    global $dataSourceRecordPermissions;
    $hardCodedGrantManager = new HardCodedUserGrantManager($grants, $appGrants);
    $tableBasedGrantManager = CreateTableBasedGrantManager();
    $grantManager = new CompositeGrantManager();
    $grantManager->AddGrantManager($hardCodedGrantManager);
    if (!is_null($tableBasedGrantManager)) {
        $grantManager->AddGrantManager($tableBasedGrantManager);
        GetApplication()->SetUserManager($tableBasedGrantManager);
    }
    $userAuthorizationStrategy = new TableBasedUserAuthorization(new UserIdentitySessionStorage(GetIdentityCheckStrategy()), MyPDOConnectionFactory::getInstance(), GetGlobalConnectionOptions(), 'admin_users', 'user_name', 'user_id', $grantManager);
    GetApplication()->SetUserAuthorizationStrategy($userAuthorizationStrategy);

    GetApplication()->SetDataSourceRecordPermissionRetrieveStrategy(
        new HardCodedDataSourceRecordPermissionRetrieveStrategy($dataSourceRecordPermissions));
}

function GetIdentityCheckStrategy()
{
    return new TableBasedIdentityCheckStrategy(MyPDOConnectionFactory::getInstance(), GetGlobalConnectionOptions(), 'admin_users', 'user_name', 'user_password', 'SHA1');
}

function CanUserChangeOwnPassword()
{
    return true;
}

?>