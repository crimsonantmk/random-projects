<?php
require_once 'connect.php';

// Fetch appointments
$sql = "SELECT * FROM appointments ORDER BY appointment_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Appointments List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f0ff;
            color: #003366;
            padding: 20px;
        }

        .container {
            max-width: 90%;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 51, 102, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #003366;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #b3d1ff;
        }

        th {
            background-color: #0052cc;
            color: white;
        }

        tr:hover {
            background-color: #f2f9ff;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            color: #666666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>All Appointments</h2>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Patient ID</th>
                        <th>Provider ID</th>
                        <th>Appointment Date</th>
                        <th>Status</th>
                        <th>Notes</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['patient_id']) ?></td>
                            <td><?= htmlspecialchars($row['provider_id']) ?></td>
                            <td><?= htmlspecialchars($row['appointment_date']) ?></td>
                            <td><?= htmlspecialchars($row['status']) ?></td>
                            <td><?= nl2br(htmlspecialchars($row['notes'])) ?></td>
                            <td><?= htmlspecialchars($row['created_at']) ?></td>
                            <td><?= htmlspecialchars($row['updated_at']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">No appointments found.</p>
        <?php endif; ?>

    </div>
</body>

</html>

<?php
$conn->close();
?>