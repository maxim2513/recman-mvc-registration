<?php
declare(strict_types=1);
/** @var array $params */
/** @var \App\Models\User $user */
$user = $params['user'];
?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">User Information</div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>First Name:</strong> <?=$user->getFirstName() ?></li>
                    <li class="list-group-item"><strong>Last Name:</strong> <?=$user->getLastName() ?></li>
                    <li class="list-group-item"><strong>Email:</strong> <?=$user->getEmail() ?></li>
                    <li class="list-group-item"><strong>Mobile:</strong> <?=$user->getMobile() ?></li>
                </ul>
            </div>
            <div class="card-footer">
                <form action="/logout" method="POST">
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>