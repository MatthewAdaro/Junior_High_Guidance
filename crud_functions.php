<?php
include_once 'db_connection.php'; // Include your database connection file

// Create a new offense
function createOffense($student_name, $school_year, $reason, $date, $status, $offense_level, $is_active) {
    global $conn;
    $sql = "INSERT INTO guidance_offense (student_name, school_year, reason, date, status, offense_level, is_active) 
            VALUES ('$student_name', '$school_year', '$reason', '$date', '$status', '$offense_level', '$is_active')";
    
    if ($conn->query($sql) === TRUE) {
        return true; // Success
    } else {
        return false; // Error
    }
}

// Read all offenses
function getAllOffenses() {
    global $conn;
    $sql = "SELECT * FROM guidance_offense";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $offenses = [];
        while ($row = $result->fetch_assoc()) {
            $offenses[] = $row;
        }
        return $offenses;
    } else {
        return []; // No offenses found
    }
}

// Read a specific offense by ID
function getOffenseById($offense_id) {
    global $conn;
    $sql = "SELECT * FROM guidance_offense WHERE offense_id = $offense_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        return null; // Offense not found
    }
}

// Update an offense
function updateOffense($offense_id, $student_name, $school_year, $reason, $date, $status, $offense_level, $is_active) {
    global $conn;
    $sql = "UPDATE guidance_offense 
            SET student_name = '$student_name', school_year = '$school_year', reason = '$reason', 
                date = '$date', status = '$status', offense_level = '$offense_level', is_active = '$is_active'
            WHERE offense_id = $offense_id";
    
    if ($conn->query($sql) === TRUE) {
        return true; // Success
    } else {
        return false; // Error
    }
}

// Delete an offense
function deleteOffense($offense_id) {
    global $conn;
    $sql = "DELETE FROM guidance_offense WHERE offense_id = $offense_id";
    
    if ($conn->query($sql) === TRUE) {
        return true; // Success
    } else {
        return false; // Error
    }
}

// Example usage:
// createOffense('John Doe', '2022-2023', 'Disruptive behavior', '2023-01-15', 'Pending', 'High', true);
// $allOffenses = getAllOffenses();
// $offenseById = getOffenseById(1);
// updateOffense(1, 'Updated Name', '2022-2023', 'Updated Reason', '2023-01-15', 'Completed', 'Low', false);
// deleteOffense(1);

$conn->close();
?>