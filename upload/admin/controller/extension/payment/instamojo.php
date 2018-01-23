<?php
class ControllerExtensionPaymentInstamojo extends Controller {
  private $error = array();
 
  public function index() {
    $this->language->load('extension/payment/instamojo');
    $this->document->setTitle('Instamojo Payment Method Configuration');
    $this->load->model('setting/setting');
 
    if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {       
			$this->model_setting_setting->editSetting('payment_instamojo', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}
	
	
	if($this->error)
	{
		$data['error_warning'] = implode("<br/>",$this->error);	
	}else
		$data['error_warning'] = ""; 
        
                
                
	
    $data['heading_title'] = $this->language->get('heading_title');
    $data['entry_text_instamojo_checkout_label'] = $this->language->get('instamojo_checkout_label');
    $data['entry_text_instamojo_client_id'] = $this->language->get('instamojo_client_id');
    $data['entry_text_instamojo_client_secret'] = $this->language->get('instamojo_client_secret');
    
	$data['button_save'] = $this->language->get('text_button_save');
    $data['button_cancel'] = $this->language->get('text_button_cancel');
    $data['entry_order_status'] = $this->language->get('entry_order_status');
   
	$data['entry_test_mode'] = $this->language->get('entry_test_mode');
    $data['entry_test_mode_on'] = $this->language->get('entry_test_mode_on');
    $data['entry_test_mode_off'] = $this->language->get('entry_test_mode_off');
    
	$data['text_enabled'] = $this->language->get('text_enabled');
    $data['text_disabled'] = $this->language->get('text_disabled');
    $data['text_edit'] = $this->language->get('text_edit');
    $data['entry_status'] = $this->language->get('entry_status');
    $data['entry_sort_order'] = $this->language->get('entry_sort_order');
    
 
    $data['action'] = $this->url->link('extension/payment/instamojo', 'user_token=' . $this->session->data['user_token'], 'SSL');
    $data['cancel'] = $this->url->link('extension/extension', 'user_token=' . $this->session->data['user_token'], 'SSL');

    if (isset($this->request->post['payment_instamojo_checkout_label'])) {
      $data['payment_instamojo_checkout_label'] = $this->request->post['payment_instamojo_checkout_label'];
    } else {
      $data['payment_instamojo_checkout_label'] = $this->config->get('payment_instamojo_checkout_label');
    }

 
    if (isset($this->request->post['payment_instamojo_client_id'])) {
      $data['payment_instamojo_client_id'] = $this->request->post['payment_instamojo_client_id'];
    } else {
      $data['payment_instamojo_client_id'] = $this->config->get('payment_instamojo_client_id');
    }
    
	if (isset($this->request->post['payment_instamojo_testmode'])) {
      $data['payment_instamojo_testmode'] = $this->request->post['payment_instamojo_testmode'];
    } else {
      $data['payment_instamojo_testmode'] = $this->config->get('payment_instamojo_testmode');
    }    
    if (isset($this->request->post['instamojo_client_secret'])) {
      $data['payment_instamojo_client_secret'] = $this->request->post['payment_instamojo_client_secret'];
    } else {
      $data['payment_instamojo_client_secret'] = $this->config->get('payment_instamojo_client_secret');
    }

 
       
    if (isset($this->request->post['payment_instamojo_status'])) {
      $data['payment_instamojo_status'] = $this->request->post['payment_instamojo_status'];
    } else {
      $data['payment_instamojo_status'] = $this->config->get('payment_instamojo_status');
    }
    
    if (isset($this->request->post['payment_instamojo_order_status_id'])) {
      $data['payment_instamojo_order_status_id'] = $this->request->post['payment_instamojo_order_status_id'];
    } else {
      $data['payment_instamojo_order_status_id'] = $this->config->get('payment_instamojo_order_status_id');
    }

    if (isset($this->request->post['payment_instamojo_sort_order'])) {
      $data['payment_instamojo_sort_order'] = $this->request->post['payment_instamojo_sort_order'];
    } else {
      $data['payment_instamojo_sort_order'] = $this->config->get('payment_instamojo_sort_order');
    }
 
    $this->load->model('localisation/order_status');
    $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
              
    $data['breadcrumbs'] = array();
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_home'),
                'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], 'SSL')
            );

    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_extension'),
      'href' => $this->url->link('extension/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
    );

    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('heading_title'),
      'href' => $this->url->link('extension/payment/instamojo', 'user_token=' . $this->session->data['user_token'], 'SSL')
    );
     
 
    $data['header'] = $this->load->controller('common/header');
    $data['column_left'] = $this->load->controller('common/column_left');
    $data['footer'] = $this->load->controller('common/footer');   
    $this->response->setOutput($this->load->view('extension/payment/instamojo', $data));
  }
  
  private function validate() {      
		if (!$this->user->hasPermission('modify', 'extension/payment/instamojo')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
                 
		if (!$this->request->post['payment_instamojo_checkout_label']) {
			$this->error['payment_instamojo_checkout_label'] = $this->language->get('error_checkout_label');
		}
		if (!$this->request->post['payment_instamojo_client_id']) {
			$this->error['payment_instamojo_client_id'] = $this->language->get('error_client_id');
		}
		if (!$this->request->post['payment_instamojo_client_secret']) {
			$this->error['payment_instamojo_client_secret'] = $this->language->get('error_client_secret');
		}
                
		if (!$this->error) { 
			return true;
		} else {                   
			return false;
		}
	}
       
  
}