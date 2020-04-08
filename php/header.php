<header id="header">
    <nav class="navbar navbar-dark bg-dark">
        <a href="index.php">
            <i class="fas fa-shopping-basket">Shopping Cart</i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart">Basket</i>
                        <?php getItemsInBasket() ?>
                    </h5>
                </a>
            </div>
        </div>
    </nav>
</header>

<?php
function getItemsInBasket()
{
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
        echo "<span class=\"cart-count text-warning\">$count</span>";
    } else {
        echo "<span class=\"cart-count text-warning\">0</span>";
    }
}
?>