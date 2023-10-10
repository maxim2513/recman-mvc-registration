<?php
declare(strict_types=1);

namespace App\Models\Repositories;

use App\Core\AbstractRepository;
use App\Models\User;

class UserRepository extends AbstractRepository
{
    public const TABLE_NAME = 'users';

    public function saveUser(User $user): void
    {
        $sql = "INSERT INTO users (first_name, last_name, email, mobile, password) 
        VALUES (:firstName, :lastName, :email, :mobile, :password)";

        $statement = $this->connection->prepare($sql);

        $firstName = $user->getFirstName();
        $statement->bindParam(':firstName', $firstName);
        $lastName = $user->getLastName();
        $statement->bindParam(':lastName', $lastName);
        $email = $user->getEmail();
        $statement->bindParam(':email', $email);
        $mobile = $user->getMobile();
        $statement->bindParam(':mobile', $mobile);
        $password = $user->getHashPassword();
        $statement->bindParam(':password', $password);

        // Execute the prepared statement to insert the data
        $statement->execute();
    }
}