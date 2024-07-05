<style>
            td {
                padding: 20px;
            }
        </style>
        <div class="row">
            <div class="row frmtitle">
                <h1>THỐNG KÊ SẢN PHẨM THEO NGÀY</h1>
            </div>
            <div class="row frmcontent">
                <div class="row mb10 frmdsloai">
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>NGÀY BÁN</th>
                            <th>SỐ LƯỢNG SẢN PHẨM BÁN</th>
                            <th>TỔNG TIỀN THEO NGÀY</th>
                        </tr>
                        <?php
                            $i = 1;
                            foreach ($tksp_ngay as $spngay) {
                                extract($spngay);
                                echo '
                                <tr>
                                    <td>'.$i++.'</td>
                                    <td>'.$order_date.'</td>
                                    <td>'.$total_quantity.'</td>
                                    <td>'.format($total_price).'</td>
                                </tr>
                                ';
                            }
                        ?>
            
                        
                    </table>
                </div>
                <div class="row mb10">
                    <a href="index.php?act=bieudongay">
                        <input type="button" value="Xem biểu đồ">
                    </a>
                </div>
            </div>
        </div>