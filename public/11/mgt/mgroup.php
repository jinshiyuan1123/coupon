<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

    include_once dirname(__FILE__) . '/components/startup.php';


    include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page/page.php';
    include_once dirname(__FILE__) . '/' . 'components/page/detail_page.php';
    include_once dirname(__FILE__) . '/' . 'components/page/nested_form_page.php';
    include_once dirname(__FILE__) . '/' . 'authorization.php';

    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf8';
        GetApplication()->GetUserAuthorizationStrategy()->ApplyIdentityToConnectionOptions($result);
        return $result;
    }

    
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class mgroup_mgroup_member01Page extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`mgroup_member`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new IntegerField('gid');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('uid');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new IntegerField('refer');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('uid', '`user`', new IntegerField('id', null, null, true), new StringField('username', 'uid_username', 'uid_username_user'), 'uid_username_user');
            $this->dataset->AddLookupField('refer', '`user`', new IntegerField('id', null, null, true), new StringField('username', 'refer_username', 'refer_username_user'), 'refer_username_user');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(50);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'id', 'id', $this->RenderText('Id')),
                new FilterColumn($this->dataset, 'gid', 'gid', $this->RenderText('Gid')),
                new FilterColumn($this->dataset, 'uid', 'uid_username', $this->RenderText('用戶')),
                new FilterColumn($this->dataset, 'refer', 'refer_username', $this->RenderText('推薦人'))
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['id'])
                ->addColumn($columns['gid'])
                ->addColumn($columns['uid'])
                ->addColumn($columns['refer']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('uid')
                ->setOptionsFor('refer');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('id_edit');
            
            $filterBuilder->addColumn(
                $columns['id'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('gid_edit');
            
            $filterBuilder->addColumn(
                $columns['gid'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new AutocompleteComboBox('uid_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_uid_username_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('uid', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_uid_username_search');
            
            $filterBuilder->addColumn(
                $columns['uid'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new AutocompleteComboBox('refer_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_refer_username_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('refer', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_refer_username_search');
            
            $filterBuilder->addColumn(
                $columns['refer'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
    
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for username field
            //
            $column = new TextViewColumn('uid', 'uid_username', '用戶', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('refer', 'refer_username', '推薦人', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for username field
            //
            $column = new TextViewColumn('uid', 'uid_username', '用戶', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('refer', 'refer_username', '推薦人', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for gid field
            //
            $editor = new TextEdit('gid_edit');
            $editColumn = new CustomEditColumn('Gid', 'gid', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for uid field
            //
            $editor = new ComboBox('uid_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`user`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('username');
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $lookupDataset->AddField($field, false);
            $field = new StringField('phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('fullname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('photo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('alipay');
            $lookupDataset->AddField($field, false);
            $field = new StringField('wechat');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('power');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('money');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('gid');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('createtime');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('validtime');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('username', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                '用戶', 
                'uid', 
                $editor, 
                $this->dataset, 'id', 'username', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for refer field
            //
            $editor = new ComboBox('refer_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`user`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('username');
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $lookupDataset->AddField($field, false);
            $field = new StringField('phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('fullname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('photo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('alipay');
            $lookupDataset->AddField($field, false);
            $field = new StringField('wechat');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('power');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('money');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('gid');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('createtime');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('validtime');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('username', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                '推薦人', 
                'refer', 
                $editor, 
                $this->dataset, 'id', 'username', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for gid field
            //
            $editor = new TextEdit('gid_edit');
            $editColumn = new CustomEditColumn('Gid', 'gid', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for uid field
            //
            $editor = new ComboBox('uid_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`user`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('username');
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $lookupDataset->AddField($field, false);
            $field = new StringField('phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('fullname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('photo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('alipay');
            $lookupDataset->AddField($field, false);
            $field = new StringField('wechat');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('power');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('money');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('gid');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('createtime');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('validtime');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('username', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                '用戶', 
                'uid', 
                $editor, 
                $this->dataset, 'id', 'username', $lookupDataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for refer field
            //
            $editor = new ComboBox('refer_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`user`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('username');
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $lookupDataset->AddField($field, false);
            $field = new StringField('phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('fullname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('photo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('alipay');
            $lookupDataset->AddField($field, false);
            $field = new StringField('wechat');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('power');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('money');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('gid');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('createtime');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('validtime');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('username', GetOrderTypeAsSQL(otAscending));
            $editColumn = new LookUpEditColumn(
                '推薦人', 
                'refer', 
                $editor, 
                $this->dataset, 'id', 'username', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(false && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for id field
            //
            $column = new NumberViewColumn('id', 'id', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for gid field
            //
            $column = new NumberViewColumn('gid', 'gid', 'Gid', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('uid', 'uid_username', '用戶', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('refer', 'refer_username', '推薦人', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for id field
            //
            $column = new NumberViewColumn('id', 'id', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for gid field
            //
            $column = new NumberViewColumn('gid', 'gid', 'Gid', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('uid', 'uid_username', '用戶', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('refer', 'refer_username', '推薦人', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for gid field
            //
            $column = new NumberViewColumn('gid', 'gid', 'Gid', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('uid', 'uid_username', '用戶', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('refer', 'refer_username', '推薦人', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(false);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setPrintListAvailable(false);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(false);
            $this->setExportListAvailable(array());
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array());
    
            return $result;
        }
     
        protected function doRegisterHandlers() {
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`user`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('username');
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $lookupDataset->AddField($field, false);
            $field = new StringField('phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('fullname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('photo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('alipay');
            $lookupDataset->AddField($field, false);
            $field = new StringField('wechat');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('power');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('money');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('gid');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('createtime');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('validtime');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('username', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_uid_username_search', 'id', 'username', null);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`user`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('username');
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $lookupDataset->AddField($field, false);
            $field = new StringField('phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('fullname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('photo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('alipay');
            $lookupDataset->AddField($field, false);
            $field = new StringField('wechat');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('power');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('money');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('gid');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('createtime');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('validtime');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('username', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), ''));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_refer_username_search', 'id', 'username', null);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, &$cancel, &$message, &$messageDisplayTime, $tableName)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, &$rowData, &$cancel, &$message, &$messageDisplayTime, $tableName)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, &$cancel, &$message, &$messageDisplayTime, $tableName)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doGetCustomUploadFileName($fieldName, $rowData, &$result, &$handled, $originalFileName, $originalFileExtension, $fileSize)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
    }
    
    // OnBeforePageExecute event handler
    
    
    
    class mgroupPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`mgroup`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, true);
            $field = new StringField('name');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new StringField('descr');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('power');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('members');
            $this->dataset->AddField($field, false);
            $field = new IntegerField('leader');
            $field->SetIsNotNull(true);
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('createtime');
            $this->dataset->AddField($field, false);
            $field = new DateTimeField('validtime');
            $this->dataset->AddField($field, false);
            $field = new StringField('state');
            $this->dataset->AddField($field, false);
            $this->dataset->AddLookupField('leader', '`user`', new IntegerField('id', null, null, true), new StringField('username', 'leader_username', 'leader_username_user'), 'leader_username_user');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(50);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'id', 'id', $this->RenderText('No.')),
                new FilterColumn($this->dataset, 'name', 'name', $this->RenderText('商會名')),
                new FilterColumn($this->dataset, 'descr', 'descr', $this->RenderText('商會介紹')),
                new FilterColumn($this->dataset, 'power', 'power', $this->RenderText('算力')),
                new FilterColumn($this->dataset, 'members', 'members', $this->RenderText('會員數')),
                new FilterColumn($this->dataset, 'leader', 'leader_username', $this->RenderText('會長')),
                new FilterColumn($this->dataset, 'createtime', 'createtime', $this->RenderText('申請时间')),
                new FilterColumn($this->dataset, 'validtime', 'validtime', $this->RenderText('批准时间')),
                new FilterColumn($this->dataset, 'state', 'state', $this->RenderText('狀態'))
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['id'])
                ->addColumn($columns['name'])
                ->addColumn($columns['descr'])
                ->addColumn($columns['power'])
                ->addColumn($columns['members'])
                ->addColumn($columns['leader'])
                ->addColumn($columns['createtime'])
                ->addColumn($columns['validtime'])
                ->addColumn($columns['state']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('leader')
                ->setOptionsFor('createtime')
                ->setOptionsFor('validtime')
                ->setOptionsFor('state');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('id_edit');
            
            $filterBuilder->addColumn(
                $columns['id'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('name_edit');
            $main_editor->SetMaxLength(32);
            
            $filterBuilder->addColumn(
                $columns['name'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('descr');
            
            $filterBuilder->addColumn(
                $columns['descr'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('power_edit');
            
            $filterBuilder->addColumn(
                $columns['power'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('members_edit');
            
            $filterBuilder->addColumn(
                $columns['members'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new AutocompleteComboBox('leader_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_leader_username_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('leader', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_leader_username_search');
            
            $filterBuilder->addColumn(
                $columns['leader'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DateTimeEdit('createtime_edit', false, 'Y-m-d H:i:s');
            
            $filterBuilder->addColumn(
                $columns['createtime'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::DATE_EQUALS => $main_editor,
                    FilterConditionOperator::DATE_DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::TODAY => null,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DateTimeEdit('validtime_edit', false, 'Y-m-d H:i:s');
            
            $filterBuilder->addColumn(
                $columns['validtime'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::DATE_EQUALS => $main_editor,
                    FilterConditionOperator::DATE_DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::TODAY => null,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('state_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $main_editor->addChoice($this->RenderText('申請中'), $this->RenderText('申請中'));
            $main_editor->addChoice($this->RenderText('批准'), $this->RenderText('批准'));
            $main_editor->addChoice($this->RenderText('拒絕'), $this->RenderText('拒絕'));
            $main_editor->SetAllowNullValue(false);
            
            $multi_value_select_editor = new MultiValueSelect('state');
            $multi_value_select_editor->setChoices($main_editor->getChoices());
            
            $text_editor = new TextEdit('state');
            
            $filterBuilder->addColumn(
                $columns['state'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new AjaxOperation(OPERATION_VIEW,
                    $this->GetLocalizerCaptions()->GetMessageString('View'),
                    $this->GetLocalizerCaptions()->GetMessageString('View'), $this->dataset,
                    $this->GetModalGridViewHandler(), $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new AjaxOperation(OPERATION_EDIT,
                    $this->GetLocalizerCaptions()->GetMessageString('Edit'),
                    $this->GetLocalizerCaptions()->GetMessageString('Edit'), $this->dataset,
                    $this->GetGridEditHandler(), $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            if (GetCurrentUserGrantForDataSource('mgroup.mgroup_member01')->HasViewGrant() && $withDetails)
            {
            //
            // View column for mgroup_mgroup_member01 detail
            //
            $column = new DetailColumn(array('id'), 'mgroup.mgroup_member01', 'mgroup_mgroup_member01_handler', $this->dataset, '商會會員');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            //
            // View column for id field
            //
            $column = new NumberViewColumn('id', 'id', 'No.', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for name field
            //
            $column = new TextViewColumn('name', 'name', '商會名', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for power field
            //
            $column = new NumberViewColumn('power', 'power', '算力', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('.');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for members field
            //
            $column = new NumberViewColumn('members', 'members', '會員數', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('leader', 'leader_username', '會長', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for createtime field
            //
            $column = new DateTimeViewColumn('createtime', 'createtime', '申請时间', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for validtime field
            //
            $column = new DateTimeViewColumn('validtime', 'validtime', '批准时间', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for state field
            //
            $column = new TextViewColumn('state', 'state', '狀態', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription($this->RenderText(''));
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for id field
            //
            $column = new NumberViewColumn('id', 'id', 'No.', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for name field
            //
            $column = new TextViewColumn('name', 'name', '商會名', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for power field
            //
            $column = new NumberViewColumn('power', 'power', '算力', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('.');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for members field
            //
            $column = new NumberViewColumn('members', 'members', '會員數', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('leader', 'leader_username', '會長', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for createtime field
            //
            $column = new DateTimeViewColumn('createtime', 'createtime', '申請时间', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for validtime field
            //
            $column = new DateTimeViewColumn('validtime', 'validtime', '批准时间', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for state field
            //
            $column = new TextViewColumn('state', 'state', '狀態', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for name field
            //
            $editor = new TextEdit('name_edit');
            $editor->SetMaxLength(32);
            $editColumn = new CustomEditColumn('商會名', 'name', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $editColumn->setAllowListCellEdit(false);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for power field
            //
            $editor = new TextEdit('power_edit');
            $editColumn = new CustomEditColumn('算力', 'power', $editor, $this->dataset);
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $editColumn->setAllowListCellEdit(false);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for members field
            //
            $editor = new TextEdit('members_edit');
            $editColumn = new CustomEditColumn('會員數', 'members', $editor, $this->dataset);
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $editColumn->setAllowListCellEdit(false);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for leader field
            //
            $editor = new AutocompleteComboBox('leader_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`user`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('username');
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $lookupDataset->AddField($field, false);
            $field = new StringField('phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('fullname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('photo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('alipay');
            $lookupDataset->AddField($field, false);
            $field = new StringField('wechat');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('power');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('money');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('gid');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('createtime');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('validtime');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('username', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'status=\'valid\' and gid is null'));
            $editColumn = new DynamicLookupEditColumn('會長(已認證)', 'leader', 'leader_username', 'edit_leader_username_search', $editor, $this->dataset, $lookupDataset, 'id', 'username', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $editColumn->setAllowListCellEdit(false);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for createtime field
            //
            $editor = new DateTimeEdit('createtime_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('申請时间', 'createtime', $editor, $this->dataset);
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $editColumn->setAllowListCellEdit(false);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for validtime field
            //
            $editor = new DateTimeEdit('validtime_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('批准时间', 'validtime', $editor, $this->dataset);
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $editColumn->setAllowListCellEdit(false);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for state field
            //
            $editor = new ComboBox('state_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice($this->RenderText('申請中'), $this->RenderText('申請中'));
            $editor->addChoice($this->RenderText('批准'), $this->RenderText('批准'));
            $editor->addChoice($this->RenderText('拒絕'), $this->RenderText('拒絕'));
            $editColumn = new CustomEditColumn('狀態', 'state', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $editColumn->setAllowListCellEdit(false);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for name field
            //
            $editor = new TextEdit('name_edit');
            $editor->SetMaxLength(32);
            $editColumn = new CustomEditColumn('商會名', 'name', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for power field
            //
            $editor = new TextEdit('power_edit');
            $editColumn = new CustomEditColumn('算力', 'power', $editor, $this->dataset);
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for members field
            //
            $editor = new TextEdit('members_edit');
            $editColumn = new CustomEditColumn('會員數', 'members', $editor, $this->dataset);
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for leader field
            //
            $editor = new AutocompleteComboBox('leader_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`user`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('username');
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $lookupDataset->AddField($field, false);
            $field = new StringField('phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('fullname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('photo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('alipay');
            $lookupDataset->AddField($field, false);
            $field = new StringField('wechat');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('power');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('money');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('gid');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('createtime');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('validtime');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('username', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'status=\'valid\' and gid is null'));
            $editColumn = new DynamicLookupEditColumn('會長(已認證)', 'leader', 'leader_username', 'insert_leader_username_search', $editor, $this->dataset, $lookupDataset, 'id', 'username', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for createtime field
            //
            $editor = new DateTimeEdit('createtime_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('申請时间', 'createtime', $editor, $this->dataset);
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for validtime field
            //
            $editor = new DateTimeEdit('validtime_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('批准时间', 'validtime', $editor, $this->dataset);
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for state field
            //
            $editor = new ComboBox('state_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $editor->addChoice($this->RenderText('申請中'), $this->RenderText('申請中'));
            $editor->addChoice($this->RenderText('批准'), $this->RenderText('批准'));
            $editor->addChoice($this->RenderText('拒絕'), $this->RenderText('拒絕'));
            $editColumn = new CustomEditColumn('狀態', 'state', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $this->RenderText($editColumn->GetCaption())));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for id field
            //
            $column = new NumberViewColumn('id', 'id', 'No.', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for name field
            //
            $column = new TextViewColumn('name', 'name', '商會名', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for descr field
            //
            $column = new TextViewColumn('descr', 'descr', '商會介紹', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('mgroupGrid_descr_handler_print');
            $grid->AddPrintColumn($column);
            
            //
            // View column for power field
            //
            $column = new NumberViewColumn('power', 'power', '算力', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('.');
            $grid->AddPrintColumn($column);
            
            //
            // View column for members field
            //
            $column = new NumberViewColumn('members', 'members', '會員數', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('leader', 'leader_username', '會長', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for createtime field
            //
            $column = new DateTimeViewColumn('createtime', 'createtime', '申請时间', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for validtime field
            //
            $column = new DateTimeViewColumn('validtime', 'validtime', '批准时间', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for state field
            //
            $column = new TextViewColumn('state', 'state', '狀態', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for id field
            //
            $column = new NumberViewColumn('id', 'id', 'No.', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for name field
            //
            $column = new TextViewColumn('name', 'name', '商會名', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for descr field
            //
            $column = new TextViewColumn('descr', 'descr', '商會介紹', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('mgroupGrid_descr_handler_export');
            $grid->AddExportColumn($column);
            
            //
            // View column for power field
            //
            $column = new NumberViewColumn('power', 'power', '算力', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('.');
            $grid->AddExportColumn($column);
            
            //
            // View column for members field
            //
            $column = new NumberViewColumn('members', 'members', '會員數', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('leader', 'leader_username', '會長', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for createtime field
            //
            $column = new DateTimeViewColumn('createtime', 'createtime', '申請时间', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for validtime field
            //
            $column = new DateTimeViewColumn('validtime', 'validtime', '批准时间', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for state field
            //
            $column = new TextViewColumn('state', 'state', '狀態', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for name field
            //
            $column = new TextViewColumn('name', 'name', '商會名', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for descr field
            //
            $column = new TextViewColumn('descr', 'descr', '商會介紹', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->SetFullTextWindowHandlerName('mgroupGrid_descr_handler_compare');
            $grid->AddCompareColumn($column);
            
            //
            // View column for power field
            //
            $column = new NumberViewColumn('power', 'power', '算力', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('.');
            $grid->AddCompareColumn($column);
            
            //
            // View column for members field
            //
            $column = new NumberViewColumn('members', 'members', '會員數', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for username field
            //
            $column = new TextViewColumn('leader', 'leader_username', '會長', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for createtime field
            //
            $column = new DateTimeViewColumn('createtime', 'createtime', '申請时间', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for validtime field
            //
            $column = new DateTimeViewColumn('validtime', 'validtime', '批准时间', $this->dataset);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for state field
            //
            $column = new TextViewColumn('state', 'state', '狀態', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function CreateMasterDetailRecordGrid()
        {
            $result = new Grid($this, $this->dataset);
            
            $this->AddFieldColumns($result, false);
            $this->AddPrintColumns($result);
            
            $result->SetAllowDeleteSelected(false);
            $result->SetShowUpdateLink(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(false);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $this->setupGridColumnGroup($result);
            $this->attachGridEventHandlers($result);
            
            return $result;
        }
        
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        
        public function GetEnableModalGridInsert() { return true; }
        public function GetEnableModalSingleRecordView() { return true; }
        
        public function GetEnableModalGridEdit() { return true; }
        
        public function ShowEditButtonHandler(&$show)
        {
            if ($this->GetRecordPermission() != null)
                $show = $this->GetRecordPermission()->HasEditGrant($this->GetDataset());
        }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(false);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetEditClientFormLoadedScript($this->RenderText('editors[\'name\'].setEnabled(false);
            editors[\'leader\'].setEnabled(false);
            editors[\'name\'].setVisiabled(false);
            editors[\'name\'].setReadOnly(true);'));
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(false);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(false);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(false);
            $this->setExportListAvailable(array('excel','csv'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array());
    
            return $result;
        }
     
        protected function doRegisterHandlers() {
            $detailPage = new mgroup_mgroup_member01Page('mgroup_mgroup_member01', $this, array('gid'), array('id'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserGrantForDataSource('mgroup.mgroup_member01'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('mgroup.mgroup_member01'));
            $detailPage->SetTitle('商會會員');
            $detailPage->SetMenuLabel('商會會員');
            $detailPage->SetHeader(GetPagesHeader());
            $detailPage->SetFooter(GetPagesFooter());
            $detailPage->SetHttpHandlerName('mgroup_mgroup_member01_handler');
            $handler = new PageHTTPHandler('mgroup_mgroup_member01_handler', $detailPage);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for descr field
            //
            $column = new TextViewColumn('descr', 'descr', '商會介紹', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'mgroupGrid_descr_handler_print', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            //
            // View column for descr field
            //
            $column = new TextViewColumn('descr', 'descr', '商會介紹', $this->dataset);
            $column->SetOrderable(true);
            $handler = new ShowTextBlobHandler($this->dataset, $this, 'mgroupGrid_descr_handler_compare', $column);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`user`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('username');
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $lookupDataset->AddField($field, false);
            $field = new StringField('phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('fullname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('photo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('alipay');
            $lookupDataset->AddField($field, false);
            $field = new StringField('wechat');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('power');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('money');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('gid');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('createtime');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('validtime');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('username', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'status=\'valid\' and gid is null'));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_leader_username_search', 'id', 'username', null);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`user`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('username');
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $lookupDataset->AddField($field, false);
            $field = new StringField('phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('fullname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('photo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('alipay');
            $lookupDataset->AddField($field, false);
            $field = new StringField('wechat');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('power');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('money');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('gid');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('createtime');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('validtime');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('username', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'status=\'valid\' and gid is null'));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_leader_username_search', 'id', 'username', null);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`user`');
            $field = new IntegerField('id', null, null, true);
            $field->SetIsNotNull(true);
            $lookupDataset->AddField($field, true);
            $field = new StringField('username');
            $lookupDataset->AddField($field, false);
            $field = new StringField('password');
            $lookupDataset->AddField($field, false);
            $field = new StringField('phone');
            $lookupDataset->AddField($field, false);
            $field = new StringField('fullname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('idcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('photo');
            $lookupDataset->AddField($field, false);
            $field = new StringField('status');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankname');
            $lookupDataset->AddField($field, false);
            $field = new StringField('bankcard');
            $lookupDataset->AddField($field, false);
            $field = new StringField('alipay');
            $lookupDataset->AddField($field, false);
            $field = new StringField('wechat');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('power');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('money');
            $lookupDataset->AddField($field, false);
            $field = new IntegerField('gid');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('createtime');
            $lookupDataset->AddField($field, false);
            $field = new DateTimeField('validtime');
            $lookupDataset->AddField($field, false);
            $lookupDataset->setOrderByField('username', GetOrderTypeAsSQL(otAscending));
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'status=\'valid\' and gid is null'));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_leader_username_search', 'id', 'username', null);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, &$cancel, &$message, &$messageDisplayTime, $tableName)
        {
            $rowData['createtime']=date("Y-m-d H:i:s");
                if($rowData['state']=='verify'  && strlen($rowData['validtime'])<=0){
                  $rowData['validtime']=date("Y-m-d H:i:s");
                }
                if( strlen($rowData['state'])<=0)
                  $rowData['state']=='申請中';
                $rowData['members']=1;
        }
    
        protected function doBeforeUpdateRecord($page, &$rowData, &$cancel, &$message, &$messageDisplayTime, $tableName)
        {
            if($rowData['state']=='init'||$rowData['state']=='申請中'){
              $cancel = true;
              //$message="table: $tableName <br/>OID:".$rowData['id']."UID:".$rowData['uid'];
              $message="聯盟不允許修改為未批准狀態";
              $messageDisplayTime=5;
            }else{
              if( ($rowData['state']=='verify'|| $rowData['state']=='批准') && strlen($rowData['validtime'])<=0)
                $rowData['validtime']=date("Y-m-d H:i:s");
              if( strlen($rowData['createtime'])<=0)
                $rowData['createtime']=date("Y-m-d H:i:s");
            }
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, &$cancel, &$message, &$messageDisplayTime, $tableName)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
            if ($success==false) {
                $message="聯盟名称重复或聯盟會長不可以是已存在的會長...";
                $messageDisplayTime=5;
            }else{
                $url="http://".$_SERVER['HTTP_HOST']."/io/?c=useraction&a=update_mgroup&gid=".$rowData['id'];
                file_get_contents($url);
            }
        }
    
        protected function doAfterUpdateRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
            if ($success==false) {
                $message="聯盟名称重复或聯盟會長不可以是已存在的會長...";
                $messageDisplayTime=5;
            }else{
                
                $url="http://".$_SERVER['HTTP_HOST']."/io/?c=useraction&a=update_mgroup&gid=".$rowData['id'];
                file_get_contents($url);
            }
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doGetCustomUploadFileName($fieldName, $rowData, &$result, &$handled, $originalFileName, $originalFileExtension, $fileSize)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
    }

    SetUpUserAuthorization();

    try
    {
        $Page = new mgroupPage("mgroup", "mgroup.php", GetCurrentUserGrantForDataSource("mgroup"), 'UTF-8');
        $Page->SetTitle('聯盟列表');
        $Page->SetMenuLabel('聯盟列表');
        $Page->SetHeader(GetPagesHeader());
        $Page->SetFooter(GetPagesFooter());
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("mgroup"));
        GetApplication()->SetCanUserChangeOwnPassword(
            !function_exists('CanUserChangeOwnPassword') || CanUserChangeOwnPassword());
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e);
    }
	
