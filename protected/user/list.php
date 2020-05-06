<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] <= 0) : ?>
    <?php header('Location: index.php'); ?>
<?php else: ?>
    <?php
    $query = "SELECT username, email, permission FROM users";
    require_once DATABASE_CONTROLLER;
    $users = getList($query);
    ?>
    <div class="main-container">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Permission</th>
                </tr>
            </thead>
            <tbody>
                <?php $I=0; ?>
                <?php foreach ($users as $u): ?>
                    <?php $I++; ?>
                    <tr>
                        <th scope="row"><?=$I;?></th>
                        <td><?=$u['username'];?></td>
                        <td><?=$u['email'];?></td>
                        <td><?=$u['permission'];?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>