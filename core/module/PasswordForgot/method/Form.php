<?php
/**
 * Request Password Forgotten Token.
 * Disabled when DEBUG_MAIL is on :)
 * @author gizmore
 */
final class PasswordForgot_Form extends GWF_Method
{
	public function getHTAccess(GWF_Module $module)
	{
		return 'RewriteRule ^recovery$ index.php?mo=PasswordForgot&me=Form'.PHP_EOL;
//		$rewrites = array('recovery', 'passwort_vergessen', 'Dimenticati_il_Password');
//		return $this->getHTAccessMethods($this->_module, $rewrites);
	}
	
	public function execute(GWF_Module $module)
	{
		if (GWF_IP6::isLocal())
		{
			return GWF_HTML::err('ERR_MODULE_DISABLED', array( 'PasswordForgot'));
		}
		
		if (false !== (Common::getPost('request'))) {
			return $this->onRequest($this->_module);
		}
		return $this->form($this->_module);
	}
	
	private function getForm()
	{
		$data = array(
			'username' => array(GWF_Form::STRING, '', $this->_module->lang('th_username')),
			'email' => array(GWF_Form::STRING, '', $this->_module->lang('th_email')),
		);
		if ($this->_module->wantCaptcha()) {
			$data['captcha'] = array(GWF_Form::CAPTCHA);
		}
		$data['request'] = array(GWF_Form::SUBMIT, $this->_module->lang('btn_request'), '');
		return new GWF_Form($this, $data);
	}
	
	private function form()
	{
		$form = $this->getForm($this->_module);
		$tVars = array(
			'form' => $form->templateY($this->_module->lang('title_request'))
		);
		return $this->_module->templatePHP('request.php', $tVars);
	}
	
	public function validate_email(Module_PasswordForgot $module, $email) { return false; }
	public function validate_username(Module_PasswordForgot $module, $username) { return false; }
	
	private function onRequest()
	{
		$form = $this->getForm($this->_module);
		
		if (false !== ($errors = $form->validate($this->_module))) {
			return $errors.$this->form($this->_module);
		}
		
		$email = Common::getPost('email', '');
		
		$user1 = GWF_User::getByName(Common::getPost('username'));
		$user2 = GWF_Validator::isValidEmail($email) ? GWF_User::getByEmail($email) : false;

		# nothing found
		if ($user1 === false && $user2 === false) {
			return $this->_module->error('err_not_found').$this->form($this->_module);
		}
		
		# Two different users
		if ($user1 !== false && $user2 !== false && ($user1->getID() !== $user2->getID())) {
			return $this->_module->error('err_not_same_user').$this->form($this->_module);
		}

		# pick the user and send him mail
		if ($user1 !== false && $user2 !== false) {
			$user = $user1;
		}
		elseif ($user1 !== false) {
			$user = $user1;
		}
		elseif ($user2 !== false) {
			$user = $user2;
		}
		return $this->sendMail($this->_module, $user);
	}

	private function sendMail(Module_PasswordForgot $module, GWF_User $user)
	{
		if ('' === ($email = $user->getValidMail()))
		{
			return $this->_module->error('err_no_mail');
		}

		$sender = $this->_module->getMailSender();
		$username = $user->displayUsername();
		$link = $this->getRequestLink($this->_module, $user);
		$body = $this->_module->lang('mail_body', array( $username, $sender, $link));
		
		$mail = new GWF_Mail();
		$mail->setSender(GWF_SUPPORT_EMAIL);
		$mail->setReceiver($email);
		$mail->setSubject($this->_module->lang('mail_subj'));
		$mail->setBody($body);
		
		return $mail->sendToUser($user) ? $this->_module->message('msg_sent_mail', array('<em>'.GWF_HTML::display(GWF_HTML::lang('unknown')).'</em>')) : GWF_HTML::err('ERR_MAIL_SENT'); 
	}
	
	private function getRequestLink(Module_PasswordForgot $module, GWF_User $user)
	{
		$userid = $user->getID();
		
		require_once GWF_CORE_PATH.'module/Account/GWF_AccountChange.php';
		
		if (false === ($token = GWF_AccountChange::createToken($userid, 'pass'))) {
			return 'ERR';
		}
		$url = Common::getAbsoluteURL(sprintf('change_password/%d/%s', $userid, $token));
		return sprintf('<a href="%s">%s</a>', $url, $url);
	}
}

?>