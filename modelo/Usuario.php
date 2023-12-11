<?php
class Usuario
{   
    private $id;
    private $name;
    private $email;
    private $password;
    private $foto;

    public function __construct($id, $name, $email, $password, $foto)
    {   
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = md5($password);
        $this->foto = $foto;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword($password)
    {
        $hash = $this->password;
        $isValid = password_verify($password, $hash);
        return $isValid;
    }
}
?>