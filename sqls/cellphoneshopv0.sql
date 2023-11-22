create database if not exists cellphoneshopv0 character set UTF8 collate utf8_vietnamese_ci;
use cellphoneshopv0;

CREATE TABLE if not exists dienthoai(
    ma_dienthoai INT PRIMARY KEY AUTO_INCREMENT,
    ten_dienthoai nvarchar(30) NOT NULL,
    gia_nhap_dienthoai INT NOT NULL,
    gia_ban_dienthoai INT NOT NULL,
    giam_gia_dienthoai INT,
    mo_ta_dienthoai TEXT,
    ton_kho INT DEFAULT 0,
    da_ban INT DEFAULT 0,
    luot_xem INT DEFAULT 0,
    luot_binh_luan INT DEFAULT 0,
    luot_danh_gia INT DEFAULT 0,
    luot_them_gio_hang INT DEFAULT 0,
    ma_hang INT FOREIGN KEY REFERENCES hang(ma_hang)
);

CREATE TABLE if not exists nhap_dienthoai(
    ma_nhap INT PRIMARY KEY AUTO_INCREMENT,
    ma_dienthoai INT FOREIGN KEY REFERENCES dienthoai(ma_dienthoai),
    ngay_nhap DATE NOT NULL,
    so_luong_nhap INT NOT NULL
);
CREATE TABLE if not exists ban_dienthoai(
    ma_ban INT PRIMARY KEY AUTO_INCREMENT,
    ma_dienthoai INT FOREIGN KEY REFERENCES dienthoai(ma_dienthoai),
    ngay_ban DATE NOT NULL,
    so_luong_ban INT NOT NULL
);

CREATE TABLE if not exists anh_dienthoai(
    ma_anh INT PRIMARY KEY AUTO_INCREMENT,
    link_anh varchar(200) NOT NULL,
    ma_dienthoai INT FOREIGN KEY REFERENCES dienthoai(ma_dienthoai)
);

CREATE TABLE if not exists hang(
    ma_hang INT PRIMARY KEY AUTO_INCREMENT,
    ten_hang nvarchar(30) NOT NULL 
);

CREATE TABLE if not exists nguoidung(
    ma_nguoidung INT PRIMARY KEY AUTO_INCREMENT,
    quyen_admin tinyint(1) DEFAULT 0  
    -- user_id: INT (Khóa chính, định danh duy nhất cho người dùng)
    -- username: VARCHAR (Tên đăng nhập của người dùng)
    -- password: VARCHAR (Mật khẩu của người dùng)
    -- email: VARCHAR (Địa chỉ email của người dùng)
    -- full_name: VARCHAR (Họ và tên đầy đủ của người dùng)
    -- address: TEXT (Địa chỉ của người dùng)
    -- phone_number: VARCHAR (Số điện thoại của người dùng)
);

CREATE TABLE if not exists binhluan(
    ma_binhluan INT PRIMARY KEY AUTO_INCREMENT,
    ma_nguoidung INT FOREIGN KEY REFERENCES dienthoai(ma_dienthoai)
    -- comment_id: INT (Khóa chính, định danh duy nhất cho bình luận)
    -- user_id: INT (Khóa ngoại tham chiếu tới bảng "Users")
    -- product_id: INT (Khóa ngoại tham chiếu tới bảng "Products")
    -- comment_text: TEXT (Nội dung bình luận)
);

CREATE TABLE if not exists danhgia(
    ma_danhgia INT PRIMARY KEY AUTO_INCREMENT,
    -- rating_id: INT (Khóa chính, định danh duy nhất cho đánh giá)
    -- user_id: INT (Khóa ngoại tham chiếu tới bảng "Users")
    -- product_id: INT (Khóa ngoại tham chiếu tới bảng "Products")
    -- rating_value: INT (Giá trị đánh giá từ 1 đến 5)
);

CREATE TABLE if not exists giohang(
    ma_giohang INT PRIMARY KEY AUTO_INCREMENT,
    -- cart_id: INT (Khóa chính, định danh duy nhất cho giỏ hàng)
    -- user_id: INT (Khóa ngoại tham chiếu tới bảng "Users")
    -- product_id: INT (Khóa ngoại tham chiếu tới bảng "Products")
    -- quantity: INT (Số lượng sản phẩm trong giỏ hàng)
);