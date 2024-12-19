<?php
$today = date("d-m-Y");
session_start();
// Tạo đơn hàng
$sever = "localhost";
$user = "root";
$pass = "";
$database = "wedcuatoi";

$conn = new mysqLi($sever, $user, $pass, $database);
if ($conn != null) {
    mysqLi_query($conn, "SET NAMES'utf8'");
} else {
    echo "Kết nối không thành công";
}
//Các biến
$trivot = $_GET['trivot'];
$today = date("d-m-Y");
$user = $_SESSION['user'];
$id_sanPham = $_GET['id_sanPham'];
$phienBan = $_GET['phienBan'];
$mau = $_GET['mau'];
$soLuong = $_GET['soLuong'];
$tongGiaTri = $_GET['tongGiaTri'];

$sql = "INSERT INTO donhang (user, ngayTaoDonHang, trangThai, tongGiaTri)
VALUES ('$user', '$today', 'Đang chờ xử lí', '$tongGiaTri')";

mysqli_query($conn, $sql); // Đã thêm đơn hàng rồi giờ mình lấy ra id đơn hàng

$sql = "SELECT id_donHang FROM donhang
ORDER BY id_donHang DESC
LIMIT 1";

$kq = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($kq);

$id_donHang = $row['id_donHang']; // Có id đơn hàng rồi

// Có id đơn hàng rồi thì mình thêm cái đơn hàng vào đơn hàng đó
$sql = "INSERT INTO sanphamtrongdonhang (id_donHang, id_sanPham, soLuongSanPhamTrongDonHang,phienBan,mauSac)
VALUES ('$id_donHang', '$id_sanPham', '$soLuong','$phienBan','$mau')";
mysqli_query($conn, $sql); // Đã thêm sản phẩm vào trong đơn hàng

// Tạo đơn rồi thì thực hiện thnah toán thôi
$sql = "INSERT INTO thanhtoan (id_donHang, ngayThanhToan, soTienThanhToan, trangThaiThanhToan)
VALUES ('$id_donHang', '$today', '$tongGiaTri', 'Giao dịch thành công')";

mysqli_query($conn, $sql);
header('Location: ' . $trivot . '&giaodich=thanhcong');
