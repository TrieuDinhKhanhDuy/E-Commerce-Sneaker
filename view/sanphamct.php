        <div class="content">
            <div class="box_ct">
                <?php 
                foreach($spbt as $bienthe) {
                    // extract($bienthe); 
                }
                    $hinh = "upload/";
                ?>
                <div class="box_img">
                    <img src="<?=$hinh.$bienthe['img']?>" alt="">
                </div>
                <div class="boxinfo">
                    <h1><?= $bienthe['namepro']?></h1>
                    <div class="price">
                        <div><?=$bienthe['price']?> đ</div>
                    </div>
                    <div class="color">
                        <span>Chọn color: </span>
                        <strong id="selectedColor"></strong>
                        <div class="chose_color" id="colorButtonsContainer"> 
                            <?php 
                            $uniqueColors = array(); 
                            foreach($spbt as $bienthe) {
                                $color = $bienthe['mau'];
                                // Kiểm tra xem color đã xuất hiện chưa
                                if (!in_array($color, $uniqueColors)) {
                                    $uniqueColors[] = $color; // Thêm color vào mảng để kiểm tra lần sau
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="size">
                        <span>Chọn size: </span>
                        <strong id="selectedSize"></strong>
                        <div class="chose_size" id="sizeButtonsContainer"> 
                            <?php 
                            $uniqueSizes = array(); 
                            foreach($spbt as $bienthe) {
                                $size = $bienthe['size'];
                                // Kiểm tra xem size đã xuất hiện chưa
                                if (!in_array($size, $uniqueSizes)) {
                                    $uniqueSizes[] = $size; // Thêm size vào mảng để kiểm tra lần sau
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="boxaddcart">
                        <div class="quantity" id="result">
                            <span>Chọn số lượng: </span>
                            <strong id="displayQuantity"></strong>
                        </div>
                        <div class="remote_ct quantity-container">
                            <button class="decrease"><i class="fa fa-minus"></i></button>
                            <input type="number" min="1" name="soluong" class="quantitybtn" value="1">
                            <button class="increase"><i class="fa fa-plus"></i></button>
                            <div class="btn_gh_ct">
                                
                                <form action="index.php?act=addgiohang" method="post">
                                    <?php foreach($spbt as $giohang) {
                                        // extract($giohang);
                                        echo '
                                                <input type="hidden" name="idpro" value="'.$giohang['idpro'].'">
                                                <input type="hidden" name="id" value="'.$giohang['mabt'].'">
                                                <input type="hidden" name="img" value="'.$giohang['img'].'">
                                                <input type="hidden" name="namepro" value="'.$giohang['namepro'].'">
                                                <input type="hidden" name="price" value="'.$giohang['price'].'">
                                                <input type="hidden" name="discount" value="'.$giohang['discount'].'">
                                                <input type="hidden" id="inputColor" name="mau" value="'.$giohang['mau'].'">
                                                <input type="hidden" id="inputSize" name="size" value="'.$giohang['size'].'">
                                                <input type="hidden" id="amount-hd" name="soluong" value="1">
                                                ';
                                            }
                                    ?>
                                    <input style="width: 200px;" type="submit" name="addgiohang" value="Thêm vào giỏ hàng">
                                </form>

                            </div>
                            <form action="index.php?act=thanhtoan" method="post">
                                    <?php foreach($spbt as $giohang) {
                                        // extract($giohang);
                                        echo '
                                                <input type="hidden" name="idpro" value="'.$giohang['idpro'].'">
                                                <input type="hidden" name="id" value="'.$giohang['mabt'].'">
                                                <input type="hidden" name="img" value="'.$giohang['img'].'">
                                                <input type="hidden" name="namepro" value="'.$giohang['namepro'].'">
                                                <input type="hidden" name="price" value="'.$giohang['price'].'">
                                                <input type="hidden" name="discount" value="'.$giohang['discount'].'">
                                                <input type="hidden" id="inputColor" name="mau" value="'.$giohang['mau'].'">
                                                <input type="hidden" id="inputSize" name="size" value="'.$giohang['size'].'">
                                                <input type="hidden" id="amount-hd1" name="soluong" value="1">
                                                ';
                                            }
                                    ?>
                                    <input style="width: 200px;" type="submit" name="thanhtoan" value="Thanh toán">
                            </form>
                                    
                        </div>
                        <div class="qua_bottom">
                            Còn lại: <?php foreach($slbt as $sl){echo $sl['soluong'];}; ?> sản phẩm
                        </div>
                        <div>
                            <h2 style="margin: 10px 0 10px 0;">Mô tả</h2>
                            <span>
                                <?= $sanpham['mota']?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {

                    $("#binhluan").load("view/binhluan/binhluan.php", {
                        idpro: <?=$sanpham['id']?>
                    });

                });
            </script>
            <div class="raw" id="binhluan">

            </div>
            <div class="h1ct float">
                <h1>Sản phẩm liên quan</h1>
            </div>
            <div class="kind_pro">
                <div class="productct">
                    <?php foreach ($sanphamcl as $sp) {
                        extract($sp);
                        $link = "index.php?act=sanphamct&id=".$id;
                        echo '
                            <div class="box_pro">
                                <div class="img_pro">
                                    <a href="'.$link.'">
                                        <img src="'.$hinh.$img.'" alt="">
                                    </a>
                                </div>
                                <div class="remote">
                                    <a href="'.$link.'">'.$namepro.'</a>
                                    <div class="price">
                                        <p>'.$price.'<u>đ</u></p>
                                    </div>
                                    <a href="index.php?act=addgiohang">
                                        <input type="button" value="Thêm vào giỏ hàng">
                                    </a>
                                </div>
                            </div>
                        ';
                    }
                    ?>

                </div>
            </div>
        </div>




<?php
// Chuyển đổi mảng $spbt thành mảng dữ liệu độc đáo với các size và màu
$uniqueData = [];

foreach ($spbt as $bienthe) {
    $uniqueData[$bienthe['mau']][] = $bienthe['size'];
}

// Chuyển đổi dữ liệu độc đáo thành mảng cho cả màu và size
$colorData = array_keys($uniqueData);
$sizeData = array_reduce($uniqueData, function ($result, $sizes) {
    return array_merge($result, $sizes);
}, []);

$colorData = array_values(array_unique($colorData));
$sizeData = array_values(array_unique($sizeData));
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const colorData = <?php echo json_encode($colorData); ?>;
        const sizeData = <?php echo json_encode($sizeData); ?>;
        console.log(sizeData);
        console.log(colorData);

        const colorContainer = document.getElementById("colorButtonsContainer");
        const sizeContainer = document.getElementById("sizeButtonsContainer");

        const selectedColorElement = document.getElementById("selectedColor");
        const selectedSizeElement = document.getElementById("selectedSize");

        function createButtons(container, data, selectedElement, clickCallback) {
            data.sort();
            data.forEach(function(item) {
                const button = document.createElement("button");
                button.innerText = item;
                button.addEventListener("click", function() {

                    Array.from(container.children).forEach(function(btn) {
                        btn.classList.remove("selected");
                    });


                    button.classList.add("selected");

                    selectedElement.innerText = item;
                    clickCallback(item);
                });
                container.appendChild(button);
            });
        }

        createButtons(colorContainer, colorData, selectedColorElement, function(selectedColor) {
            // console.log("Selected color: " + selectedColor);
            document.getElementById("inputColor").value = selectedColor;
        });
        
        createButtons(sizeContainer, sizeData, selectedSizeElement, function(selectedSize) {
            // console.log("Selected size: " + selectedSize);
            document.getElementById("inputSize").value = selectedSize;
        });
    });
</script>
<script src="../assets/js/sanphamct.js"></script>