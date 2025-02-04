<?php

include_once dirname(__FILE__) . '/common_page.php';

class HomePage extends CommonPage
{
    /**
     * @var bool
     */
    public $showPageList = true;

    /**
     * @var string
     */
    private $selectedGroup;

    public function __construct($grants, $contentEncoding)
    {
        parent::__construct('', $contentEncoding);
        $this->selectedGroup = ArrayWrapper::createGetWrapper()->getValue('group');
        $this->setTitle(is_null($this->selectedGroup)
            ? $this->GetLocalizerCaptions()->getMessageString('HomePage')
            : $this->selectedGroup);
    }

    /**
     * {@inheritdoc}
     */
    public function GetPageFileName()
    {
        return basename(__FILE__);
    }

    /**
     * @return PageList
     */
    public function GetReadyPageList()
    {
        return PageList::createForPage($this);
    }

    public function getSelectedGroup()
    {
        return $this->selectedGroup;
    }

    public function Accept(Renderer $renderer)
    {
        $renderer->RenderHomePage($this);
    }

    public function SetShowPageList($showPageList)
    {
        $this->showPageList = $showPageList;
    }

    public function GetShowPageList()
    {
        return $this->showPageList;
    }

    public function GetAuthenticationViewData() {
        return array(
            'Enabled' => function_exists('SetUpUserAuthorization'),
            'LoggedIn' => GetApplication()->IsCurrentUserLoggedIn(),
            'CurrentUser' => array(
                'Name' => GetApplication()->GetCurrentUser(),
                'Id' => GetApplication()->GetCurrentUserId(),
            ),
            'isAdminPanelVisible' => GetApplication()->HasAdminPanelForCurrentUser(),
        );
    }

    public function getType()
    {
        return PageType::Home;
    }

    public function getLink()
    {
        return GetHomeURL();
    }
}
