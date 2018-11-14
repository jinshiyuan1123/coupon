<?php

//  define('SHOW_VARIABLES', 1);
//  define('DEBUG_LEVEL', 1);

//  error_reporting(E_ALL ^ E_NOTICE);
//  ini_set('display_errors', 'On');

set_include_path('.' . PATH_SEPARATOR . get_include_path());


include_once dirname(__FILE__) . '/' . 'components/utils/system_utils.php';

//  SystemUtils::DisableMagicQuotesRuntime();

SystemUtils::SetTimeZoneIfNeed('Asia/Brunei');

function GetGlobalConnectionOptions()
{
    return array(
  'server' => 'localhost',
  'port' => '3306',
  'username' => 'root',
  'password' => 'ulink@2018!@#',
  'database' => 'blockchain',
  'client_encoding' => 'utf8'
);
}

function HasAdminPage()
{
    return true;
}

function HasHomePage()
{
    return true;
}

function GetHomeURL()
{
    return 'index.php';
}

function GetShowNavigation()
{
    return true;
}

function GetPageGroups()
{
    $result = array('Default');
    return $result;
}

function GetPageInfos()
{
    $result = array();
    $result[] = array('caption' => '礦機管理', 'short_caption' => '礦機管理', 'filename' => 'device.php', 'name' => 'device', 'group_name' => 'Default', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => '用戶列表', 'short_caption' => '用戶列表', 'filename' => 'user.php', 'name' => 'user', 'group_name' => 'Default', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => '商會列表', 'short_caption' => '商會列表', 'filename' => 'mgroup.php', 'name' => 'mgroup', 'group_name' => 'Default', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => '商業計劃管理', 'short_caption' => '商業計劃管理', 'filename' => 'package.php', 'name' => 'package', 'group_name' => 'Default', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => '訂單管理', 'short_caption' => '訂單管理', 'filename' => 'uorder.php', 'name' => 'uorder', 'group_name' => 'Default', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => '系統配置管理', 'short_caption' => '系統配置管理', 'filename' => 'sys_config.php', 'name' => 'sys_config', 'group_name' => 'Default', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => '系統礦池分配明細', 'short_caption' => '系統礦池分配明細', 'filename' => 'history_coin.php', 'name' => 'history_coin', 'group_name' => 'Default', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => '用戶挖礦明細', 'short_caption' => '用戶挖礦明細', 'filename' => 'history_user_coin.php', 'name' => 'history_user_coin', 'group_name' => 'Default', 'add_separator' => false, 'description' => '');
    return $result;
}

function GetPagesHeader()
{
    return
        '';
}

function GetPagesFooter()
{
    return
        ''; 
}

function ApplyCommonPageSettings(Page $page, Grid $grid)
{
    $page->SetShowUserAuthBar(true);
    $page->OnCustomHTMLHeader->AddListener('Global_CustomHTMLHeaderHandler');
    $page->OnGetCustomTemplate->AddListener('Global_GetCustomTemplateHandler');
    $page->OnGetCustomExportOptions->AddListener('Global_OnGetCustomExportOptions');
    $page->getDataset()->OnGetFieldValue->AddListener('Global_OnGetFieldValue');
    $page->getDataset()->OnGetFieldValue->AddListener('OnGetFieldValue', $page);
    $grid->BeforeUpdateRecord->AddListener('Global_BeforeUpdateHandler');
    $grid->BeforeDeleteRecord->AddListener('Global_BeforeDeleteHandler');
    $grid->BeforeInsertRecord->AddListener('Global_BeforeInsertHandler');
    $grid->AfterUpdateRecord->AddListener('Global_AfterUpdateHandler');
    $grid->AfterDeleteRecord->AddListener('Global_AfterDeleteHandler');
    $grid->AfterInsertRecord->AddListener('Global_AfterInsertHandler');
}

/*
  Default code page: 936
*/
function GetAnsiEncoding() { return 'UTF-8'; }

function Global_CustomHTMLHeaderHandler($page, &$customHtmlHeaderText)
{

}

function Global_GetCustomTemplateHandler($type, $part, $mode, &$result, &$params, CommonPage $page = null)
{

}

function Global_OnGetCustomExportOptions($page, $exportType, $rowData, &$options)
{

}

function Global_OnGetFieldValue($fieldName, &$value, $tableName)
{

}

function Global_GetCustomPageList(CommonPage $page, PageList $pageList)
{

}

function Global_BeforeUpdateHandler($page, &$rowData, &$cancel, &$message, &$messageDisplayTime, $tableName)
{

}

function Global_BeforeDeleteHandler($page, &$rowData, &$cancel, &$message, &$messageDisplayTime, $tableName)
{

}

function Global_BeforeInsertHandler($page, &$rowData, &$cancel, &$message, &$messageDisplayTime, $tableName)
{

}

function Global_AfterUpdateHandler($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{

}

function Global_AfterDeleteHandler($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{

}

function Global_AfterInsertHandler($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{

}

function GetDefaultDateFormat()
{
    return 'Y-m-d';
}

function GetFirstDayOfWeek()
{
    return 0;
}

function GetPageListType()
{
    return PageList::TYPE_MENU;
}

function GetNullLabel()
{
    return null;
}

function UseMinifiedJS()
{
    return true;
}



?>