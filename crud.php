<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiiie";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// CREATE
if (isset($_POST['create'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
if ($conn->query($sql) === TRUE) {
echo "New record created successfully<br>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}
// READ
function fetchUsers($conn) {
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>";
while($row = $result->fetch_assoc()) {
echo "<tr>
<td>{$row['id']}</td>
<td>{$row['name']}</td>
<td>{$row['email']}</td>
<td>
<a href='?edit={$row['id']}'>Edit</a> |
<a href='?delete={$row['id']}'>Delete</a>
</td>
</tr>";
}
echo "</table>";
} else {
echo "0 results";
}
}
// UPDATE
if (isset($_POST['update'])) {
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
echo "Record updated successfully<br>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}
// DELETE
if (isset($_GET['delete'])) {
$id = $_GET['delete'];
$sql = "DELETE FROM users WHERE id=$id";
if ($conn->query($sql) === TRUE) {
echo "Record deleted successfully<br>";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}
// Handling edit for update
if (isset($_GET['edit'])) {
$id = $_GET['edit'];
$sql = "SELECT * FROM users WHERE id=$id";
$result =
$conn->query($sql); if
($result->num_rows > 0) {
$row =
$result->fetch_assoc(); echo
"<h3>Edit User</h3>
<form method='POST'>
<input type='hidden' name='id' value='{$row['id']}'>
Name: <input type='text' name='name' value='{$row['name']}'><br>
Email: <input type='email' name='email' value='{$row['email']}'><br>
<input type='submit' name='update' value='Update'>
</form>";
}
}
// Display all users
fetchUsers($conn);
// Display Create form
echo "<h3>Create New User</h3>
<form method='POST'>
Name: <input type='text' name='name' required><br>
Email: <input type='email' name='email' required><br>
<input type='submit' name='create' value='Create'>
</form>";
// Close connection
$conn->close();
?>