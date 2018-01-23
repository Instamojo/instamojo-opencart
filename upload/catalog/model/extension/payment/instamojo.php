<?php
class ModelExtensionPaymentInstamojo extends Model {
  public function getMethod($address, $total) {
    $this->load->language('payment/instamojo');
    $this->load->model('setting/setting');

    $checkout_label = $this->config->get('payment_instamojo_checkout_label'); 
    $method_data = array(
      'code'     => 'instamojo',
      'title'    =>  !empty($checkout_label) ? $checkout_label : $this->language->get('text_title'),
      'terms'      => '',
      'sort_order' => $this->config->get('instamojo_sort_order')
    );
  
    return $method_data;
  }
}