<form method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" />
    <button type="submit">Submit</button>
</form>
<?php
    require_once './Controllers/ProductController.php';

    echo '<pre>';
    print_r('hello');
    echo '</pre>';
    $productController = new ProductController();
    $rtn = $productController->index();
    echo '<pre>';
    print_r($rtn);
    echo '</pre>';
?>