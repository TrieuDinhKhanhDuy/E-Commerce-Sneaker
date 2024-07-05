
<?php
function loadall_thongke(){
    $sql="select danhmuc.id as madm, danhmuc.namedm as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice,max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql.=" group by danhmuc.id order by danhmuc.id desc";
    $listtk=pdo_query($sql);
    return $listtk;
}
function thongkesp_ngay() {
    $sql = "
    SELECT
    DATE(b.create_at) AS order_date,
    SUM(c.soluong) AS total_quantity,
    SUM(c.price * c.soluong) AS total_price
FROM
    bill b
JOIN
    cart c ON b.id = c.idbill
GROUP BY
    DATE(b.create_at)
ORDER BY 
    DATE(b.create_at) DESC

    ";
    $list_thongke_sp_ngay = pdo_query($sql);
    return $list_thongke_sp_ngay;
}


function thongke_sp_ngay() {
    $sql = "
        SELECT
        DATE(b.create_at) AS order_date,
        SUM(c.soluong) AS total_quantity,
        SUM(c.price * c.soluong) AS total_price
        FROM
        bill b
        JOIN
        cart c ON b.id = c.idbill
        GROUP BY
        DATE(b.create_at);
    ";

    $list_thongke_sp_ngay = pdo_query($sql);

    $order_dates = [];
    $total_quantities = [];
    $total_prices = [];
    $bar_colors = ["red", "green", "blue", "orange", "brown"];

    foreach ($list_thongke_sp_ngay as $item) {
        $order_dates[] = $item['order_date'];
        $total_quantities[] = $item['total_quantity'];
        $total_prices[] = $item['total_price'];
    }

    return [
        'order_dates' => $order_dates,
        'total_quantities' => $total_quantities,
        'total_prices' => $total_prices,
        'bar_colors' => $bar_colors,
    ];
}
?>