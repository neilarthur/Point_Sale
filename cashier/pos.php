
<?php

require_once ("../php/connection.php");

if (! empty($_POST["keyword"])) {
    $query = "SELECT * FROM inventory WHERE bar_code like '" . $_POST["keyword"] . "%' AND status = 'active' ORDER BY bar_code LIMIT 0,6";
    $result =mysqli_query($con, $query);
    if (! empty($result)) {
        ?>
<ul id="product-list">
<?php
        foreach ($result as $product) {
            ?>
<li onClick="selectProduct('<?php echo $product["bar_code"]; ?>');"><?php echo $product["bar_code"]." ". $product["item_name"]; ?></li>
<?php } ?>
</ul>
<?php
    }
}
?>