<?php
require_once(SRC_DIR . '/Service.php');
require_once(SRC_DIR . '/DAO/CustomerDAO.php');

class CustomerService extends Service {

    /**
     * @return array|null
     */
    public function getCustomers($filter = null) {
		
        $dao = new CustomerDAO();
        $customers = $dao->findAll($filter);

        if (empty($customers)) {
            return null;
        }

        $data = array();
        foreach ($customers as $customer)
        {
            $data[] = array(
                'id' => $customer->getId(),
                'created' => $customer->getCreated(),
                'updated' => $customer->getUpdated(),
                'email' => $customer->getEmail(),
            );
        }

        return $data;
    }

    /**
     * @param $email
     * @param $password
     * @return array
     */
    public function createUser($email, $password)
    {
        /**$user = new UserEntity();
        $user->setEmail($email);
        $user->setPassword($password);

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        return array(
            'id' => $user->getId(),
            'created' => $user->getCreated(),
            'updated' => $user->getUpdated(),
            'email' => $user->getEmail()
        );*/
    }

    /**
     * @param $id
     * @param $email
     * @param $password
     * @return array|null
     */
    public function updateUser($id, $email, $password)
    {
        /**
         * @var \App\Entity\User $user
         */
        /**$repository = $this->getEntityManager()->getRepository('App\Entity\User');
        $user = $repository->find($id);

        if ($user === null) {
            return null;
        }

        $user->setEmail($email);
        $user->setPassword($password);
        $user->setUpdated(new \DateTime());

        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();

        return array(
            'id' => $user->getId(),
            'created' => $user->getCreated(),
            'updated' => $user->getUpdated(),
            'email' => $user->getEmail()
        );*/
    }

    public function deleteUser($id)
    {
        /**
         * @var \App\Entity\User $user
         */
        /**$repository = $this->getEntityManager()->getRepository('App\Entity\User');
        $user = $repository->find($id);

        if ($user === null) {
            return false;
        }

        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();

        return true;*/
    }

}
?>
