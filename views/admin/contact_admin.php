<!-- views/admin/contact_admin.php -->
<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use Model\Contact;

$contactModel = new Contact();
$contacts = $contactModel->getAll();

$status = "Contact";

if(isset($_GET['delete_id'])){
    $contactModel->delete($_GET['delete_id']);
    $_SESSION['success'] = "Message deleted successfully!";
    header("Location: admin_index.php?page=contact");
;
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Contact Messages</title>
    <link rel="stylesheet" href="assets/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/admin/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Sidebar -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Contact Messages</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php if(isset($_SESSION['success'])): ?>
                    <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                    <?php endif; ?>

                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title">All Messages</h3>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($contacts as $c): ?>
                                    <tr>
                                        <td><?= $c['id'] ?></td>
                                        <td><?= $c['user_name'] ?? 'Guest' ?></td>
                                        <td><?= htmlspecialchars($c['name']) ?></td>
                                        <td><?= htmlspecialchars($c['email']) ?></td>
                                        <td><?= htmlspecialchars($c['message']) ?></td>
                                        <td><?= $c['created_at'] ?></td>
                                        <td>
                                            <a href="admin_index.php?page=delete_contact&id=<?= $c['id'] ?>" class="btn btn-sm btn-danger">
                                                Delete
                                            </a>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer text-center">
            <strong>&copy; <?= date('Y') ?> My Admin Panel</strong>
        </footer>
    </div>

    <script src="assets/admin/plugins/jquery/jquery.min.js"></script>
    <script src="assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/admin/dist/js/adminlte.min.js"></script>
</body>

</html>