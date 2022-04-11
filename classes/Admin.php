<?php


class Admin
{


    protected $id;
    protected $admin;
    protected $password;

    /* CONSTRUCT */

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    /* HYDRATE */

    public function hydrate($donnees)
    {
        foreach ($donnees as $key => $value) {

            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
