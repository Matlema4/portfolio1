<?php
include 'db.php';

// Update contact details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("UPDATE contact_details SET phone = ?, email = ? WHERE id = 1");
    $stmt->execute([$phone, $email]);
    $message = "Contact details updated successfully!";
}

// Fetch current contact details
$stmt = $pdo->query("SELECT * FROM contact_details WHERE id = 1");
$contact = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Update Contact Details</title>
</head>
<body>
    <div class="container">
        <h2>Update Contact Details</h2>
        <?php if (isset($message)) echo "<p>$message</p>"; ?>
        <form method="POST" action="">
            <input type="text" name="phone" placeholder="Phone Number" value="<?= htmlspecialchars($contact['phone']) ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($contact['email']) ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
