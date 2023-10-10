<?php
declare(strict_types=1);

namespace App\Models\Repositories;

use App\Core\AbstractRepository;
use App\Models\User;
use PDO;

class UserRepository extends AbstractRepository
{
    public const TABLE_NAME = 'users';

    public function saveUser(User $user): void
    {
        $sql = "INSERT INTO ".self::TABLE_NAME." (first_name, last_name, email, mobile, password) 
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

    public function getUserByEmail(string $email): User
    {
        $query = "SELECT * FROM ".self::TABLE_NAME." where email=:email limit 1"; // Replace with your table name
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return new User(
            $result['first_name'],
            $result['last_name'],
            $result['email'],
            $result['mobile'],
            $result['password']
        );
    }
}