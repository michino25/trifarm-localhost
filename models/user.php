<?php
class Category
{
    private $id;
    private $username;
    private $password;
    private $fullname;
    private $note;

    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function __construct($id, $username, $password, $fullname)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
    }

    public function __toString()
    {
        return "$this->fullname";
    }
}
