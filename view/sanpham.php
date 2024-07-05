        <?php
            include "slider.php";
        ?>
        <div class="content_trangchu_sp">
            <?php 
                include "boxcate.php";
            ?>
         
            <div class="boxright">
                <div class="kind_pro">
                    <div class="title">
                        <p>Sản phẩm</p>
                    </div>
                    <div class="product">
                        <?php foreach($dssp as $sanpham) {
                            extract($sanpham);
                            $link = "index.php?act=sanphamct&id=".$id;
                        ?>
                                <div class="box_pro">
                                    <div class="img_pro">
                                        <a href="<?=$link?>">
                                            <img src="<?=$img_path.$img?>">
                                        </a>
                                    </div>
                                    <div class="remote">
                                        <div class="rm"><a href="<?=$link?>"><?=$namepro?></a></div>
                                        <div class="price flex_c">
                                            <p><?=$price?><u>đ</u></p>
                                            <?php if ($discount > 0) {
                                                echo '
                                                    <div class="old_price">
                                                        <del>'.$discount.'đ</del>
                                                    </div>
                                                ';
                                            }
                                            ?>
                                        </div>
                                        <a href="index.php?act=addgiohang">
                                            <input type="button" value="Thêm vào giỏ hàng">
                                        </a>
                                    </div>
                                </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>