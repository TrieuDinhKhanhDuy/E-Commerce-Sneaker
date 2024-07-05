<div class="row">
            <div class="row frmtitle">
                <h1>DANH SÁCH ĐƠN HÀNG</h1>
            </div>
            <form action="index.php?act=listdonhang" method="post" class="flex_sea">
                <input type="text" name="kyw">
                <input type="submit" name="listok" value="TÌM KIẾM">
                <input type="submit" name="dangxuly" value="ĐANG XỬ LÝ">
                <input type="submit" name="danggiao" value="ĐANG GIAO">
                <input type="submit" name="hoanthanh" value="HOÀN THÀNH">
                <?php
                if (isset($_POST['hoanthanh'])) {
                    $_SESSION['hoanthanh_clicked'] = true;
                }
                ?>
                <a href="index.php?act=donhang"><input type="button" name="tatca" value="TẤT CẢ"></a>
            </form>
            <div class="row frmcontent">
                <div class="row mb10 frmdsloai">
                    <table>
                        <tr>
                            <th>MÃ ĐƠN HÀNG</th>
                            <th>THÔNG TIN KHÁCH HÀNG</th>
                            <th>SỐ LƯỢNG HÀNG</th>
                            <th>GIÁ TRỊ ĐƠN HÀNG</th>
                            <th>NGÀY ĐẶT HÀNG</th>
                            <th>TRẠNG THÁI ĐƠN HÀNG</th>
                            <th>THAO TÁC</th>
                        </tr>
                        <?php
                        foreach($listbill as $bill){
                            $info = $bill['bill_name'].'<br>'.
                                    $bill['bill_email'].'<br>'.
                                    $bill['bill_address'].'<br>'.
                                    $bill['bill_tel'];
                            $tddh = get_ttdh($bill['bill_status']);
                            $suabill="index.php?act=updatebill&idbill=".$bill['id'];
                            $billct="index.php?act=billct&idbill=".$bill['id'];
                            $xoabill="index.php?act=xoabill&idbill=".$bill['id'];
                        ?>
                            <tr>
                                <td>DA1 - <?=$bill['id']?></td>
                                <td>
                                    <?=$info?>
                                </td>
                                <td><?=$bill['soluong']?></td>
                                <td><?=format($bill['total'])?></td>
                                <td><?=$bill['ngaydathang']?></td>
                                <td><?=$tddh?></td>
                                <td style="width: 200px;">
                                    <?php 
                                        if (isset($_POST['dangxuly'])) {
                                            echo '
                                                <form action="index.php?act=updatettbill" method="post">
                                                    <input type="hidden" name="idbill" value="'.$bill['id'].'">
                                                    <input type="submit" name="xacnhangiao" value="XÁC NHẬN GIAO HÀNG">
                                                </form>
                                            ';
                                        } else if (isset($_POST['danggiao'])) {
                                            echo '
                                                <form action="index.php?act=updatettbill" method="post">
                                                    <input type="hidden" name="idbill" value="'.$bill['id'].'">
                                                    <input type="submit" name="hoanthanhgiao" value="XÁC NHẬN HOÀN THÀNH">
                                                </form>
                                            ';
                                        } else {
                                            echo '
                                                <a href="'.$billct.'"><input type="button" value="Chi tiết"></a>
                                            ';
                                            echo '
                                            <a href="'.$xoabill.'"><input type="button" value="Xoa"></a>
                                        ';
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php    
                        }

                        if (empty($listbill) && isset($thongbao)) {
                            echo '
                            <tr>
                                <td colspan="6">'.$thongbao.'</td>
                            </tr>
                            ';
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>