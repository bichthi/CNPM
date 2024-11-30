<?php 
include('authentication.php');
$page_title = "Admin Dashboard";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <h4>Manage Users</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('dbcon.php');
                $query = "SELECT * FROM users";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $user) {
                        ?>
                        <tr>
                            <td><?= $user['id']; ?></td>
                            <td><?= $user['name']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td>
                                <?php
                                if ($user['role'] == 0) {
                                    echo "User";
                                } elseif ($user['role'] == 1) {
                                    echo "Seller";
                                } elseif ($user['role'] == 2) {
                                    echo "Admin";
                                }
                                ?>
                            </td>
                            <td>
                                <form action="code.php" method="POST" class="d-inline">
                                    <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                    <button type="submit" name="update_to_seller" class="btn btn-success btn-sm">Make Seller</button>
                                </form>
                                <form action="code.php" method="POST" class="d-inline">
                                    <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                    <button type="submit" name="update_to_user" class="btn btn-warning btn-sm">Make User</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
if (isset($_SESSION['status'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['status'] . "</div>";
    unset($_SESSION['status']);
}
?>

