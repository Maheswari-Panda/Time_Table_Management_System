<?php
include("../includes/connect.php");

if (isset($_POST['subject_type']) && isset($_POST['department_id'])) {
    $subjectType = $_POST['subject_type'];
    $departmentId = $_POST['department_id'];

    // Fetch department timing, assuming the department has start and end times
    $query = "SELECT Time_Slot_From, Time_Slot_To FROM department_time WHERE Department_Id = $departmentId";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $startTime = new DateTime($row['Time_Slot_From']);
        $endTime = new DateTime($row['Time_Slot_To']);
        
        // Determine the slot duration
        $duration = 60; // Default to 1 hour for lectures
        if ($subjectType == 'lab' || $subjectType == 'tutorial') {
            $duration = 120; // 2 hours for lab/tutorial
        }

        // Generate time slots based on the duration
        $timeSlots = [];
        while ($startTime < $endTime) {
            $slotStart = $startTime->format('H:i');
            $slotEnd = $startTime->add(new DateInterval("PT{$duration}M"))->format('H:i');
            if ($startTime <= $endTime) {
                $timeSlots[] = [
                    'value' => $slotStart . '-' . $slotEnd,
                    'text' => $slotStart . ' - ' . $slotEnd
                ];
            }
        }

        // Return JSON response
        echo json_encode($timeSlots);
    }
}
?>
