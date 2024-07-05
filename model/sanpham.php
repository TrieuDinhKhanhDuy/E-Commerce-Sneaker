<?php
    function insert_sanpham($namepro, $price, $discount, $img, $mota, $iddm) {
        $sql = "INSERT INTO sanpham(namepro, price, discount, img, mota, iddm, status) VALUES('$namepro', '$price', '$discount', '$img', '$mota', '$iddm', 1)";
        pdo_execute($sql); 
    }

    function loadone_sanpham($id) {
        $sql = "SELECT * FROM sanpham WHERE id=".$id;
        $pro = pdo_query_one($sql);
        return $pro;
    }

    function loadall_sanpham() {
        $sql = "SELECT * FROM sanpham WHERE status = 1";
        $listsp = pdo_query($sql);
        return $listsp;
    }

    function loadall_sanphamseach($kyw,$iddm){
        $sql="select * from sanpham where 1";
        if($kyw!=""){
            $sql.=" and namepro like '%".$kyw."%'";
        }
        if($iddm>0){
            $sql.=" and iddm ='".$iddm."'";
        }
        $sql.=" order by id desc";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }

    function loadall_sanpham_admin() {
        $sql = "SELECT * FROM sanpham";
        $listsp = pdo_query($sql);
        return $listsp;
    }


    function loadall_sanpham_home() {
        $sql = "SELECT sanpham.id, sanpham.namepro, sanpham.price, sanpham.discount, sanpham.img, sanpham.mota 
                FROM sanpham 
                JOIN danhmuc ON sanpham.iddm = danhmuc.id 
                WHERE danhmuc.status = 1 
                ORDER BY sanpham.id DESC LIMIT 0,3";
        $loadall = pdo_query($sql);
        return $loadall;
    }

    function load_sp_cungloai($id, $iddm) {
        $sql = "SELECT * FROM sanpham WHERE iddm = ".$iddm." AND id <>".$id;
        $spcl = pdo_query($sql);
        return $spcl;
    }

    function load_ten_dm($iddm){
        if($iddm>0){
           $sql="select * from danhmuc where id=".$iddm;
        $dm=pdo_query_one($sql);
        extract ($dm);
        return $namedm; 
        }else{
            return "";
        }
        
    }

    function update_status_sp0($id) {
        $sql = "UPDATE sanpham SET status=0 WHERE id=".$id;
        pdo_execute($sql);
    }

    function update_status_sp1($id) {
        $sql = "UPDATE sanpham SET status=1 WHERE id=".$id;
        pdo_execute($sql);
    }

    function load_sp_nb() {
        $sql = "SELECT * FROM sanpham WHERE status = 1 ORDER BY luotxem DESC LIMIT 0,3";
        $listspnb = pdo_query($sql);
        return $listspnb;
    }

    function load_sp_dg() {
        $sql = "SELECT * FROM sanpham WHERE status = 1 AND price = (SELECT price FROM sanpham GROUP BY price HAVING COUNT(id) > 1) LIMIT 0,3";
        $dg = pdo_query($sql);
        // SELECT sp1.*, sp2.* 
        // FROM sanpham sp1
        // JOIN sanpham sp2 ON sp1.price = sp2.price AND sp1.discount = sp2.discount
        // WHERE sp1.id <> sp2.id
        // LIMIT 0,3
        return $dg;
    }

    // Sản phẩm biến thể
    function insert_variant($idpro, $idmau, $idsize, $soluong) {
        $sql = "INSERT INTO spbt(idpro, idmau, idsize, soluong, status) VALUES($idpro, '$idmau', $idsize, $soluong, 1";
        pdo_execute($sql);
    }

    function update_sanpham($id, $iddm, $namepro, $price, $discount, $hinh, $mota) {
        if($hinh != "") {
            $sql = "UPDATE sanpham SET iddm = '".$iddm."', namepro = '".$namepro."', price = '".$price."', discount = '".$discount."', img = '".$hinh."', mota = '".$mota."' WHERE id =".$id;
        } else {
            $sql = "UPDATE sanpham SET iddm = '".$iddm."', namepro = '".$namepro."', price = '".$price."', discount = '".$discount."', mota = '".$mota."' WHERE id=".$id;
        }
        pdo_execute($sql);
    }

    function insert_spbt($idpro, $idmau, $idsize, $soluong) {
        $sql = "INSERT INTO spbt (idpro, idmau, idsize, soluong, status) VALUES ($idpro, $idmau, $idsize, $soluong, 1)";
        pdo_execute($sql);
    }
    function loadall_bt() {
        $sql = "SELECT * FROM spbt";
        $allbt = pdo_query($sql);
        return $allbt;
    }
    function loadone_spbt($idpro) {
        $sql = "SELECT spbt.id as mabt, spbt.idpro as idpro, spbt.soluong as soluongbt, sanpham.img as img, sanpham.namepro as namepro, sanpham.price as price, sanpham.discount as discount, mausp.mau as mau, size.size as size
                FROM spbt 
                JOIN sanpham ON spbt.idpro = sanpham.id
                JOIN mausp ON spbt.idmau = mausp.id 
                JOIN size ON spbt.idsize = size.id 
                WHERE spbt.idpro = $idpro AND spbt.status = 1 
                ";
        $list_spbt = pdo_query($sql);
        return $list_spbt;
    }
    // function loadone_bt($idbt) {
    //     $sql = "SELECT mausp.mau as mau, size.size as size 
    //             FROM spbt 
    //             JOIN mausp ON spbt.idmau = mausp.id
    //             JOIN size ON spbt.idsize = size.id
    //             WHERE spbt.id=".$idbt;
    //     $bt = pdo_query_one($sql);
    //     return $bt;
    // }

    function load_soluongbt($idpro) {
        $sql = "SELECT SUM(spbt.soluong) as soluong FROM spbt WHERE spbt.idpro = $idpro";
        $slbt = pdo_query($sql);
        return $slbt;
    }
    
    // cập nhật số lượng khi trùng sản phẩm
    function insertOrUpdate_spbt($idpro, $idmau, $idsize, $soluong) {
        // Kiểm tra xem biến thể đã tồn tại chưa
        $existing_spbt = get_spbt_by_idpro_and_ids($idpro, $idmau, $idsize);
    
        if ($existing_spbt) {
            // Biến thể đã tồn tại, cập nhật số lượng
            $new_soluong = $existing_spbt['soluong'] + $soluong;
            update_spbt_soluong($existing_spbt['id'], $new_soluong);
        } else {
            // Biến thể chưa tồn tại, thêm mới
            insert_spbt($idpro, $idmau, $idsize, $soluong);
        }
    }
    
    function get_spbt_by_idpro_and_ids($idpro, $idmau, $idsize) {
        $sql = "SELECT * FROM spbt WHERE idpro = $idpro AND idmau = $idmau AND idsize = $idsize";
        return pdo_query_one($sql);
    }
    // end

    function update_spbt_soluong($idspbt, $soluong) {
        $sql = "UPDATE spbt SET soluong = $soluong WHERE id = $idspbt";
        pdo_execute($sql);
    }
    
    function update_view($id) {
        $sql = "UPDATE sanpham SET luotxem = luotxem + 1 WHERE id=".$id;
        pdo_execute($sql);
    }

    function loadall_spdm($iddm) {
        $sql = "SELECT * FROM sanpham WHERE id=$iddm";
        $loadspdm = pdo_query($sql);
        return $loadspdm;
    }

    function loadall_spbt($idpro) {
        $sql = "SELECT * FROM spbt WHERE spbt.idpro = $idpro";
        $listall_bt = pdo_query($sql);
        return $listall_bt;
    }
    
function delete_sanpham($id){
    $sql = "delete from sanpham where id in ($id)";
    pdo_execute($sql);
}