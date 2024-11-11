<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings List</title>
    <style>
        /* General Reset and Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f9f9f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Header Styling */
        h1 {
            color: #4e54c8;
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            max-width: 1100px;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 1rem;
        }

        th {
            background-color: #4e54c8;
            color: #fff;
            font-weight: bold;
        }

        td {
            background-color: #fff;
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        tr:hover td {
            background-color: #e6e6e6;
        }

        /* Status Badge Styling */
        .status {
            display: inline-block;
            padding: 5px 10px;
            font-weight: bold;
            border-radius: 5px;
        }

        .status.active {
            background-color: #4caf50;
            color: #fff;
        }

        .status.pending {
            background-color: #ffa500;
            color: #fff;
        }

        .status.cancelled {
            background-color: #f44336;
            color: #fff;
        }

        /* Responsive Design for Smaller Screens */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            table {
                width: 100%;
                margin-top: 10px;
                font-size: 0.9rem;
            }

            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>

    <div>
        <h1>Bookings List</h1>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>User ID</th>
                    <th>Tour ID</th>
                    <th>Participants</th>
                    <th>Booking Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?= $booking['booking_id'] ?></td>
                        <td><?= $booking['user_id'] ?></td>
                        <td><?= $booking['tour_id'] ?></td>
                        <td><?= $booking['participants'] ?></td>
                        <td><?= $booking['booking_date'] ?></td>
                        <td>
                            <span class="status <?= strtolower($booking['status']) ?>">
                                <?= htmlspecialchars($booking['status']) ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
