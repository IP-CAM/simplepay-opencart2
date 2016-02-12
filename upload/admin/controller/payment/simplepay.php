<?php
class ControllerPaymentSimplePay extends Controller {
	private $error = array();

	/**
	* Admin page
	*/
	public function index() {
		$this->load->language('payment/simplepay');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('simplepay', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		
		$data['entry_test'] = $this->language->get('entry_test');
		$data['entry_private_live_key'] = $this->language->get('entry_private_live_key');
		$data['entry_public_live_key'] = $this->language->get('entry_public_live_key');
		$data['entry_private_test_key'] = $this->language->get('entry_private_test_key');
		$data['entry_public_test_key'] = $this->language->get('entry_public_test_key');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_image'] = $this->language->get('entry_image');
		
		$data['entry_status'] = $this->language->get('entry_status');
		
		$data['help_test'] = $this->language->get('help_test');
		$data['help_description'] = $this->language->get('help_description');
		$data['help_image'] = $this->language->get('help_image');
		
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['private_live_key'])) {
			$data['error_private_live_key'] = $this->error['private_live_key'];
		} else {
			$data['error_private_live_key'] = '';
		}

		if (isset($this->error['public_live_key'])) {
			$data['error_public_live_key'] = $this->error['public_live_key'];
		} else {
			$data['error_public_live_key'] = '';
		}

		if (isset($this->error['private_test_key'])) {
			$data['error_private_test_key'] = $this->error['private_test_key'];
		} else {
			$data['error_private_test_key'] = '';
		}

		if (isset($this->error['public_test_key'])) {
			$data['error_public_test_key'] = $this->error['public_test_key'];
		} else {
			$data['error_public_test_key'] = '';
		}

		if (isset($this->error['description'])) {
			$data['error_description'] = $this->error['description'];
		} else {
			$data['error_description'] = '';
		}

		if (isset($this->error['image'])) {
			$data['error_image'] = $this->error['image'];
		} else {
			$data['error_image'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_payment'),
			'href' => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('payment/simplepay', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['action'] = $this->url->link('payment/simplepay', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['simplepay_test'])) {
			$data['simplepay_test'] = $this->request->post['simplepay_test'];
		} else {
			$data['simplepay_test'] = $this->config->get('simplepay_test');
		}

		if (isset($this->request->post['simplepay_private_live_key'])) {
			$data['simplepay_private_live_key'] = $this->request->post['simplepay_private_live_key'];
		} else {
			$data['simplepay_private_live_key'] = $this->config->get('simplepay_private_live_key');
		}

		if (isset($this->request->post['simplepay_public_live_key'])) {
			$data['simplepay_public_live_key'] = $this->request->post['simplepay_public_live_key'];
		} else {
			$data['simplepay_public_live_key'] = $this->config->get('simplepay_public_live_key');
		}

		if (isset($this->request->post['simplepay_private_test_key'])) {
			$data['simplepay_private_test_key'] = $this->request->post['simplepay_private_test_key'];
		} else {
			$data['simplepay_private_test_key'] = $this->config->get('simplepay_private_test_key');
		}

		if (isset($this->request->post['simplepay_public_test_key'])) {
			$data['simplepay_public_test_key'] = $this->request->post['simplepay_public_test_key'];
		} else {
			$data['simplepay_public_test_key'] = $this->config->get('simplepay_public_test_key');
		}

		if (isset($this->request->post['simplepay_description'])) {
			$data['simplepay_description'] = $this->request->post['simplepay_description'];
		} else {
			$data['simplepay_description'] = $this->config->get('simplepay_description');
		}

		if (isset($this->request->post['simplepay_image'])) {
			$data['simplepay_image'] = $this->request->post['simplepay_image'];
		} else {
			$data['simplepay_image'] = $this->config->get('simplepay_image');
		}

		if (isset($this->request->post['simplepay_status'])) {
			$data['simplepay_status'] = $this->request->post['simplepay_status'];
		} else {
			$data['simplepay_status'] = $this->config->get('simplepay_status');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('payment/simplepay.tpl', $data));
	}

	/**
	* Validate admin form
	*/
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'payment/simplepay')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['simplepay_private_live_key']) {
			$this->error['private_live_key'] = $this->language->get('error_private_live_key');
		}

		if (!$this->request->post['simplepay_public_live_key']) {
			$this->error['public_live_key'] = $this->language->get('error_public_live_key');
		}

		if (!$this->request->post['simplepay_private_test_key']) {
			$this->error['private_test_key'] = $this->language->get('error_private_test_key');
		}

		if (!$this->request->post['simplepay_public_test_key']) {
			$this->error['public_test_key'] = $this->language->get('error_public_test_key');
		}

		if (!$this->request->post['simplepay_description']) {
			$this->error['description'] = $this->language->get('error_description');
		}

		if (!$this->request->post['simplepay_image']) {
			$this->error['image'] = $this->language->get('error_image');
		}

		return !$this->error;
	}
}
