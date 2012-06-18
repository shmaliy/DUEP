<?php

class Users_AdminPermissionsController extends Sunny_Controller_Action
{
	public function indexAction()
	{
		
	}
	
	public function deleteAction()
	{
		$request = $this->getRequest();
		$mapper = new Users_Model_Mapper_UsersPermissions();
		$mapper->delete($request->getParam('id', array()));
	}
	
	public function editAction()
	{
		$request = $this->getRequest();
		$form = new Staff_Form_Edit();
		$view = $this->view;
		
		if ($request->isXmlHttpRequest() || $request->isPost()) {
			if ($form->isValid($request->getParams())) {
				
			} else {
				$view->formErrors = $form->getErrorMessages();
			}
		} else {
			$view->form = $form;
		}
	}
}