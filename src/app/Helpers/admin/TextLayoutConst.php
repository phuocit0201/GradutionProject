<?php 
if (!function_exists('TextLayoutSidebar')) {
    function TextLayoutSidebar($key)
    {
        $const = [
            "overview"              => "Tổng Quan",
            "dashboard"             => "Bảng Điều Khiển",
            "statistical"           => "Bảng Thống Kê",
            "website_management"    => "Quản Lý Website",
            "order"                 => "Đơn Hàng",
            "category"              => "Danh Mục",
            "product"               => "Sản Phẩm",    
            "producer"              => "Nhà Sản Xuất",
            "payment"               => "Thanh Toán",
            "customer"              => "Khách Hàng",
            "staff"                 => "Nhân Viên",
            "discount_code"         => "Mã Giảm Giá",
            "configuration"         => "Cấu Hình Website",
            "setting"               => "Cài Đặt",
            "banner"                => "Banner",
            "reset"                 => "Reset",
            "logout"                => "Đăng Xuất"
        ];
        return $const[$key];
    }
}

if (!function_exists('TextLayoutTitle')) {
    function TextLayoutTitle($index)
    {
        $const = [
            "dashboard"             => "Bảng Điều Khiển",
            "statistical"           => "Bảng Thống Kê",
            "order"                 => "Quản Lý Đơn Hàng",
            "category"              => "Danh Mục Sản Phẩm",
            "product"               => "Quản Lý Sản Phẩm",    
            "producer"              => "Quản Lý Nhà Sản Xuất",
            "payment"               => "Quản Lý Thanh Toán",
            "customer"              => "Quản Lý Khách Hàng",
            "staff"                 => "Quản Lý Nhân Viên",
            "discount_code"         => "Quản Lý Mã Giảm Giá",
            "setting"               => "Cài Đặt Website",
            "banner"                => "Cài Đặt Banner",
            "reset"                 => "Làm Mới Website",
            "create_user"           => "Thêm Mới Khách Hàng",
        ];
        return $const[$index];
    }
}
?>