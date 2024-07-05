<?php
function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
    $sql="insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}
function loadall_binhluan($idpro){
    $sql = "SELECT binhluan.*, taikhoan.username
            FROM binhluan
            LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
            WHERE 1";
    
    if ($idpro > 0) {
        $sql .= " AND idpro = '" . $idpro . "'";
    }

    $sql .= " ORDER BY binhluan.id DESC";

    $listbinhluan = pdo_query($sql);

    return $listbinhluan;
}

function update_status_bl0($id) {
    $sql = "UPDATE binhluan  WHERE id=".$id;
    pdo_execute($sql);
}
function update_status_bl1($id) {
    $sql = "UPDATE binhluan WHERE id=".$id;
    pdo_execute($sql);
}
function delete_binhluan($id){
    $sql = "delete from binhluan where id = '$id'";
    pdo_execute($sql);
}
?>