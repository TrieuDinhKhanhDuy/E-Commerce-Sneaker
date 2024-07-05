<div class="row">
    <div class="title">
        <?php 
            
            echo '
                <h1>ĐƠN HÀNG DA1 - '. $cart['idbill'] .'</h1>
            ';
        
        ?>
        
    </div>
    <div class="row frmcontent">
        <div class="row mb10 frmdsloai">
            <table>
                <tr>
                    <th>STT</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>HÌNH ẢNH</th>
                    <th>ĐƠN GIÁ</th>
                    <th>SỐ LƯỢNG</th>
                    <th>THÀNH TIỀN</th>
                </tr>
                <?php
                $i = 1;
                foreach ($loadall_cart as $cart) {
                    $updatettbill="index.php?act=updatettbill&idbill=".$cart['idbill'];
                    // $suatk = "index.php?act=updatetk=" . $id;
                    // $xoatk = "index.php?act=xoatk&id=" . $id;
                    $thanhtien = $cart['price'] * $cart['soluong'];
                    echo '    
                        <tr>
                            <td>'.$i++.'</td>
                            <td>
                                ' . $cart['namepro'] . '<br><br>
                                Màu: ' . $cart['mau'] . ' | Size: ' . $cart['size'] . '
                            </td>
                            <td><img src=" ../upload/' . $cart['img'] . '" height="80px" alt=""></td>
                            <td>' . format($cart['price']) . ' </td>
                            <td>' . $cart['soluong'] . '</td>
                            <td>' . format($thanhtien) . ' </td>
                        </tr>';
                }     
                ?>  
                        <tr>
                            <td colspan="3">TỔNG GIÁ TRỊ ĐƠN HÀNG: DA1 - <?= $cart['idbill'] ?></td>
                            <td colspan="3"><?= format($cart['thanhtien']) ?> </td>
                        </tr>
            </table>
        </div>
        <div class="row mb10">
            <?php foreach($listbill as $bill) {
                if($bill['id'] == $_GET['idbill'] && ($bill['bill_status'] != 1) && ($bill['bill_status'] != 2) && ($bill['bill_status'] != 3)) {
                    echo '
                        <form action="index.php?act=updatettbill" method="post">
                            <input type="hidden" name="idbill" value="'.$cart['idbill'].'">
                            <input type="submit" name="xacnhan" value="XÁC NHẬN XỬ LÝ">
                        </form>
                    ';
                }
            }   
            ?>
        </div>
    </div>
</div>