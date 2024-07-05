<div class="row">
    <div class="row frmtitle">
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>NỘI DUNG BÌNH LUẬN</th>
                    <th>NGÀY BÌNH LUẬN</th>
                    <th>TÀI KHOẢN</th>
                    <th>SẢN PHẨM</th>
                    <th>TRẠNG THÁI</th>
                    <th></th>
                </tr>
                <?php
                foreach ($listbinhluan as $binhluan) {
                    extract($binhluan);
                    $xoabl = "index.php?act=xoabl&id=$id";
                    ?>
                   <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><?= $id ?></td>
                            <td><?= $noidung ?></td>
                            <td><?= $ngaybinhluan ?></td>
                            <td><?= $iduser ?></td>
                            <td><?= $idpro ?></td>
                    
                            <td><a href="<?= $xoabl ?>"><input type="button" value="Xóa"></a></td>

                          </tr>
              <?php  }
                
                ?>
            </table>
        </div>
        <div class="row mb10">
            <input type="button" value="CHỌN TẤT CẢ">
            <input type="button" value="BỎ CHỌN TẤT CẢ">
            <input type="button" value="XÓA CÁC MỤC ĐÃ CHỌN">
        </div>
    </div>
</div>