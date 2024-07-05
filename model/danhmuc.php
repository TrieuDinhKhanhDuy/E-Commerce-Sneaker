<?php 
    function insert_danhmuc($tendm) {
        $sql = "INSERT INTO danhmuc(namedm, status) VALUES('$tendm', 1)";
        pdo_execute($sql);
    } 

    function update_status_dm0($id) {
        $sql = "UPDATE danhmuc SET status=0 WHERE id=".$id;
        pdo_execute($sql);
    }
    
    function update_status_dm1($id) {
        $sql = "UPDATE danhmuc SET status=1 WHERE id=".$id;
        pdo_execute($sql);
    }

    function loadall_danhmuc() {
        $sql = "SELECT * FROM danhmuc ORDER BY id DESC";
        $listdm = pdo_query($sql);
        return $listdm;
    }
    function loadall_danhmuc_user() {
        $sql = "SELECT * FROM danhmuc WHERE status = 1 ORDER BY id DESC";
        $listdm = pdo_query($sql);
        return $listdm;
    }

    function loadone_danhmuc($id) {
        $sql = "SELECT * FROM danhmuc WHERE id=".$id;
        $dm = pdo_query_one($sql);
        return $dm;
    }

    function update_danhmuc($id, $tenloai) {
        $sql = "UPDATE danhmuc SET namedm='".$tenloai."' WHERE id=".$id;
        pdo_execute($sql);
    }
    function delete_danhmuc($id){
        $sql = "delete from danhmuc where id = '$id'";
        pdo_execute($sql);
    }
