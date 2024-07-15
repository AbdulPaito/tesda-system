<?php
require_once('database.php'); // Make sure this file includes your database connection

// Perform query
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

// Check if query execution was successful
if (!$result) {
    die("Database query failed."); // Handle the error appropriately
}
?>

<section id="settings-section">
    <h1>Settings</h1>
    <table class="settings-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $counter++; ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['password']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><a class="edit-button" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a class="delete-button" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</section>

<?php
// More PHP code here if needed
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    #settings-section {
        width: 80%;
        margin: 20px auto;
        background: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    #settings-section h1 {
        text-align: center;
        background: #4CAF50;
        color: #fff;
        padding: 20px 0;
        margin: 0;
    }

    .settings-table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .settings-table th, .settings-table td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    .settings-table th {
        background: #f4f4f9;
    }

    .settings-table tr:nth-child(even) {
        background: #f9f9f9;
    }

    .settings-table tr:hover {
        background: #f1f1f1;
    }

    .edit-button, .delete-button {
        display: inline-block;
        padding: 10px 15px;
        text-decoration: none;
        border-radius: 5px;
    }

    .edit-button {
        background: #007bff;
        color: #fff;
    }

    .edit-button:hover {
        background: #45a049;
    }

    .delete-button {
        background: #f44336;
        color: #fff;
    }

    .delete-button:hover {
        background: #e53935;
    }
</style>
