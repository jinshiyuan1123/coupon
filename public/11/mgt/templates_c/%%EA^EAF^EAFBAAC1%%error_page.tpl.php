<?php $this->assign('ErrorTitle', $this->_tpl_vars['Captions']->getMessageString('Error')); ?>;

<?php ob_start(); ?>
    <p><?php echo $this->_tpl_vars['Captions']->GetMessageString('CriticalErrorSuggestions'); ?>
</p>
    <h3><?php echo $this->_tpl_vars['Captions']->GetMessageString('ErrorDetails'); ?>
:</h3>
    <p style="text-indent: 20px"><?php echo $this->_tpl_vars['Message']; ?>
</p>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ErrorContent', ob_get_contents());ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/error.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>