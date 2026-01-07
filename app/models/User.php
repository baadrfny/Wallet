<?php

class User
{
    public ?int $id = null;
    public string $name;
    public string $email;
    public string $password_hash;
    public string $created_at;

    public function __construct($name = '', $email = '', $password_hash = '')
    {
        $this->name = $name;
        $this->email = $email;
        $this->password_hash = $password_hash;
    }
}
