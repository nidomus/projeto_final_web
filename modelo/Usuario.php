<?php
class Usuario
{
    private $name;
    private $email;
    private $password;
    private $foto;

    public function __construct($name, $email, $password, $foto)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = md5($password);
        $this->foto = $foto;
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