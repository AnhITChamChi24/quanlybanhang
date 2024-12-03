<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "taologin";

        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result(); 
        if ($result->num_rows > 0) {  
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit;
            } else {
                $error_message = "Sai mật khẩu";
            }
        } else {
            $error_message = "Người dùng không tồn tại!";
        }

        $stmt->close();
        $conn->close();
    } else {
        $error_message= "Vui lòng nhập tên đăng nhập và mật khẩu.";
    }
}
?>

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="cssdangnhap/login.css">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="register.php" method="POST">
                <h1>Đăng kí tài khoản</h1>
                <span>Vui lòng nhập tài khoản và mật khẩu mà bạn muốn đăng kí</span>
                <label for="username">Tên tài khoản:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
                <label for="confirm-password">Nhập lại mật khẩu:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <button>Xác nhận</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="login.php" method="post">
                <h1>Đăng nhập</h1>
                <span>Hãy nhập tài khoản và mật khẩu của bạn</span>
                <input type="text" id="username" name="username" required>
                <input type="password" id="password" name="password" required>
                <div class="remember">
                    <input type="checkbox" id="rememberMe">
                    <label for="rememberMe">Nhớ mật khẩu</label>
                </div>
                <?php if (!empty($error_message)): ?>
                <p class="error-message">
                    <?php echo $error_message; ?>
                </p>
                <?php endif; ?>
                <button>Đăng nhập</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bạn muốn đăng kí tài khoản</h1>
                    <p>Bạn cần phải nhập tài khoản và nhập mật khẩu sau đó nhập lại mật khẩu lần nữa</p>
                    <button class="hidden" id="login">Quay lại đăng nhập</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Xin chào</h1>
                    <p>Chào mừng bạn đến với cửa hàng trực tuyến của chúnng tôi.</p>
                    <p>Bấm vào đây nếu bạn chưa có tài khoản</p>
                    <button class="hidden" id="register">Đăng kí tài khoản</button>
                </div>
                 <?php if (!empty($register_message)): ?>
                    <p class="<?php echo strpos($register_message, 'thành công') !== false ? 'register-message' : 'error-message'; ?>">
                    <?php echo $register_message; ?>
                    </p>
                    <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="assets/js/login.js"></script>
</body>

</html>