<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo Lists APP</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">📋 ToDo lists APP</a>
            <div class="ms-auto">
                <a href="index.php" class="btn btn-light btn-sm text-primary fw-semibold me-2">Home</a>
                <a href="add.php" class="btn btn-light btn-sm text-primary fw-semibold">+ Add Task</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Task List Card -->
        <div class="card shadow border-0">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
                <h4 class="mb-0">Task List</h4>
                <a href="add.php" class="btn btn-primary btn-sm">+ Add New Task</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" style="width: 8%;">#</th>
                                <th scope="col" style="width: 42%;">Title</th>
                                <th scope="col" style="width: 20%;">Due Date</th>
                                <th scope="col" style="width: 15%;">Status</th>
                                <th scope="col" style="width: 15%;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'database.php';
                            $sql = "SELECT * FROM tasks";
                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) {
                                $serial = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $due_date = $row['due_date'];
                                    $status = $row['status'];
                                    
                                    // Status badge color logic
                                    $badgeClass = ($status == 'Completed') ? 'bg-success' : 'bg-warning text-dark';
                            ?>
                            <tr>
                                <td><?php echo $serial++; ?></td>
                                <td><?php echo htmlspecialchars($title); ?></td>
                                <td><?php echo htmlspecialchars($due_date); ?></td>
                                <td><span class="badge <?php echo $badgeClass; ?>"><?php echo htmlspecialchars($status); ?></span></td>
                                <td class="text-center">
                                    <a href="edit.php?id=<?php echo $id; ?>" class="btn btn-warning btn-sm text-white px-2 py-1">Edit</a>
                                    <a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm px-2 py-1" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                                </td>
                            </tr>
                            <?php
                                }
                            } else {
                                echo '<tr><td colspan="5" class="text-center py-4 text-muted">No tasks found. Click "+ Add New Task" to create one!</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>