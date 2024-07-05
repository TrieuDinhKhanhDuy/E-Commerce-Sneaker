<?php 
    function tongtien() {
        $total = 0;
        foreach ($_SESSION['mycart'] as $cart) {
            $ttien = $cart[3] * $cart[7];
            $total += $ttien;
        }   
        return $total;
    }
    
    function insert_bill($iduser, $username, $email, $address, $tel, $bill_pttt, $ngaydathang, $tongtien) {
        $sql = "INSERT INTO bill(iduser, bill_name, bill_email, bill_address, bill_tel, bill_pttt, ngaydathang, total) VALUES ('$iduser', '$username', '$email', '$address', '$tel', '$bill_pttt', '$ngaydathang', '$tongtien' )";
        return pdo_execute_return_lastInsertId($sql);
    }

    function insert_cart($iduser, $idspbt, $img, $namepro, $price, $mau, $size, $soluong, $tongtien, $idbill) {
        $sql = "INSERT INTO cart(iduser, idspbt, img, namepro, price, mau, size, soluong, thanhtien, idbill) VALUES ('$iduser', '$idspbt', '$img', '$namepro', '$price', '$mau', '$size', '$soluong', '$tongtien', '$idbill')";
        return pdo_execute($sql);
    }

    // đơn hàng
    // function loadall_bill_admin() {
    //     $sql = "SELECT *, bill.id as id, SUM(cart.soluong) AS soluong 
    //             FROM bill 
    //             LEFT JOIN cart ON bill.id = cart.idbill 
    //             GROUP BY bill.id 
    //             ORDER BY bill_status=0 DESC";
        
    //     $listbill = pdo_query($sql);
    //     return $listbill;
    // }

    function loadall_bill_admin($status = null) {
        $sql = "SELECT *, bill.id as id, SUM(cart.soluong) AS soluong 
                FROM bill 
                LEFT JOIN cart ON bill.id = cart.idbill";
    
        if ($status !== null) {
            $sql .= " WHERE bill.bill_status = $status";
        }
    
        $sql .= " GROUP BY bill.id 
                  ORDER BY bill_status=0 DESC";
    
        $listbill = pdo_query($sql);
        return $listbill;
    }
    
    
    // function loadall_bill_adin() {
    //     $sql = "SELECT bill.id as id, SUM(cart.soluong) AS soluong_tong, cart.idbill, cart.soluong 
    //             FROM bill 
    //             JOIN cart ON bill.id = cart.idbill 
    //             GROUP BY cart.idbill, cart.soluong 
    //             ORDER BY bill.id DESC";
        
    //     $listbill = pdo_query($sql);
    //     return $listbill;
    // }
    
    function load_order($iduser) {
        $sql = "SELECT 
        bill.id AS id, 
        bill.ngaydathang, 
        bill.total, 
        bill.bill_status, 
        SUM(cart.soluong) AS soluong 
    FROM 
        bill 
    JOIN 
        cart ON bill.id = cart.idbill
    WHERE 
        bill.iduser = $iduser
    GROUP BY 
        bill.id, bill.ngaydathang, bill.total, bill.bill_status
    ORDER BY 
        bill.bill_status = 1 DESC
    ";
        $loadallbill = pdo_query($sql);
        return $loadallbill;
    }
    function loadid_bill($iduser){
        $sql = "SELECT id FROM bill WHERE iduser=".$iduser;
        $keybill = pdo_query($sql);
        return $keybill;
    }

    // function load_cart_user($idbill, $iduser) {
    //     $sql = "SELECT * FROM cart 
    //     WHERE cart.idbill = $idbill AND cart.iduser = $iduser";
    //     $loadall_cartuser = pdo_query($sql);
    //     return $loadall_cartuser;
    // }
    function loadall_cart($idbill, $keyid) {
        if ($idbill == $keyid) {
            $sql = "SELECT * FROM cart 
            WHERE cart.idbill=".$idbill;
            $loadall_cart = pdo_query($sql);
            return $loadall_cart;
        } else {
            return "";
        }
    }
    function loadcart($idbill) {
        $sql = "SELECT * FROM cart WHERE idbill=".$idbill;
        $loadcart = pdo_query($sql);
        return $loadcart;
    }
    function update_status_bill($idbill, $status) {
        $sql = "UPDATE bill SET bill_status = $status WHERE id =". $idbill;
        pdo_execute($sql);
    }

    function get_ttdh($n) {
        switch($n) {
            case "0":
                $tt = "Đơn hàng mới";
                break;
            case "1":
                $tt = "Đang xử lý";
                break;
            case "2":
                $tt = "Đang giao hàng";
                break;
            case "3";
                $tt = "Hoàn tất đơn hàng";
                break;
            default: 
                $tt = "Đơn hàng mới";
                break;
        }
        return $tt;
    }
    function format($numberformat) {
        return number_format($numberformat,0,',','.'). ' VNĐ';
    }
    function delete_bill($idbill){
        $sql = "delete * from bill where id = '$idbill'";
        pdo_execute($sql);
    }
