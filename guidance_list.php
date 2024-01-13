<?php
include_once 'crud_functions.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create"])) {
        $student_name = $_POST["student_name"];
        $school_year = $_POST["school_year"];
        $reason = $_POST["reason"];
        $date = $_POST["date"];
        $status = $_POST["status"];
        $offense_level = $_POST["offense_level"];
        $is_active = isset($_POST["is_active"]) ? 1 : 0;

        createOffense($student_name, $school_year, $reason, $date, $status, $offense_level, $is_active);
    } elseif (isset($_POST["update"])) {
        $offense_id = $_POST["offense_id"];
        $student_name = $_POST["student_name"];
        $school_year = $_POST["school_year"];
        $reason = $_POST["reason"];
        $date = $_POST["date"];
        $status = $_POST["status"];
        $offense_level = $_POST["offense_level"];
        $is_active = isset($_POST["is_active"]) ? 1 : 0;

        updateOffense($offense_id, $student_name, $school_year, $reason, $date, $status, $offense_level, $is_active);
    } elseif (isset($_POST["delete"])) {
        $offense_id = $_POST["delete"];
        deleteOffense($offense_id);
    }
}

$allOffenses = getAllOffenses();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guidance Offenses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Guidance Offenses</h2>

    <form action="your_current_page.php" method="post" class="mb-3">
    <label for="student_name" class="form-label">Student Name:</label>
    <input type="text" class="form-control" name="student_name" required>

    <label for="school_year" class="form-label">School Year:</label>
    <input type="text" class="form-control" name="school_year" required>

    <label for="reason" class="form-label">Reason:</label>
    <textarea class="form-control" name="reason" rows="3" required></textarea>

    <label for="date" class="form-label">Date:</label>
    <input type="date" class="form-control" name="date" required>

    <label for="status" class="form-label">Status:</label>
    <select class="form-select" name="status" required>
        <option value="Pending">Pending</option>
        <option value="Completed">Completed</option>
    </select>

    <label for="offense_level" class="form-label">Offense Level:</label>
    <input type="text" class="form-control" name="offense_level" min=1 max=4 required>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_active" id="is_active">
        <label class="form-check-label" for="is_active">Is Active</label>
    </div>

    <button type="submit" class="btn btn-primary mt-2" name="create">Create New Offense</button>
</form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>School Year</th>
                <th>Reason</th>
                <th>Date</th>
                <th>Status</th>
                <th>Offense Level</th>
                <th>Is Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allOffenses as $offense): ?>
                <tr>
                    <td><?php echo $offense['offense_id']; ?></td>
                    <td><?php echo $offense['student_name']; ?></td>
                    <td><?php echo $offense['school_year']; ?></td>
                    <td><?php echo $offense['reason']; ?></td>
                    <td><?php echo $offense['date']; ?></td>
                    <td><?php echo $offense['status']; ?></td>
                    <td><?php echo $offense['offense_level']; ?></td>
                    <td><?php echo $offense['is_active'] ? 'Yes' : 'No'; ?></td>
                    <td>
                        <form action="your_current_page.php" method="post" style="display: inline;">
                            <input type="hidden" name="offense_id" value="<?php echo $offense['offense_id']; ?>">
                            <button type="submit" class="btn btn-warning btn-sm" name="update">Update</button>
                        </form>
                        <form action="your_current_page.php" method="post" style="display: inline;">
                            <input type="hidden" name="delete" value="<?php echo $offense['offense_id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>