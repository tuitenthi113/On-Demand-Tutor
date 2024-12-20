<?php
// Kết nối cơ sở dữ liệu
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
// Bắt đầu xử lí 
if (isset($_GET['id_sanPham'])) {
    $id_sanPham = $_GET['id_sanPham'];
    // Lấy ra tên thông tin sản phẩm
    $sql = "SELECT * FROM sanpham WHERE id =  $id_sanPham";
    $result = mysqli_query($conn, $sql);
    // Lấy ra chi tiết sản phẩm từ cái id sản phẩm
    $sql_1 = "SELECT * FROM chitietsanpham WHERE id_sanPham =  $id_sanPham";
    $result_1 = mysqli_query($conn, $sql_1);
    // Biến sản phẩm
    $tensp = '';
    $giatien = 0;
}
?>
<form action="http://localhost/wedbanhang/giaodien/muahang/muahang.php" method="get" id="myform">
    <input type="hidden" name="phienban" id="phienban">
    <input type="hidden" name="mau" id="mau">
    <input type="hidden" name="id_sanPham" value="<?php echo $id_sanPham; ?>">
    <input type="hidden" name="soluong" id="soluong">
</form>
<div class="container"><!--Bắt đầu sự lựa chọn-->
    <div class="container-1">
        <div>
            <?php while ($row = mysqli_fetch_array($result)) {
            ?>
                <p>
                    Mua <?php echo $row['tenSanPham'];
                        $tensp = $row['tenSanPham']; ?>
                </p>
                <p><?php echo $row['moTa']; ?> </p>
                <p>Từ <?php echo number_format($row['giaSanPham'], 0, "", ".");
                        $giatien = $row['giaSanPham']; ?>đ</p>
            <?php } ?>
        </div>
        <div>
            <?php while ($row = mysqli_fetch_array($result_1)) {
            ?>
                <img src="../ảnh_sản_phẩm/ctsp/phukien/<?php echo  $row['img_chiTiet']; ?>" style="width: 570px; height: 570px;" alt="ảnh sản phẩm">
            <?php } ?>
        </div>
    </div>
    <div class="container-2">
        <div>
            <div class="info-box-container">
                <div class="info-box">
                    Nhận 1.100.000đ–22.600.000đ khi đổi.
                    <span class="icon">+</span>
                </div>
                <div class="info-box">
                    Có tài trợ
                    <span class="icon">+</span>
                </div>
            </div>
        </div>
        <div>
            <div class="color-selection-container">
                <p>Chọn màu bạn yêu thích.</p>
                <h2>Màu.</h2>

                <div class="color-options">
                    <div class="color-option color5" onclick="selectColor(this)">
                        <div class="xoa">Vàng Khế</div>
                    </div>
                    <div class="color-option color6" onclick="selectColor(this)">
                        <div class="xoa">Xanh Lưu Ly</div>
                    </div>
                    <div class="color-option color7" onclick="selectColor(this)">
                        <div class="xoa">Xanh Hồ Nước</div>
                    </div>
                    <div class="color-option color8" onclick="selectColor(this)">
                        <div class="xoa">Hoa Đăng</div>
                    </div>
                    <div class="color-option color9" onclick="selectColor(this)">
                        <div class="xoa">Xám Đá</div>
                    </div>
                    <div class="color-option color10" onclick="selectColor(this)">
                        <div class="xoa">Mận</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="order-summary-container"> <!--Phần nhập số lương sản phẩm -->
            <div class="promotion-code">
                <input class="soluong" name="soluong" type="text" placeholder="Nhập số lượng sản phẩm">
            </div>
        </div>
    </div>
</div><!-- Kết thúc sự lựa chọn-->
<div class="product-container"><!--Bắt đầu mục mua sản phẩm-->
    <div>
        <p class="product-status">Sản phẩm mới</p>
        <h1 class="product-title"><?php echo $tensp; ?></h1>
    </div>
    <div>
        <div class="price-info">
            Từ <span><?php echo number_format($giatien, 0, "", "."); ?> ₫</span> khi thu cũ đổi mới
        </div>
        <div class="additional-info">
            <span class="free-shipping"><i class='bx bx-package'></i> Giao hàng miễn phí</span>
            <span class="store-pickup"><i class='bx bxs-store'></i> <a href="http://localhost/wedbanhang/giaodien/controler/xl_giohang/giohang.php?id_sanPham=<?php echo $id_sanPham; ?>">Thêm vào giỏ hàng</a>
            </span>
        </div>
    </div>

    <div>
        <button class="buy-button" onclick="abc()">Mua ngay</button>
    </div>

</div><!--Kết thúc mục mua sản phẩm-->