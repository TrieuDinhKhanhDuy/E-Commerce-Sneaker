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
                        <p>Sản phẩm mới</p>
                    </div>
                    <div class="product">
                        <?php 
                            foreach ($loadsp as $sanpham) {
                                extract($sanpham);
                                $link = "index.php?act=sanphamct&id=".$sanpham['id'];
                                $hinh = $img_path.$sanpham['img'];
                        ?>
                                <div class="box_pro">
                                    <div class="img_pro">
                                        <a href="<?=$link?>">
                                            <img src="<?=$hinh?>" alt="">
                                        </a>
                                        <div class="sm_img">
                                            <img src="assets/images/Asset_4.png" alt="">
                                        </div>
                                    </div>
                                    <div class="remote">
                                        <div class="rm"><a href="sanphamct.php"><?=$sanpham['namepro']?></a></div>
                                        <div class="price flex_c">
                                            <p><?=$sanpham['price']?><u>đ</u></p>
                                            <?php if ($sanpham['discount'] > 0) {
                                                echo '
                                                    <div class="old_price">
                                                        <del>'.$sanpham['discount'].'đ</del>
                                                    </div>
                                                ';
                                            }
                                            ?>
                                        </div>
                                        <form action="index.php?act=addgiohang" method="post">
                                        <?php 
                                            $listall_bt = loadall_spbt($sanpham['id']);
                                            $spbt = loadone_spbt($sanpham['id']);

                                            foreach ($listall_bt as $bt) {
                                                foreach ($spbt as $giohang) {
                                                    extract($giohang);

                                                    if ($sanpham['id'] == $bt['idpro']) {
                                        ?>
                                                        <input type="hidden" name="idpro" value="<?=$giohang['idpro']?>">
                                                        <input type="hidden" name="id" value="<?=$giohang['mabt']?>">
                                                        <input type="hidden" name="img" value="<?=$giohang['img']?>">
                                                        <input type="hidden" name="namepro" value="<?=$giohang['namepro']?>">
                                                        <input type="hidden" name="price" value="<?=$giohang['price']?>">
                                                        <input type="hidden" name="discount" value="<?=$giohang['discount']?>">
                                                        <input type="hidden" id="inputColor" name="mau" value="<?=$giohang['mau']?>">
                                                        <input type="hidden" id="inputSize" name="size" value="<?=$giohang['size']?>">
                                                        <input type="hidden" id="amount-hd" name="soluong" value="1">
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>

                                            <input style="width: 100%;" type="submit" name="addgiohang" value="Thêm vào giỏ hàng">
                                        </form>
                                    </div>
                                </div>
                        <?php 
                            } 
                        ?>
                        <!-- <div class="box_pro">
                            <div class="img_pro">
                                <a href="sanphamct.html">
                                    <img src="assets/images/giay-adidas-galaxy-star-nam-den-trang-01-800x800.png" alt="">
                                </a>
                                <div class="sm_img">
                                    <img src="assets/images/Asset_4.png" alt="">
                                </div>
                            </div>
                            <div class="remote">
                                <a href="sanphamct.html">Name</a>
                                <div class="price flex_c">
                                    <p>10000<u>đ</u></p>
                                    <div class="old_price">
                                        <del>29999đ</del>
                                    </div>
                                </div>
                                <a href="giohang.html">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                </a>
                            </div>
                        </div>
                        <div class="box_pro">
                            <div class="img_pro">
                                <a href="sanphamct.html">
                                    <img src="assets/images/giay-adidas-galaxy-star-nam-den-trang-01-800x800.png" alt="">
                                </a>
                                <div class="sm_img">
                                    <img src="assets/images/Asset_4.png" alt="">
                                </div>
                            </div>
                            <div class="remote">
                                <a href="sanphamct.html">Name</a>
                                <div class="price flex_c">
                                    <p>10000<u>đ</u></p>
                                    <div class="old_price">
                                        <del>29999đ</del>
                                    </div>
                                </div>
                                <a href="giohang.html">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                </a>
                            </div>
                        </div> -->
                        <!-- <div class="box_pro">
                            <div class="img_pro">
                                <a href="sanphamct.html">
                                    <img src="assets/images/giay-adidas-galaxy-star-nam-den-trang-01-800x800.png" alt="">
                                </a>
                                <div class="sm_img">
                                    <img src="assets/images/Asset_4.png" alt="">
                                </div>
                            </div>
                            <div class="remote">
                                <a href="sanphamct.html">Name</a>
                                <div class="price flex_c">
                                    <p>10000<u>đ</u></p>
                                    <div class="old_price">
                                        <del>29999đ</del>
                                    </div>
                                </div>
                                <a href="giohang.html">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                </a>
                            </div>
                        </div> -->
                      
                    </div>
                </div>

                <div class="kind_pro">
                    <div class="title">
                        <p>Sản phẩm nổi bật</p>
                    </div>
                    <div class="product">
                        <?php foreach($listspnb as $spnb) {
                            extract($spnb);
                            $link = "index.php?act=sanphamct&id=".$id;
                        ?>
                            <div class="box_pro">
                                <div class="img_pro">
                                    <a href="<?=$link?>">
                                        <img src="<?=$img_path.$img?>" alt="">
                                    </a>
                                </div>
                                <div class="remote">
                                    <div class="rm"><a href="sanphamct.php"><?=$namepro?></a></div>
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
                                    <form action="index.php?act=addgiohang" method="post">
                                        <?php 
                                            $listall_bt = loadall_spbt($sanpham['id']);
                                            $spbt = loadone_spbt($sanpham['id']);

                                            foreach ($listall_bt as $bt) {
                                                foreach ($spbt as $giohang) {
                                                    extract($giohang);

                                                    if ($sanpham['id'] == $bt['idpro']) {
                                        ?>
                                                        <input type="hidden" name="idpro" value="<?=$giohang['idpro']?>">
                                                        <input type="hidden" name="id" value="<?=$giohang['mabt']?>">
                                                        <input type="hidden" name="img" value="<?=$giohang['img']?>">
                                                        <input type="hidden" name="namepro" value="<?=$giohang['namepro']?>">
                                                        <input type="hidden" name="price" value="<?=$giohang['price']?>">
                                                        <input type="hidden" name="discount" value="<?=$giohang['discount']?>">
                                                        <input type="hidden" id="inputColor" name="mau" value="<?=$giohang['mau']?>">
                                                        <input type="hidden" id="inputSize" name="size" value="<?=$giohang['size']?>">
                                                        <input type="hidden" id="amount-hd" name="soluong" value="1">
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>

                                            <input style="width: 100%;" type="submit" name="addgiohang" value="Thêm vào giỏ hàng">
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- <div class="box_pro">
                            <div class="img_pro">
                                <a href="sanphamct.html">
                                    <img src="assets/images/giay-adidas-galaxy-star-nam-den-trang-01-800x800.png" alt="">
                                </a>
                            </div>
                            <div class="remote">
                                <a href="sanphamct.html">Name</a>
                                <div class="price">
                                    <p>10000<u>đ</u></p>
                                </div>
                                <a href="sanphamct.html">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                </a>
                            </div>
                        </div>
                        <div class="box_pro">
                            <div class="img_pro">
                                <a href="sanphamct.html">
                                    <img src="assets/images/giay-adidas-galaxy-star-nam-den-trang-01-800x800.png" alt="">
                                </a>
                                <div class="sm_img">
                                    <img src="assets/images/Asset_4.png" alt="">
                                </div>
                            </div>
                            <div class="remote">
                                <a href="sanphamct.html">Name</a>
                                <div class="price flex_c">
                                    <p>10000<u>đ</u></p>
                                    <div class="old_price">
                                        <del>29999đ</del>
                                    </div>
                                </div>
                                <a href="sanphamct.html">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                </a>
                            </div>
                        </div> -->
                        <!-- <div class="box_pro">
                            <div class="img_pro">
                                <img src="assets/images/giay-adidas-galaxy-star-nam-den-trang-01-800x800.png" alt="">
                                <div class="sm_img">
                                    <img src="assets/images/Asset_4.png" alt="">
                                </div>
                            </div>
                            <div class="remote">
                                <a href="#">Name</a>
                                <p>10000đ</p>
                                <button>Thêm vào giỏ hàng</button>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- Tài liệu cần thiết
                float ceil( float value )
                float floor( float value )
                float round( float value [, int precision] ) -->


                <div class="kind_pro">
                    <div class="title">
                        <p>Sale đồng giá</p>
                    </div>
                    <div class="product">
                        <?php foreach($dg as $gia) {
                            extract($gia);
                            $link = "index.php?act=sanphamct&id=".$id;
                            // echo '<pre>';
                            // var_dump($gia);
                            // echo '</pre>';
                            if ($gia['discount'] > $gia['price']) {
                                $percent = (($gia['discount'] - $gia['price']) / $gia['discount']) * 100;
                        ?>

                                    <div class="box_pro">
                                        <div class="img_pro">
                                            <a href="<?=$link?>">
                                                <img src="<?=$img_path.$img?>" alt="">
                                            </a>
                                            <div class="span">
                                                <span>-<?=$percent?>%</span>
                                            </div>
                                        </div>
                                        <div class="remote">
                                            <a href="<?=$link?>"><?=$namepro?></a>
                                            <div class="price flex_c">
                                                <p><?=$gia['price']?><u>đ</u></p>
                                                <div class="old_price">
                                                    <del><?=$gia['discount']?>đ</del>
                                                </div>
                                            </div>
                                            <form action="index.php?act=addgiohang" method="post">
                                        <?php 
                                            $listall_bt = loadall_spbt($sanpham['id']);
                                            $spbt = loadone_spbt($sanpham['id']);

                                            foreach ($listall_bt as $bt) {
                                                foreach ($spbt as $giohang) {
                                                    extract($giohang);

                                                    if ($sanpham['id'] == $bt['idpro']) {
                                        ?>
                                                        <input type="hidden" name="idpro" value="<?=$giohang['idpro']?>">
                                                        <input type="hidden" name="id" value="<?=$giohang['mabt']?>">
                                                        <input type="hidden" name="img" value="<?=$giohang['img']?>">
                                                        <input type="hidden" name="namepro" value="<?=$giohang['namepro']?>">
                                                        <input type="hidden" name="price" value="<?=$giohang['price']?>">
                                                        <input type="hidden" name="discount" value="<?=$giohang['discount']?>">
                                                        <input type="hidden" id="inputColor" name="mau" value="<?=$giohang['mau']?>">
                                                        <input type="hidden" id="inputSize" name="size" value="<?=$giohang['size']?>">
                                                        <input type="hidden" id="amount-hd" name="soluong" value="1">
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>

                                            <input style="width: 100%;" type="submit" name="addgiohang" value="Thêm vào giỏ hàng">
                                        </form>
                                        </div>
                                    </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- <div class="box_pro">
                            <div class="img_pro">
                                <a href="sanphamct.html">
                                    <img src="assets/images/giay-adidas-galaxy-star-nam-den-trang-01-800x800.png" alt="">
                                </a>
                                <div class="span">
                                    <span>-100%</span>
                                </div>
                            </div>
                            <div class="remote">
                                <a href="sanphamct.html">Name</a>
                                <div class="price flex_c">
                                    <p>10000<u>đ</u></p>
                                    <div class="old_price">
                                        <del>29999đ</del>
                                    </div>
                                </div>
                                <a href="giohang.html">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                </a>
                            </div>
                        </div> -->
                        <!-- <div class="box_pro">
                            <div class="img_pro">
                                <a href="sanphamct.html">
                                    <img src="assets/images/giay-adidas-galaxy-star-nam-den-trang-01-800x800.png" alt="">
                                </a>
                                <div class="span">
                                    <span>-100%</span>
                                </div>
                            </div>
                            <div class="remote">
                                <a href="sanphamct.html">Name</a>
                                <div class="price flex_c">
                                    <p>10000<u>đ</u></p>
                                    <div class="old_price">
                                        <del>29999đ</del>
                                    </div>
                                </div>
                                <a href="giohang.html">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                </a>
                            </div>
                        </div> -->
                        <!-- <div class="box_pro">
                            <div class="img_pro">
                                <a href="sanphamct.html">
                                    <img src="assets/images/giay-adidas-galaxy-star-nam-den-trang-01-800x800.png" alt="">
                                </a>
                                <div class="sm_img">
                                    <img src="assets/images/Asset_4.png" alt="">
                                </div>
                            </div>
                            <div class="remote">
                                <a href="sanphamct.html">Name</a>
                                <div class="price flex_c">
                                    <p>10000<u>đ</u></p>
                                    <div class="old_price">
                                        <del>29999đ</del>
                                    </div>
                                </div>
                                <a href="giohang.html">
                                    <input type="button" value="Thêm vào giỏ hàng">
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>