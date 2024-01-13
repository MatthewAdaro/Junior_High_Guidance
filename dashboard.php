<?php
include_once 'db_connection.php'; 


session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); 
    exit();
}
function getTotalOffensesByStatus($status) {
    global $conn;
    $sql = "SELECT COUNT(*) AS total FROM guidance_offense WHERE status = '$status'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}


$totalPending = getTotalOffensesByStatus('Pending');
$totalCompleted = getTotalOffensesByStatus('Completed');


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row">
   
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="guidance_list.php">
                            Guidance List
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Dashboard
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Pending Offenses</h5>
                                        <p class="card-text"><?php echo $totalPending; ?></p>
                                    </div>
                                </div>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Completed Offenses</h5>
                                        <p class="card-text"><?php echo $totalCompleted; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>