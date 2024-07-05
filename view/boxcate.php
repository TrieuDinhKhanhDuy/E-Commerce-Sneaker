            <div class="boxleft">
                <div class="title">
                    <p>Danh mục</p>
                </div>
                <div class="list_cate">
                    <?php foreach($loaddm as $dm) {
                        extract($dm);
                        $linkdm="index.php?act=sanpham&iddm=".$id;
                        echo '
                            <div class="category">
                                <a href="'.$linkdm.'">'.$namedm.'</a>
                            </div>
                        ';
                    }
                    ?>
                    <div class="sear">
                        <form action="index.php?act=sanpham" method="post" class="searbox">
                            <input type="text" name="kyw" class="fullwidth">
                            <input type="submit" name="timkiem" value="Tìm kiếm">
                        </form>
                    </div>
                </div>
            </div>