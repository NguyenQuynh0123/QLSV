<?php
session_start();
include '../config/connection.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tra cứu điểm sinh viên</title>
</head>
<body>
    <h2>Tra cứu điểm sinh viên</h2>
    <form method="POST" action="">
        <label for="msv">Nhập mã sinh viên (MSV):</label>
        <input type="text" name="msv" id="msv" required>
        <input type="submit" name="submit" value="Tra cứu">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Lấy mã sinh viên từ form
        $msv = $_POST['msv'];

        // Kết nối tới cơ sở dữ liệu
        $conn = new mysqli('localhost', 'root', '', 'qlsv');

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Truy vấn dữ liệu sinh viên dựa trên MSV
        $sql = "SELECT hoTen, monHoa, monToan, monTrietHoc FROM diem WHERE MSV = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $msv); // "i" là kiểu dữ liệu int cho MSV
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Hiển thị thông tin sinh viên
            while ($row = $result->fetch_assoc()) {
                echo "<h3>Thông tin sinh viên:</h3>";
                echo "Họ tên: " . $row['hoTen'] . "<br>";
                echo "Điểm Hóa: " . $row['monHoa'] . "<br>";
                echo "Điểm Toán: " . $row['monToan'] . "<br>";
                echo "Điểm Triết học: " . $row['monTrietHoc'] . "<br>";
            }
        } else {
            echo "Không tìm thấy sinh viên với MSV: " . $msv;
        }

        // Đóng kết nối
        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>