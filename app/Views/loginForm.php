<?php
declare(strict_types=1);
/** @var array $params */
?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
                <?php if (isset($params['errors'])) { ?>
                <?php foreach ($params['errors'] as $error) { ?>
                <div class="alert alert-danger" role="alert"><?= $error ?></div>
                <?php } ?>
                <?php } ?>
                <form action="/login" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
