<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐÔNG Y CỔ TRUYỀN</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>Hiệu Thuốc Cố Tiếu</h1>
    </header>
    <main>
        <h1>Thêm Sản Phẩm</h1>
        <form action="." method="post">
            <input type="hidden" name="action" value="add">

            <label>Name:</label>
            <select name="productkey">
                <?php foreach($products as $key => $product) : 
                    $cost = number_format($product['cost'],2);
                    $name = $product['name'];
                    $item = $name . ' ($' . $cost . ')';
                ?>
                <option value="<?php echo $key; ?>">
                    <?php echo $item; ?>
                </option>
                <?php endforeach; ?>
            </select><br>
            <label>Quantity:</label>
            <select name="itemqty">
                <?php for($i = 1; $i <= 10; $i++) : ?>
                    <option value="<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </option>
                <?php endfor; ?>
            </select><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Item">
        </form>
        <p><a href=".?action=show_cart">Xem Đơn Hàng</a></p>
    </main>
</body>
</html>
