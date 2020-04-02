<?php
function displayProduct($imageURL, $originalPrice, $discountPrice)
{
    $product = "
    <div class=\"col\">
    <form action=\"./index.php\" method=\"post\">
        <div class=\"card\" style=\"width: 18rem;\">
            <img class=\"card-img-top\" src=\"./img/$imageURL\" alt=\"Card image cap\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">Card title</h5>
                <h6>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                    <i class=\"fas fa-star\"></i>
                </h6>
                <p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class=\"purchase\">
                    <small><s>£$originalPrice</s></small>
                    <span>£$discountPrice</span>
                    <button class=\"btn btn-success\" type=\"submit\" name=\"add\">
                        <i class=\"fas fa-shopping-cart\"></i>Add to cart
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
    ";

    echo $product;
}
