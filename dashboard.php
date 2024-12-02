<?php
session_start();
include('db/db_config.php');
include('includes/header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

$sql = "SELECT * FROM cases WHERE case_name LIKE '%$search%' OR case_id LIKE '%$search%'";
$result = $conn->query($sql);
?>

<h2>Dashboard</h2>

<form method="post" action="">
    <label for="search">Search Case:</label>
    <input type="text" id="search" name="search" value="<?php echo $search; ?>" required>
    <button type="submit" name="search_btn">Search</button>
</form>

<h3>Case List</h3>
<table>
    <tr>
        <th>Case ID</th>
        <th>Case Name</th>
        <th>Case Date</th>
        <th>Action</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['case_id']; ?></td>
        <td><?php echo $row['case_name']; ?></td>
        <td><?php echo $row['case_date']; ?></td>
        <td><a href="view_case.php?case_id=<?php echo $row['case_id']; ?>">View</a></td>
    </tr>
    <?php } ?>
</table>

<?php include('includes/footer.php'); ?>
