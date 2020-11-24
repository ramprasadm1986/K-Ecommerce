<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\CatalogProductAttribute;
use common\models\CatalogProductAttributesOption;

/* @var $this yii\web\View */

$this->title = $product->name;
?>
<section>
         <div class="product-v1 pro-v2 pro-v4">
            <div class="container">
               <div class="menu-prv1">
                  <ul>
                     <li><a href="<?= Url::home(); ?>">Home</a></li>
                     <li>/</li>
                     <li><a href="<?=Url::toRoute(['/category']);?>">Shop Products</a></li>
                     <li>/</li>
                     <li><?= $product->name ?></li>
                  </ul>
               </div>
               <div class="row">
                  <div class="col-md-7 col-sm-7 col-xs-12 pro-v4">
                     <div class="product-img-slide pro-v2 pro-v3 pro-v4">
                        <div class="product-images quickview">
                           <div class="main-img js-product-slider-normal">
                              <a href="#" class="hover-images effect"><img src="<?= $product->getImage();?>" alt="photo" class="img-responsive"></a>
                              <?php foreach($product->getGalleryImages() as $image) : ?>
                              <a href="#" class="hover-images effect"><img src="<?= $image;?>" alt="photo" class="img-responsive"></a>
                              <?php endforeach;?>
                              
                              <?php if($product->IsVariable()):?>
                                    <?php  foreach($product->catalogProductVariations as $variation) : ?>
                                    
                                     <a href="#" id="variant_img_<?= $variation->id;?>" class="hover-images effect"><img src="<?= $variation->image;?>" alt="photo" class="img-responsive"></a>
                                    <?php endforeach; ?>
                              
                              <?php endif;?>
                           </div>
                        </div>
                        <div class="multiple-img-list js-click-product-normal pro-v2 pro-v3">
                           <div class="product-col pro-v2">
                              <div class="img active pro-v2 pro-v3 pro-v4">
                                 <img src="<?= $product->getImage();?>" alt="photo" class="img-responsive">
                              </div>
                           </div>
                           <?php foreach($product->getGalleryImages() as $image) : ?>
                           <div class="product-col pro-v2">
                              <div class="img pro-v2 pro-v3 pro-v4">
                                 <img src="<?= $image;?>" alt="photo" class="img-responsive">
                              </div>
                           </div>
                           <?php endforeach;?>
                          
                        </div>
                     </div>
                  </div>
                  <div class="col-md-5 col-sm-5 col-xs-12">
                     <div class="product-info s8 pro-v1 pro-v2 pro-v4">
                        <div class="sale-para2 shop-1 pro-v1 shop-5 shop-6 shop-7 shop-8 pro-v1 pro-v2">
                           <p><a href="<?=Url::toRoute(['/product/'.$product->slug]);?>"><?= $product->name ?></a></p>
                           <ul>
                              <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                              <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                              <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                              <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                              <li class="st"><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a><em><span>6 Review(s)</span></em></li>
                              <li><a class="sales-36-products" href="#"><?=$product->getSalePrice();?></a></li>
                           </ul>
                        </div>
                        <div class="short-desc">
                           <p class="product-desc s8 pro-v1 pro-v2 pro-v4"><?=$product->short_description;?></p>
                        </div>                        
                       
                       
                        <div class="product-bottom-group shop7 s8 pro-v1 pro-v2">
                           
                          <?php  
                            $CPAttribute_ids=[];
                            foreach($product->cPAttributes as $CPAttribute): ?>
                           <?php $CPAttribute_ids[]='attribute_id'.$CPAttribute->id;?>
                            <?= Html::dropDownList($CPAttribute->name, null,
                            ArrayHelper::map(CatalogProductAttributesOption::find()->where(['attribute_id'=>$CPAttribute->id])->all(), 'name', 'name'),['id'=>'attribute_id'.$CPAttribute->id,'prompt' =>'Select '.$CPAttribute->name,'onchange'=>"SwitchPrice();"]) ?>
                           
                        <?php endforeach;?>
                        
                        
                        
                           <a onclick="addtoCart('<?=Url::to(['/cart/add'])?>',<?=$product->id?>,true)" class="fa fa-shopping-cart shop7 pro-v1">
                           <span class="zoa-icon-quick-view shop7"></span>
                           </a> 
                           <a href="#" class="fa fa-heart shop7">
                           <span class="zoa-icon-cart shop7"></span>
                           </a>
                        </div>
                        
                        <div class="size-guide pro-v2 pro-v4">
                           
                           <div class="sku pro-v1">
                              <?php if($product->IsVariable()):?>
                        
                               <p> <a class="sales-36-products" href="#" id="variable_price"> </a></p><br>
                              <?php  endif;?>
                              <p>SKU: <span><?= $product->sku; ?></span></p>
                              <br>
                              <p>Categories: <span><?= $product->getCategories();?></span></p>
                              <!-- p>Tags: <span>jewellery, jackets, masonry, shoes, short</span></p -->
                           </div>
                        </div>
                        <div class="share-shop7 s8">
                           <ul>
                              <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                              <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                              <li><a href=""><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                              <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- details -->
         <!-- details -->
         <div class="container">
            <div class="single-product-tab bd-bottom product-v3-bt">
               <ul class="tabs text-center">
                  <li class="active"><a data-toggle="pill" href="#review">Description</a></li>
                  <li><a data-toggle="pill" href="#desc">Additional information</a></li>
                  <li><a data-toggle="pill" href="#add">Reviews(s)</a></li>
               </ul>
               <div class="tab-content">
                  <div id="desc" class="tab-pane fade in ">
                     <div class="para-v4">
                        <p><em>Duis id odio quis purus lacinia</em> viverra non eget sapien. Aenean sed tortor sapien. Aenean ut iaculis justo, in hendrerit sem. Ut ac tincidunt velit, ac ultrices est. <strong>Nullam eu massa auctor, </strong>aecenas in ligula neque. Etiam nec ligula finibus, scelerisque tellus sed, rutrum mauris. Donec iaculis mattis interdum. Praesent et mauris non orci lacinia dignissim. Pellentesque vel sapien <em>ut ante interdum aliquam.</em></p>
                     </div>
                     <div class="para-v4 bgr">
                        <p><span>"</span><em>Nullam eu massa auctor, euismod arcu eget, suscipit nisl. Maecenas in ligula neque. Etiam nec ligula finibus, scelerisque tellus sed, rutrum mauris. Donec iaculis mattis interdum. Praesent et mauris non orci lacinia dignissim. Pellentesque vel sapien ut ante interdum aliquam.</em></p>
                     </div>
                     <div class="row two">
                        <div class="col-md-4 col-sm-5 col-xs-12">
                           <div class="img-v4">
                              <a href="#" class="plus-zoom"><img src="images/img36.jpg" alt="img"></a>
                              <p>Photo: Baby happy with Zara</p>
                           </div>
                        </div>
                        <div class="col-md-8 col-sm-7 col-xs-12">
                           <div class="para-v4">
                              <p><em>Duis id odio quis purus lacinia</em> viverra non eget sapien. Aenean sed tortor sapien. Aenean ut iaculis justo, in hendrerit sem. Ut ac tincidunt velit, ac ultrices est. <strong>Nullam eu massa auctor, </strong>aecenas in ligula neque. Etiam nec ligula finibus, scelerisque tellus sed, rutrum mauris. Donec iaculis mattis interdum. Praesent et mauris non orci lacinia dignissim. Pellentesque vel sapien <em>ut ante interdum aliquam.</em></p>
                           </div>
                           <div class="para-v4">
                              <p><em>Duis id odio quis purus lacinia</em> viverra non eget sapien. Aenean sed tortor sapien. Aenean ut iaculis justo, in hendrerit sem. Ut ac tincidunt velit, ac ultrices est. <strong>Nullam eu massa auctor, </strong>aecenas in ligula neque. Etiam nec ligula finibus, scelerisque tellus sed, rutrum mauris. Donec iaculis mattis interdum. Praesent et mauris non orci lacinia dignissim. Pellentesque vel sapien <em>ut ante interdum aliquam.</em></p>
                           </div>
                        </div>
                     </div>
                     <div class="para-v4">
                        <p><em>Duis id odio quis purus lacinia</em> viverra non eget sapien. Aenean sed tortor sapien. Aenean ut iaculis justo, in hendrerit sem. Ut ac tincidunt velit, ac ultrices est. <strong>Nullam eu massa auctor, </strong>aecenas in ligula neque. Etiam nec ligula finibus, scelerisque tellus sed, rutrum mauris. Donec iaculis mattis interdum. Praesent et mauris non orci lacinia dignissim. Pellentesque vel sapien <em>ut ante interdum aliquam.</em></p>
                     </div>
                     <div class="share">
                        <div class="share2">
                           <p>Share: </p>
                        </div>
                        <div class="ul-li v4">
                           <ul>
                              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     <br>
                     <div class="jan">
                        <div class="left-v4 margin-product-v3">
                           <a href="#"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                           <p>La Femme For Flaunt Magazine<br> <em>Jan 30, 2018</em></p>
                        </div>
                        <div class="right-v4">
                           <a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                           <p>How did gardener and the gang first...<br> <em>Jan 30, 2018</em></p>
                        </div>
                     </div>
                  </div>
                  <div id="review" class="tab-pane fade in active ">
                     <div class="para-details">
                        <p>This lovely green striped dress with ruffles over the shoulders is by French designer Tartine et Chocolat.
                           Made in soft, fine cotton, it has beautifully embroidered dragonflies and sequinned flowers, and there are mother-of-pearl logo button fasteners on the back.
                        </p>
                     </div>
                     <div class="para-details">
                        <p>Marco Campomaggi thinks, dreams, and designs collections of handbags, which combine the ancient
                           art of treating leather with creativity, precision, and painstaking care in craftsmanship. Unique,
                           one-of-a-kind, handmade bags, which do not get old after one season, but acquire value as time goes
                           by. Because time doesn’t take away; it enhances.
                        </p>
                     </div>
                     <div class="notes">
                        <ul>
                           <li>100% soft, fine cotton</li>
                           <li>Machine wash (30*C)</li>
                           <li>Button fastenings</li>
                        </ul>
                     </div>
                  </div>
                  <div id="add" class="tab-pane fade in">
                     <div class="para-pro-v1">
                        <p>Be the first to review “Calvin Klein Logo Sweatpants” <br>
                           <span>The email address will not be published. Required fields are marked*</span>
                        </p>
                     </div>
                     <div class="rating">
                        <h4>Your rating:</h4>
                        <ul>
                           <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                           <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                           <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                           <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                           <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        </ul>
                     </div>
                     <div class="form-v4 pro-v1">
                        <form method="post" class="form-customer form-login">
                           <div class="form-group review">
                              <p>Your review*</p>
                              <input type="text" class="form-control form-account">
                           </div>
                           <div class=" form-group name pro-v1">
                              <p>Name*</p>
                              <input type="text" class="form-control form-account" >
                           </div>
                           <div class="form-group email pro-v1">
                              <p>Email address*</p>
                              <input type="email" class="form-control form-account" >
                           </div>
                           <div class="btn-button-group mg-top-30 mg-bottom-15">
                              <button type="submit" class="zoa-btn btn-login hover-white">Submit</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="product-related pd-products">
               <div class="title-pro-v1">
                  <h3 class="related-title text-center">Related Products</h3>
                  <p><a href="">View All Products<i class="fa fa-angle-right" aria-hidden="true"></i></a></p>
               </div>
               <div class="owl-carousel owl-theme owl-cate v2 js-owl-cate">
                  <div class="product-item pro-v1 ">
                     <div class="product-img">
                        <a href=""><img src="images/img110.jpg" alt="" class="img-responsive"></a>
                        <div class="sale-img shop1 shop2">
                           <div class="before shop1 v2 pro-v1 before-pro-v1"></div>
                        </div>
                        <div class="ribbon zoa-hot shop-v1 new-pro-v1"><span>New</span></div>
                        <div class="product-button-group product-details">
                           <a href="#" class="zoa-btn zoa-quickview">
                           <span class="fa fa-shopping-cart"></span>
                           </a>
                           <a href="#" class="zoa-btn zoa-wishlist">
                           <span class="fa fa-balance-scale"></span>
                           </a>
                           <a href="#" class="zoa-btn zoa-addcart">
                           <span class="fa fa-heart"></span>
                           </a>
                        </div>
                     </div>
                     <div class="sale-para2 shop-1 pro-v1">
                        <p><a href="#">Vladimir the Fox</a></p>
                        <ul>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li class="st-rv"><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a><em><span>6 Review(s)</span></em></li>
                           <li><a class="sales-36"  href="#">$36.00</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="product-item pro-v1">
                     <div class="product-img">
                        <a href=""><img src="images/img50.jpg" alt="" class="img-responsive"></a>
                        <div class="product-button-group product-details">
                           <a href="#" class="zoa-btn zoa-quickview">
                           <span class="fa fa-shopping-cart"></span>
                           </a>
                           <a href="#" class="zoa-btn zoa-wishlist">
                           <span class="fa fa-balance-scale"></span>
                           </a>
                           <a href="#" class="zoa-btn zoa-addcart">
                           <span class="fa fa-heart"></span>
                           </a>
                        </div>
                     </div>
                     <div class="sale-para2 shop-1 pro-v1">
                        <p><a href="#">Vladimir the Fox</a></p>
                        <ul>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li class="st-rv"><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a><em><span>6 Review(s)</span></em></li>
                           <li><a class="sales-36"  href="#">$36.00</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="product-item pro-v1">
                     <div class="product-img">
                        <a href=""><img src="images/img51.jpg" alt="" class="img-responsive"></a>
                        <div class="product-button-group product-details">
                           <a href="#" class="zoa-btn zoa-quickview">
                           <span class="fa fa-shopping-cart"></span>
                           </a>
                           <a href="#" class="zoa-btn zoa-wishlist">
                           <span class="fa fa-balance-scale"></span>
                           </a>
                           <a href="#" class="zoa-btn zoa-addcart">
                           <span class="fa fa-heart"></span>
                           </a>
                        </div>
                     </div>
                     <div class="sale-para2 shop-1 pro-v1">
                        <p><a href="#">Vladimir the Fox</a></p>
                        <ul>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li class="st-rv"><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a><em><span>6 Review(s)</span></em></li>
                           <li><a class="sales-36" href="#">$36.00</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="product-item pro-v1">
                     <div class="product-img">
                        <a href=""><img src="images/img111.jpg" alt="" class="img-responsive"></a>
                        <div class="sale-img shop1 shop2 st-v2">
                           <div class="before shop1 v2 pro-v1 before-pro-v1 st-v2"></div>
                        </div>
                        <div class="ribbon zoa-hot shop-v1 new-pro-v1 v2"><span>-25%</span></div>
                        <div class="product-button-group product-details">
                           <a href="#" class="zoa-btn zoa-quickview">
                           <span class="fa fa-shopping-cart"></span>
                           </a>
                           <a href="#" class="zoa-btn zoa-wishlist">
                           <span class="fa fa-balance-scale"></span>
                           </a>
                           <a href="#" class="zoa-btn zoa-addcart">
                           <span class="fa fa-heart"></span>
                           </a>
                        </div>
                     </div>
                     <div class="sale-para2 shop-1 pro-v1">
                        <p><a href="#">Vladimir the Fox</a></p>
                        <ul>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li class="st-rv"><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a><em><span>6 Review(s)</span></em></li>
                           <li><a class="sales-36" href="#">$36.00</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="product-item pro-v1">
                     <div class="product-img">
                        <a href=""><img src="images/img112.jpg" alt="" class="img-responsive"></a>
                        <div class="sale-img shop1 shop2">
                           <div class="before shop1 v2 pro-v1 before-pro-v1"></div>
                        </div>
                        <div class="ribbon zoa-hot shop-v1 new-pro-v1"><span>New</span></div>
                        <div class="product-button-group product-details">
                           <a href="#" class="zoa-btn zoa-quickview">
                           <span class="fa fa-shopping-cart"></span>
                           </a>
                           <a href="#" class="zoa-btn zoa-wishlist">
                           <span class="fa fa-balance-scale"></span>
                           </a>
                           <a href="#" class="zoa-btn zoa-addcart">
                           <span class="fa fa-heart"></span>
                           </a>
                        </div>
                     </div>
                     <div class="sale-para2 shop-1 pro-v1">
                        <p><a href="#">Vladimir the Fox</a></p>
                        <ul>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                           <li class="st-rv"><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a><em><span>6 Review(s)</span></em></li>
                           <li><a class="sales-36" href="#">$36.00</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
      <script>
      <?php $currency_Symbol=Yii::getAlias('@currency'); ?>
      var price_variation=<?= json_encode($ProductVariation['price']);?>;
      var variation_ids=<?= json_encode($ProductVariation['ids']);?>;
      var CPAttribute_ids=<?= json_encode($CPAttribute_ids);?>;
      var currency_Symbol="<?php echo $currency_Symbol;?>";
      </script>