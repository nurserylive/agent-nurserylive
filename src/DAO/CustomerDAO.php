<?php
require_once(SRC_DIR . '/Model/Customer.php');
class CustomerDAO {
	
	/**
	 * This variables holds the filter params 
	 * after being validate and sanatized
	 */
	public $filters = null
	
	public function findAll($filters) {
		// validate these filter, sanatize them and then 
		// prepare sql accordingly
		if (isset($filters['id'])) {

		}
		if (isset($filters['name'])) {

		}
		if (isset($filters['last_order_date'])) {

		}
		if (isset($filters['last_order_status'])) {

		}
		if (isset($filters['last_paid_order_date'])) {

		}
		if (isset($filters['last_paid_order_amount'])) {

		}
		// Data object
		$obj = new Customer();
		// Set sample data to test
		$obj->setEmail('amitinait@gmail.com');
		$obj->setPassword('AAAA');
		return array($obj);
	}
	
}



?>