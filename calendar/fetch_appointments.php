<?php
header('Content-Type: application/json');
include 'db_connection.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Assuming you pass the start and end dates from FullCalendar to this script:
    $startDate = $_GET['start'];  // YYYY-MM-DD format
    $endDate = $_GET['end'];      // YYYY-MM-DD format

    // Fetch the number of appointments per date in the range
    $query = "SELECT DATE(appointment_time) as appointment_date, COUNT(*) as count
              FROM appointments
              WHERE status = 'confirmed' AND DATE(appointment_time) BETWEEN ? AND ?
              GROUP BY DATE(appointment_time)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$startDate, $endDate]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Create a map of dates to appointment counts
    $appointmentsMap = [];
    foreach ($results as $row) {
        $appointmentsMap[$row['appointment_date']] = (int)$row['count'];
    }

    $events = array();
    $period = new DatePeriod(
        new DateTime($startDate),
        new DateInterval('P1D'),
        new DateTime($endDate)
    );

    // Create events for each date in the period
    foreach ($period as $date) {
        $dateStr = $date->format('Y-m-d');
        $count = isset($appointmentsMap[$dateStr]) ? $appointmentsMap[$dateStr] : 0;
        $availableSlots = max(0, 5 - $count);

        $e = array();
        $e['title'] = "Available slots: " . $availableSlots;
        $e['start'] = $dateStr;
        $e['allDay'] = true;

        array_push($events, $e);
    }

    echo json_encode($events);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
