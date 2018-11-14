<?php

include_once dirname(__FILE__) . '/' . 'datasource_security_info.php';
include_once dirname(__FILE__) . '/' . 'security_info.php';
include_once dirname(__FILE__) . '/' . 'grant_manager/user_grant_manager.php';
//
include_once dirname(__FILE__) . '/' . '../../database_engine/engine.php';
include_once dirname(__FILE__) . '/' . '../common_utils.php';
include_once dirname(__FILE__) . '/' . '../dataset/dataset.php';
include_once dirname(__FILE__) . '/' . '../dataset/table_dataset.php';
include_once dirname(__FILE__) . '/' .  '../../libs/phpass/PasswordHash.php';

class TableBasedUserAuthorization extends AbstractUserAuthorization {
    private $usersTable;
    private $userNameFieldName;
    private $userIdFieldName;
    /**
     * @var TableDataset
     */
    private $dataset;

    /** @var \UserGrantManager */
    private $grantsManager;

    private $cachedCurrentUserId;

    public function __construct(
        UserIdentityStorage $identityStorage,
        ConnectionFactory $connectionFactory,
        $connectionOptions,
        $usersTable,
        $userNameFieldName,
        $userIdFieldName,
        UserGrantManager $grantsManager)
    {
        parent::__construct($identityStorage);
        $this->usersTable = $usersTable;
        $this->userIdFieldName = $userIdFieldName;
        $this->userNameFieldName = $userNameFieldName;
        $this->grantsManager = $grantsManager;

        $this->dataset = new TableDataset(
            $connectionFactory,
            $connectionOptions,
            $usersTable);
        $field = new StringField($userNameFieldName);
        $this->dataset->AddField($field, true);
        $field = new StringField($userIdFieldName);
        $this->dataset->AddField($field, false);
    }

    public function GetCurrentUserId() {
        if (!$this->IsCurrentUserLoggedIn()) {
            return null;
        }

        if (is_null($this->cachedCurrentUserId)) {
            $this->dataset->AddFieldFilter(
                $this->userNameFieldName,
                new FieldFilter($this->GetCurrentUser(), '=', true));
            $this->dataset->Open();
            if ($this->dataset->Next())
                $this->cachedCurrentUserId = $this->dataset->GetFieldValueByName($this->userIdFieldName);
            $this->dataset->Close();
            $this->dataset->ClearFieldFilters();
        }

        return $this->cachedCurrentUserId;
    }

    public function IsCurrentUserLoggedIn() {
        return $this->GetCurrentUser() != 'guest';
    }

    public function GetUserRoles($userName, $dataSourceName) {
        return $this->grantsManager->GetSecurityInfo($userName, $dataSourceName);
    }

    public function HasAdminGrant($userName) {
        return $this->grantsManager->HasAdminGrant($userName);
    }

    public function HasAdminPanel($userName) {
        return $this->grantsManager->HasAdminPanel($userName);
    }

}

class TableBasedIdentityCheckStrategy extends IdentityCheckStrategy {
    /**
     * @var string
     */
    private $userNameFieldName;
    /**
     * @var string
     */
    private $passwordFieldName;
    /**
     * @var StringHasher
     */
    private $passwordHasher;
    /**
     * @var TableDataset
     */
    private $dataset;

    /**
     * @param string $actualPassword
     * @param string $expectedPassword
     * @return bool
     */
    private function CheckPasswordEquals($actualPassword, $expectedPassword) {
        return $this->passwordHasher->CompareHash($expectedPassword, $actualPassword);
    }

    private function CheckHashedPasswordEquals($actualPassword, $expectedPassword) {
        return $this->passwordHasher->CompareTwoHashes($expectedPassword, $actualPassword);
    }

    public function __construct(ConnectionFactory $connectionFactory, $connectionOptions, $tableName, $userNameFieldName,
                                $passwordFieldName, $passwordEncryption = '', $userIdFieldName = null) {
        $this->userNameFieldName = $userNameFieldName;
        $this->passwordFieldName = $passwordFieldName;
        $this->passwordHasher = HashUtils::CreateHasher($passwordEncryption);
        $this->CreateDataset($connectionFactory, $connectionOptions, $tableName, $userNameFieldName, $passwordFieldName);
    }

    public function CheckUsernameAndPassword($username, $password) {
        $this->dataset->AddFieldFilter(
            $this->userNameFieldName,
            new FieldFilter($username, '=', true));
        $this->dataset->Open();
        if ($this->dataset->Next()) {
            $expectedPassword = $this->dataset->GetFieldValueByName($this->passwordFieldName);
            return $this->CheckPasswordEquals($password, $expectedPassword);
        }

        return false;
    }

    public function CheckUsernameAndEncryptedPassword($username, $password) {
        $this->dataset->AddFieldFilter(
            $this->userNameFieldName,
            new FieldFilter($username, '=', true));
        $this->dataset->Open();
        if ($this->dataset->Next()) {
            $expectedPassword = $this->dataset->GetFieldValueByName($this->passwordFieldName);
            if ($this->CheckHashedPasswordEquals($password, $expectedPassword)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function GetEncryptedPassword($plainPassword) {
        return $this->passwordHasher->GetHash($plainPassword);
    }

    /**
     * @param ConnectionFactory $connectionFactory
     * @param array $connectionOptions
     * @param string $tableName
     * @param string $userNameFieldName
     * @param string $passwordFieldName
     */
    private  function CreateDataset(ConnectionFactory $connectionFactory, $connectionOptions, $tableName, $userNameFieldName, $passwordFieldName)
    {
        $this->dataset = new TableDataset(
            $connectionFactory,
            $connectionOptions,
            $tableName);
        $field = new StringField($userNameFieldName);
        $this->dataset->AddField($field, true);
        $field = new StringField($passwordFieldName);
        $this->dataset->AddField($field, false);
    }
}
