<?php
function displayProduct($imageURL, $title, $information, $originalPrice, $discountPrice, $productId)
{
    $product = "
    <div class=\"col\">
    <form action=\"./index.php\" method=\"post\">
        <div class=\"card\" style=\"width: 18rem;\">
            <img class=\"card-img-top\" src=\"./img/$imageURL\" alt=\"Card image cap\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">$title</h5>
                <h6>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                </h6>
                <p class=\"card-text\">$information</p>
                <div class=\"purchase\">
                    <small><s>£$originalPrice</s></small>
                    <span>£$discountPrice</span>
                    <button class=\"btn btn-success\" type=\"submit\" name=\"add\">
                        <i class=\"fas fa-shopping-cart\"></i>Add to cart
                    </button>
                    <input type=\"hidden\" name=\"product_id\" value=\"$productId\">
                </div>
            </div>
        </div>
    </form>
</div>
    ";

    echo $product;
}

function displayCartItem($imageURL, $title, $information, $discountPrice)
{
    $cart = "
    <form class=\"cart-items\" action=\"cart.php\" method=\"post\">
                        <div class=\"border\">
                            <div class=\"row\">
                                <div class=\"col-md-4\">
                                    <img style=\"width: 12rem;\" src=\"./img/$imageURL\" alt=\"Image1\">
                                </div>
                                <div class=\"col-md-4\">
                                    <h6>$title</h6>
                                    <p>$information</p>
                                    <p>£$discountPrice</p>
                                    <button class=\"btn btn-danger\" type=\"submit\" name=\"delete\">
                                        <i class=\"fa fa-trash\"></i>
                                    </button>
                                </div>
                                <div class=\"col-md-4\">
                                    <button class=\"rounded-circle\" type=\"button\">
                                        <i class=\"fas fa-minus\"></i>
                                    </button>
                                    <input class=\"form-control\" type=\"text\" value=\"1\">
                                    <button class=\"rounded-circle\" type=\"button\">
                                        <i class=\"fas fa-plus\"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
    ";

    echo $cart;
}
