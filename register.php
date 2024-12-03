<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "taologin";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$register_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if ($new_password === $confirm_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $new_username, $hashed_password);

        if ($stmt->execute()) {
            $register_message = "Đăng ký thành công!";
        } else {
            $register_message = "Lỗi: Không thể đăng ký. " . $stmt->error;
        }

        $stmt->close();
    } else {
        $register_message = "Mật khẩu và xác nhận mật khẩu không khớp!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="cssdangnhap/style.css">
    <style>
        .register-message {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }
        .error-message {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="register-container">
    <?php if (!empty($register_message)): ?>
        <p class="<?php echo strpos($register_message, 'thành công') !== false ? 'register-message' : 'error-message'; ?>">
            <?php echo $register_message; ?>
        </p>
    <?php endif; ?>
</div>
</body>
</html>
