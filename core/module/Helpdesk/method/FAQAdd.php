<?php
final class Helpdesk_FAQAdd extends GWF_Method
{
	public function getUserGroups() { return array('admin','staff'); }
	
	public function execute(GWF_Module $module)
	{
		if (isset($_POST['add'])) {
			return $this->onAdd($module);
		}
		return $this->templateAdd($module);
	}

	private function templateAdd(Module_Helpdesk $module)
	{
		$form = $this->formAdd($module);
		$tVars = array(
			'form' => $form->templateY($module->lang('ft_add_faq')),
		);
		return $module->template('faq_add.tpl', $tVars);
	}
	
	private function formAdd(Module_Helpdesk $module)
	{
		$data = array(
			'lang' => array(GWF_Form::SELECT, GWF_LangSelect::single(1, 'lang', Common::getPostString('lang')), $module->lang('th_lang'), $module->lang('tt_lang')),
			'question' => array(GWF_Form::STRING, '', $module->lang('th_question')),
			'answer' => array(GWF_Form::MESSAGE, '', $module->lang('th_answer')),
			'add' => array(GWF_Form::SUBMIT, $module->lang('btn_add_faq')),
		);
		return new GWF_Form($this, $data);
	}

	public function validate_lang($m, $arg) { return GWF_LangSelect::validate_langid($arg, true); }
	public function validate_question($m, $arg) { return GWF_Validator::validateString($m, 'question', $arg, 4, $m->cfgMaxTitleLen(), false); }
	public function validate_answer($m, $arg) { return GWF_Validator::validateString($m, 'answer', $arg, 8, $m->cfgMaxMessageLen(), false); }
	
	private function onAdd(Module_Helpdesk $module)
	{
		$form = $this->formAdd($module);
		if (false !== ($error = $form->validate($module))) {
			return $error.$this->templateAdd($module);
		}
		
		$faq = new GWF_HelpdeskFAQ(array(
			'hdf_id' => 0,
			'hdf_tid' => 0,
			'hdf_question' => $form->getVar('question'),
			'hdf_answer' => $form->getVar('answer'),
			'hdf_langid' => $form->getVar('lang'),
		));
		
		if (false === ($faq->insert())) {
			return GWF_HTML::err('ERR_DATABASE', array(__FILE__, __LINE__)).$this->templateAdd($module);
		}
		
		return $module->message('msg_faq_add');
	}
}
?>