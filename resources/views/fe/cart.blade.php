<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <title>Shopping Cart</title>
</head>

<body>
    <div class="container">
        <a style="font-size: 25px;text-decoration: none;" href="{{ route('index') }}">Trang chủ| Giỏ hàng</a>
        <br>
        <br>
        <div class="shopping-cart">
            <div class="select-all">
                <label><input type="checkbox" id="select-all"> Chọn tất cả</label>
            </div>
            <table class="shop-cart-table">
                <thead>
                    <tr>
                        <th class="product-select">Lựa chọn</th>
                        <th class="product-thumbnail">Sản phẩm</th>
                        <th class="product-price">Đơn giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="product-subtotal">Số tiền</th>
                        <th class="product-remove">Thao tác</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    @foreach ($cart->list() as $key => $value)
                    <tr>
                        <td class="product-select">
                            <input type="checkbox" class="select-item">
                        </td>
                        <td class="product-thumbnail text-left">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href=""><img src="{{ asset('storage/images') }}/{{ $value['image'] }}" alt="" /></a>
                                </div>
                                <div class="product-info">
                                    <h4 class="post-title">
                                        <p class="text-light-black" href="#"> {{ $value['name'] }}</p>
                                    </h4>
                                </div>
                            </div>
                        </td>
                        <td class="product-price">{{ number_format($value['price']) }} VNĐ</td>
                        <td class="product-quantity">
                            <label for="quantity-{{ $key }}"></label>
                            <input type="number" id="quantity-{{ $key }}" class="quantity form-control" value="{{ $value['quantity'] }}" min="1" max="99">
                        </td>
                        <td class="product-subtotal">{{ number_format($value['price']) }} VNĐ</td>
                        <td class="product-remove">
                            <a onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này?')" href="{{ route('cart.delete', ['id' => $value['productId']]) }}"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="customer-login payment-details mt-30">
                <h4 class="title-1 title-border text-uppercase">CHI TIẾT THANH TOÁN</h4>
                <table>
                    <tbody>
                        <tr>
                            <td class="text-left">Thành tiền</td>
                            <td class="text-end" id="subtotal">0 VNĐ</td>
                        </tr>
                        <tr>
                            <td class="text-left">Phí vận chuyển</td>
                            <td class="text-end">15.000 VNĐ</td>
                        </tr>
                        <tr>
                            <td class="text-left">Tổng số tiền</td>
                            <td class="text-end" id="order-total">0 VNĐ</td>
                        </tr>
                    </tbody>
                </table>
                <button style="width: 100px; height:40px;color:#f03994; background-color:#cab3ed;" id="order-button" disabled>Đặt hàng</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const selectAllCheckbox = document.getElementById('select-all');
            const itemCheckboxes = document.querySelectorAll('.select-item');
            const quantities = document.querySelectorAll('.quantity');
            const orderButton = document.getElementById('order-button');
            const subtotalElement = document.getElementById('subtotal');
            const orderTotalElement = document.getElementById('order-total');
            const cartItems = document.getElementById('cart-items');

            function updateTotals() {
                let subtotal = 0;
                itemCheckboxes.forEach((checkbox, index) => {
                    if (checkbox.checked) {
                        const priceText = checkbox.closest('tr').querySelector('.product-price').textContent;
                        const price = parseInt(priceText.replace(' VNĐ', '').replace(/,/g, ''), 10);
                        const quantityInput = quantities[index];
                        if (quantityInput && quantityInput.value) {
                            const quantity = parseInt(quantityInput.value, 10);
                            subtotal += price * quantity;
                        }
                    }
                });

                subtotalElement.textContent = `${subtotal.toLocaleString()} VNĐ`;
                const shipping = 15000; // Example shipping cost
                const vat = 0; // Example VAT
                const orderTotal = subtotal + shipping + vat;
                orderTotalElement.textContent = `${orderTotal.toLocaleString()} VNĐ`;
                orderButton.disabled = subtotal === 0;
            }

            selectAllCheckbox.addEventListener('change', () => {
                itemCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
                updateTotals();
            });

            itemCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateTotals);
            });

            quantities.forEach((input, index) => {
                input.addEventListener('input', () => {
                    const priceText = itemCheckboxes[index].closest('tr').querySelector('.product-price').textContent;
                    const price = parseInt(priceText.replace(' VNĐ', '').replace(/,/g, ''), 10);
                    const quantity = parseInt(input.value, 10);
                    const subtotal = price * quantity;
                    itemCheckboxes[index].closest('tr').querySelector('.product-subtotal').textContent = `${subtotal.toLocaleString()} VNĐ`;
                    updateTotals();
                });
            });

            // cartItems.addEventListener('click', (event) => {
            //     if (event.target.closest('.product-remove a')) {
            //         event.target.closest('tr').remove();
            //         updateTotals();
            //     }
            // });

            orderButton.addEventListener('click', () => {
                if (Array.from(itemCheckboxes).some(checkbox => checkbox.checked)) {
                    alert('Đặt hàng thành công!');
                } else {
                    alert('Bạn chưa chọn sản phẩm nào');
                }
            });

            updateTotals(); // Initialize totals
        });
    </script>
</body>

</html>
