<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Task - Task Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">📋 Task Management System</a>
            <div class="ms-auto">
                <a href="index.php" class="btn btn-light btn-sm text-primary fw-semibold">Home</a>
            </div>
        </div>
    </nav>

    <?php
    include 'database.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $due_date = $row['due_date'];
        $status = $row['status'];
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-header bg-dark text-white py-3">
                        <h4 class="mb-0">Edit Task</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="editaction.php" method="post" autocomplete="off">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Task Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="due_date" class="form-label fw-semibold">Due Date</label>
                                <input type="date" class="form-control" id="due_date" name="due_date" value="<?php echo htmlspecialchars($due_date); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label fw-semibold">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="Pending" <?php if($status == 'Pending') echo 'selected'; ?>>Pending</option>
                                    <option value="Completed" <?php if($status == 'Completed') echo 'selected'; ?>>Completed</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="index.php" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success">Update Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>