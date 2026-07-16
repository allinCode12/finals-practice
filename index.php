<?php
include_once("config.php");
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Homepage</title>
    <style>
        a {
            display: block;
            margin-bottom: .5rem;
            font-size: 1.5rem;
        }

        table {
            border-collapse: collapse;
            width: 900px;
        }

        th {
            text-align: left;
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <h2>Student Management</h2>

    <div style="margin-bottom: 2rem;">
        <a href="add.html">Add Student</a>
        <a href="search.php">Search for students</a>
        <a href="reviewer.html" style="color: #4f46e5; font-weight: bold;">📚 Open Physics 1 Finals Cram Reviewer</a>
    </div>

    <table>
        <tbody>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
            </tr>

            <?php
            while ($res = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo '<td>' . $res['id'] . '</td>';
                echo '<td>' . $res['name'] . '</td>';
                echo '<td>' . $res['age'] . '</td>';
                echo '<td style="width: 30%;">' . $res['email'] . '</td>';
                echo "<td><a style='font-size: 1rem; display: inline;' href='edit.php?id=" . $res['id'] . "'>Edit</a> | <a style='font-size: 1rem; display: inline;' href='delete.php?id=" . $res['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>z


</body>

</html>