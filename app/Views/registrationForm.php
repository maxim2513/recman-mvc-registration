<?php
declare(strict_types=1);
/** @var array $params */
?>
<h2>Registration Form</h2>
<form action="/registration" method="post">
    <?php if (isset($params['errors'])) { ?>
        <div class="alert alert-danger">
            Please correct the following errors:
            <ul>
                <?php foreach ($params['errors'] as $error) { ?>
                    <li><?=$error ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" name="firstName" placeholder="First Name">
        </div>
        <div class="form-group col-md-6">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" name="lastName" placeholder="Last Name">
        </div>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" placeholder="E-mail">
    </div>
    <div class="form-group">
        <label for="mobile">Mobile Phone</label>
        <input type="tel" class="form-control" name="mobile" placeholder="Mobile Phone">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
