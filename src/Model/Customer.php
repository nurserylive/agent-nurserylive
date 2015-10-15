<?php
require_once(SRC_DIR . '/Model.php');
/**
 * @Entity
 * @Table(name="user")
 */
class Customer extends Model
{
    /**
     * @Column(type="string", length=255)
     * @var string
     */
    protected $email;

    /**
     * @Column(type="string", length=32)
     * @var string
     */
    protected $password;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = md5($password);
    }
}
?>
