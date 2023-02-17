<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Guitar Shop</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>HIỆU THUỐC CỐ TIẾU</h1>
    </header>
    <main>
        <h1>Đơn Hàng</h1>
        <?php if (empty($_SESSION['cart12']) || 
                count($_SESSION['cart12'])==0) : ?>
            <p>There are no items in your cart.</p>
        <?php else: ?>
            <form action="." method="post">
                <input type="hidden" name="action" value="update">
                <table>
                    <tr id="cart_header">
                        <th class="left">Sản phẩm</th>
                        <th class="right">Giá bán</th>
                        <th class="right">Số lượng</th>
                        <th class="right">Tổng</th>
                    </tr>
                    
                <?php foreach($_SESSION['cart12'] as $key => $item):
                    $cost = number_format($item['cost'],2);
                    $total = number_format($item['total'],2);
                ?>
                    <tr>
                        <td>
                            <?php echo $item['name']; ?>
                        </td>
                        <td class="right">
                            <?php echo $cost; ?> VNĐ
                        </td>
                        <td class="right">
                            <input type="text" class="cart_qty"
                                name="newqty[<?php echo $key; ?>]"
                                value="<?php echo $item['qty']; ?>">
                        </td>
                        <td class="right">
                            <?php echo $total; ?> VNĐ
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr id="cart_footer">
                        <td colspan="3"><b>Subtotal</b></td>
                        <td><?php echo get_subtotal(); ?> VNĐ</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="right">
                            <input type="submit" value="Update Cart">
                        </td>
                    </tr>
                </table>
                <p>Nhấn vào "Update Cart" để cập nhật số lượng ở trong giỏ hàng. 
                    Nhập vào quantity là 0 để xóa mặt hàng.</p>
            </form>
        <?php endif; ?>
        <p><a href=".?action=show_add_item">Thêm sản phẩm</a></p>
        <p><a href=".?action=empty_cart">Xóa hết giỏ hàng</a></p>
    </main>
</body>
</html>