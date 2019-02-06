<?php
$pathPrdImg = Yii::$app->params['PATH_PRODUCT_IMAGE'];
$prdNoImg = 'noImage.png';
$cartProducts = ($cartData) ? array_column($cartData, 'cart_product_id') : [];
?>

<?php
            if ($categoryProducts) {
                foreach ($categoryProducts as $key => $categoryProduct) {
                    $prdImage = (isset($categoryProduct->productImages[0])) ? $pathPrdImg . $categoryProduct->product_code . '/' . $categoryProduct->productImages[0]->cover_photo : $pathPrdImg . $prdNoImg;
                    ?>
                    <div class="col-xs-12">
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="<?php echo $prdImage; ?>" alt="Image">
                                <!--<span class="maskingImage"><a data-toggle="modal" href=".quick-view" class="btn viewBtn">Quick View</a></span>-->
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="<?php echo Yii::$app->homeUrl . 'shop/product/' . $categoryProduct->id; ?>" title="<?= $categoryProduct->product_name; ?>"><?= $categoryProduct->product_name; ?></a>
                                </h4>
                                <p><?= $categoryProduct->product_short_description; ?></p>
                                <h4>&#x20B9; <?= $categoryProduct->product_sale_price; ?></h4>
                                <div class="btn-group" role="group">
                                    <!--<button type="button" class="btn btn-default userFavorite" data-favorite="1" data-product-id="<?= $categoryProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    </button>-->
                                    <?php 
                                    $favoriteClass = (in_array($categoryProduct->id, $userFavoriteProducts)) ? 'userFavorited' : '';                                    ?>
                                    <span class="btn btn-default userFavorite <?= $favoriteClass; ?>" data-product-id="<?= $categoryProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>">
                                        <i class="fa fa-heart" aria-hidden="true" style="margin-top:  8px;"></i>
                                    </span>
                                    <?php
                                    if (in_array($categoryProduct->id, $cartProducts)) {
                                        $cartDisabled = 'disabled';
                                        $cartClass = 'cartYes';
                                    } else {
                                        $cartDisabled = '';
                                        $cartClass = '';
                                    }
                                    ?>
                                    <button type="button" class="btn btn-default add_to_cart <?= $cartClass; ?>" data-product-id="<?= $categoryProduct->id; ?>" data-user-id="<?php echo (!Yii::$app->user->isGuest) ? Yii::$app->user->id : 'guest'; ?>" <?= $cartDisabled; ?>>
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            } else {
                // No results found
                ?>
                <div class="col-xs-12">
                    <div class="media">
                        <div class="media-body"><p classs="text-muted">No results found</p>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>