<?php
    if (isset($_GET['date'])) {
        $selectedDate = $_GET['date'];
        $currentDateTime = new DateTime("now", new DateTimeZone('+08:00'));
        $todayDate = $currentDateTime->format('Y-m-d');
        $currentTime = $currentDateTime->format('H:i:s');

        $dbc = mysqli_connect("localhost", "root", "", "sport");
        mysqli_query($dbc, "SET time_zone = '+08:00'"); 

        $stmt = $dbc->prepare("SELECT * FROM timeslot WHERE startDate <= ? AND endDate >= ? ORDER BY startTime");
        $stmt->bind_param("ss", $selectedDate, $selectedDate);
        $stmt->execute();

        $courtTimeSlot = $stmt->get_result();

        echo '<table class="table">';
        echo '<thead><tr><th>Time Slot</th></tr></thead>';
        echo '<tbody>';

        while ($row = $courtTimeSlot->fetch_assoc()) {
            $startTime = new DateTime($row['startTime']);
            $endTime = new DateTime($row['endTime']);

            if ($selectedDate == $todayDate && $startTime->format('H:i:s') < $currentTime) {
                continue;
            }

            $timeSlotRange = $startTime->format('H:i') . ' - ' .  $endTime->format('H:i');

            echo '<tr>';
            echo '<td class="court-timeslot" data-time="' . $timeSlotRange . '" data-price="' . $row["pricing"] . '" onclick="updateInputFields(this)">';
            echo $timeSlotRange;
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }
?>
