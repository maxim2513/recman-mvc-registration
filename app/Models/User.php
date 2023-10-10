<?php
declare(strict_types=1);

namespace App\Models;

class User
{
    public function __construct(
        readonly private string $firstName,
        readonly private string $lastName,
        readonly private string $email,
        readonly private string $mobile,
        private string $password = '',
    ) {
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getMobile(): string
    {
        return $this->mobile;
    }

    public function getHashPassword(): string
    {
        return $this->password;
    }

    public function validate():array{
        $errors = [];

        if (empty($this->firstName)) {
            $errors[] = "First Name is required.";
        }

        if (empty($this->lastName)) {
            $errors[] = "Last Name is required.";
        }

        if (empty($this->email)) {
            $errors[] = "E-mail is required.";
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "E-mail is not valid.";
        }

        if (empty($this->mobile)) {
            $errors[] = "Mobile Phone is required.";
        }

        if (empty($this->password)) {
            $errors[] = "Password is required.";
        }

        return  $errors;
    }

    public function setHashPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}
