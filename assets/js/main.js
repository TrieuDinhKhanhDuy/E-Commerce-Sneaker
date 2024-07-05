var displayQuantity = document.getElementById("displayQuantity");
displayQuantity.innerText = '1';
document.addEventListener('DOMContentLoaded', function () {
    var displayQuantity = document.getElementById("displayQuantity");
    var hiddenInput = document.getElementById("amount-hidden");

    // Thiết lập giá trị ban đầu cho thẻ input hidden
    hiddenInput.value = displayQuantity.innerText;

    document.addEventListener('click', function (event) {
        var target = event.target;

        // Kiểm tra xem có phải là nút tăng hoặc giảm không
        if (target.classList.contains('increase') || target.classList.contains('decrease')) {
            // Tìm đến phần tử cha có class 'quantity-container'
            var container = target.closest('.quantity-container');

            if (container) {
                // Lấy ô nhập số lượng bên trong container
                var inputElement = container.querySelector('.quantitybtn');
                var currentValue = parseInt(inputElement.value);

                // Xử lý tăng hoặc giảm giá trị
                if (target.classList.contains('increase')) {
                    inputElement.value = currentValue + 1;
                } else {
                    // Đảm bảo giá trị không nhỏ hơn 1
                    if (currentValue > 1) {
                        inputElement.value = currentValue - 1;
                    }
                }

                // Cập nhật giá trị trong thẻ strong
                displayQuantity.innerText = inputElement.value;

                // Lưu giá trị vào thẻ input hidden
                hiddenInput.value = inputElement.value;
            }
        }
    });
});