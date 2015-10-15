<?php

require_once(SRC_DIR . '/Service/CustomerService.php');
require_once(SRC_DIR . '/Resource.php');

class CustomerResource extends Resource {
    /**
     * @var CustomerService
     */
    private $customerService;

    /**
     * Get customer service
     */
    public function init()
    {
        $this->setCustomerService(new CustomerService());
    }

    /**
     * @param null $id
     */
    public function get($id = null) {
        if ($id === null) {
            $data = $this->getCustomerService()->getCustomers();
        } else {
			$filters['id'] = $id;
            $data = $this->getCustomerService()->getCustomers($filters);
        }

        if ($data === null) {
            self::response(self::STATUS_NOT_FOUND);
            return;
        }

        $response = array('customer' => $data);
        self::response(self::STATUS_OK, $response);
    }

    /**
     * Create customer
     */
    public function post()
    {
        $email = $this->getSlim()->request()->params('email');
        $password = $this->getSlim()->request()->params('password');

        if (empty($email) || empty($password) || $email === null || $password === null) {
            self::response(self::STATUS_BAD_REQUEST);
            return;
        }

        $customer = $this->getCustomerService()->createCustomer($email, $password);

        self::response(self::STATUS_CREATED, array('customer', $customer));
    }

    /**
     * Update customer
     */
    public function put($id)
    {
        $email = $this->getSlim()->request()->params('email');
        $password = $this->getSlim()->request()->params('password');

        if (empty($email) && empty($password) || $email === null && $password === null) {
            self::response(self::STATUS_BAD_REQUEST);
            return;
        }

        $customer = $this->getCustomerService()->updateCustomer($id, $email, $password);

        if ($customer === null) {
            self::response(self::STATUS_NOT_IMPLEMENTED);
            return;
        }

        self::response(self::STATUS_NO_CONTENT);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $status = $this->getCustomerService()->deleteCustomer($id);

        if ($status === false) {
            self::response(self::STATUS_NOT_FOUND);
            return;
        }

        self::response(self::STATUS_OK);
    }

    /**
     * Show options in header
     */
    public function options()
    {
        self::response(self::STATUS_OK, array(), array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'));
    }

    /**
     * @return \Service\Customer
     */
    public function getCustomerService()
    {
        return $this->customerService;
    }

    /**
     * @param \Service\Customer $customerService
     */
    public function setCustomerService($customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }
}
?>
