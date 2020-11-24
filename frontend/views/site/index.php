<?php
/**
* Class and Function List:
* Function list:
* Classes list:
*/
use frontend\models\CatalogCategory;
use frontend\widgets\CategorySidebar;
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'Hot Bargains';
?>
<section>
  <div class="categories-home3" style="margin-top:10px;">
    <div class="container container-home-3 ">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="categories-homepage-v3">
            <div class="cate-hp-3 ">
              <img class="js-push-menu" src="images/menu.png" alt="">
              <a href="">Shop By Categories
              </a>
            </div>
            <?php echo CategorySidebar::widget([
                    'items' => CatalogCategory::getCategoryFiletrs(1) , 
                    'options' => ['class' => 'nav-home5 js-menubar nav-megamenu']
                ]);
            ?>
          </div>
          <div id="flip">
            <button type="">
              <img src="images/menu.png" alt="">Shop By Categories
            </button> 
          </div>
          <div id="panel">
            <?php echo CategorySidebar::widget([
                    'items' => CatalogCategory::getCategoryFiletrs(1) ,
                    'options' => ['class' => 'nav-home5 js-menubar nav-megamenu nav-cate-home3']
                ]);
            ?>
          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 owl-center" style="padding-left:0px;">
          <?php if (Yii::$app->hasModule('banner')): ?>
          <div class="kids-st  kids-img-home-3">
            <div class="owl-carousel owl-theme owl-cate v2 js-owl-cate-hp1">
              <?php foreach (Yii::$app->getModule('banner')->getHomeBanners() as $slides): ?>
              <a href="<?=Url::toRoute([$slides->link_to]); ?>" title="<?=$slides->title ?>"> 
                <img class="img-responsive" src="<?=$slides->image; ?>" alt="<?=$slides->title ?>" />
              </a>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" >
          <div class="specialbar" style="">
            <div class="col-md-3 col-xs-6 specialmob" >
              <div class="specialbox">
                <div class="col-md-3 col-xs-4">
                  <i class="fa fa-truck">
                  </i>
                </div>
                <div class="col-md-9 col-xs-8" style="padding:0px;">
                  <h3>Free Delivery
                    <br/>
                    <span>Next Day Delivery
                    </span>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-xs-6 specialmob">
              <div class="specialbox specialboxm">
                <div class="col-md-3 col-xs-4">
                  <i class="fa fa-refresh">
                  </i>
                </div>
                <div class="col-md-9 col-xs-8" style="padding:0px;">
                  <h3>30 Days
                    <br/>
                    <span>For Free Return
                    </span>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-xs-6 specialmob">
              <div class="specialbox ">
                <div class="col-md-3 col-xs-4">
                  <i class="fa fa-credit-card">
                  </i>
                </div>
                <div class="col-md-9 col-xs-8" style="padding:0px;">
                  <h3>Payment
                    <br/>
                    <span>Secure System
                    </span>
                  </h3>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-xs-6 specialmob">
              <div class="specialbox" style="border:none;">
                <div class="col-md-3 col-xs-4">
                  <i class="fa fa-tag">
                  </i>
                </div>
                <div class="col-md-9 col-xs-8" style="padding:0px;">
                  <h3>Only Best
                    <br/>
                    <span>Brands
                    </span>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" style="padding:0px; margin-bottom:15px;">
          <div class="col-md-4 sale">
            <img src="images/s1.jpg" class="img-responsive"/>
            <img src="images/sale.png" style="position:absolute; top:0px; left:0px; height:100px; margin:20px;" />
            <h4>Craft Accessories
            </h4>
          </div>
          <div class="col-md-4 sale">
            <img src="images/s2.jpg" class="img-responsive"/>
            <img src="images/sale.png" style="position:absolute; top:0px; left:0px; height:100px; margin:20px;" />
            <h4>Kitchen Storage
            </h4>
          </div>
          <div class="col-md-4 sale">
            <img src="images/s3.jpg" class="img-responsive"/>
            <img src="images/sale.png" style="position:absolute; top:0px; left:0px; height:100px; margin:20px;" />
            <h4>Kitchen Appliances
            </h4>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <!-- categories -->
 
 
 
  <div class="new-arrival">
    <div class="container container-home-3">
      <div class="row">
        <div class=" col-md-12 col-sm-12 col-xs-12 fix-pd-right-homepage3">
          <div class="bn3">
            <a href="#" class="hover-images">
              <img src="images/bn3.jpg" alt="">
            </a>
          </div>
          
          <!-- Featured -->
          
          <?php if (Yii::$app->hasModule('featuredproducts')): ?>
          <div class="title-pro-v1 hp1">
            <h3 class="related-title text-center hp1 hp2 texttitle-home-3">Featured Products
            </h3>
            <p>
              <a class="view" href="<?=Url::toRoute(['/category']); ?>">View All Products
                <i class="fa fa-angle-right" aria-hidden="true">
                </i>
              </a>
            </p>
          </div>
          <div class="group-line">
              <div class="fashion">
                <a href="" >
                  <img src="images/img105.jpg" alt="">
                </a>
                <div class="ul-home3">
                  <?php echo CategorySidebar::widget([
                    'items' => CatalogCategory::getCategoryFiletrs(1) ,
                    'options' => ['class' => '']
                    ]);
                ?>
                </div>
              </div>
              <div class="featured-homepage1 home3">
                <div class="product-related hp1 pro-home-3">
                  <div class="owl-carousel owl-theme owl-cate v2 js-owl-cate-feat-home3 owl-home3">
                    <?php foreach (Yii::$app->getModule('featuredproducts')->getFeaturedProducts() as $FeaturedProduct): ?>
                  
                    <div class="product-item pro-v1 home1 product-home3">
                      <div class="product-img product-img-home3">
                        <a class="" href="<?=Url::toRoute(['/product/'.$FeaturedProduct->slug]);?>">
                          <img src="<?= $FeaturedProduct->getImage();?>" alt="" class="img-responsive">
                        </a>
                        
                      </div>
                      <div class="sale-para2 shop-1 pro-v1 hp2-para home-3">
                        <p>
                          <a href="<?=Url::toRoute(['/product/'.$FeaturedProduct->slug]);?>"><?=$FeaturedProduct->name;?>
                          </a>
                        </p>
                        <div class="star-icons">
                            <ul>
                                <li>
                                
                                </li>
                            </ul>
                        </div>
                        <div class="review-hp1 hp3">
                            <?= $FeaturedProduct->getSalePrice("<p>{{sell_price}}</p><del>{{price}}</del>"); ?>
                        </div>
                      </div>
                    </div>
                    <?php endforeach;?>
                    
                    
                   
                    
                  </div>
                </div>
              </div>
          </div>
          <?php endif; ?>
          
          <!-- //Featured -->
          
          
          <div class="bn4-5 bn-4-5-home3">
            <div class="bn4">
              <a href="#" class="hover-images">
                <img src="images/bn4.jpg" alt="">
              </a>
            </div>
            <div class="bn5">
              <a href="#" class="hover-images">
                <img src="images/bn5.jpg" alt="">
              </a>
            </div>
          </div>
          <!-- Trending -->
          <?php if (Yii::$app->hasModule('trendingproducts')): ?>
          <div class="title-pro-v1 hp1">
            <h3 class="related-title text-center hp1 hp2 texttitle-home-3 toys">Trending Products
            </h3>
            <p>
              <a class="view" href="<?=Url::toRoute(['/category']); ?>">View All Products
                <i class="fa fa-angle-right" aria-hidden="true">
                </i>
              </a>
            </p>
          </div>
          <div class="group-line">
            <div class="fashion">
              <a href="">
                <img src="images/img106.jpg" alt="">
              </a>
              <div class="ul-home3 toys">
                <?php echo CategorySidebar::widget([
                    'items' => CatalogCategory::getCategoryFiletrs(1) ,
                    'options' => ['class' => '']
                    ]);
                ?>
              </div>
            </div>
            <div class="featured-homepage1 home3">
              <div class="product-related hp1 pro-home-3">
                <div class="owl-carousel owl-theme owl-cate v2 js-owl-cate-feat-home3 owl-home3">
                
                    <?php foreach (Yii::$app->getModule('trendingproducts')->getTrendingProducts() as $TrendingProduct): ?>
                  
                    <div class="product-item pro-v1 home1 product-home3">
                      <div class="product-img product-img-home3">
                        <a class="" href="<?=Url::toRoute(['/product/'.$TrendingProduct->slug]);?>">
                          <img src="<?= $TrendingProduct->getImage();?>" alt="" class="img-responsive">
                        </a>
                        
                      </div>
                      <div class="sale-para2 shop-1 pro-v1 hp2-para home-3">
                        <p>
                          <a href="<?=Url::toRoute(['/product/'.$TrendingProduct->slug]);?>"><?=$TrendingProduct->name;?>
                          </a>
                        </p>
                        <div class="star-icons">
                            <ul>
                                <li>
                                
                                </li>
                            </ul>
                        </div>
                        <div class="review-hp1 hp3">
                            <?= $TrendingProduct->getSalePrice("<p>{{sell_price}}</p><del>{{price}}</del>"); ?>
                        </div>
                      </div>
                    </div>
                    <?php endforeach;?>
                    
                    
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>
            <!-- //Trending -->
          
          <!-- Bestseller -->
          <?php if (Yii::$app->hasModule('bestsellers')): ?>
          <div class="title-pro-v1 hp1">
            <h3 class="related-title text-center hp1 hp2 texttitle-home-3 education">Best Seller
            </h3>
            <p>
              <a class="view" href="<?=Url::toRoute(['/category']); ?>">View All Products
                <i class="fa fa-angle-right" aria-hidden="true">
                </i>
              </a>
            </p>
          </div>
          <div class="group-line">
              <div class="fashion">
                <a href="" class="">
                  <img src="images/img-hp3.jpg" alt="">
                </a>
                <div class="ul-home3 edu">
                  <?php echo CategorySidebar::widget([
                    'items' => CatalogCategory::getCategoryFiletrs(1) ,
                    'options' => ['class' => '']
                    ]);
                  ?>
                </div>
              </div>
              <div class="featured-homepage1 home3">
                <div class="product-related hp1 pro-home-3">
                    <div class="owl-carousel owl-theme owl-cate v2 js-owl-cate-feat-home3 owl-home3">
                    
                        <?php foreach (Yii::$app->getModule('bestsellers')->getBestsellers() as $Bestseller): ?>
                  
                        <div class="product-item pro-v1 home1 product-home3">
                          <div class="product-img product-img-home3">
                            <a class="" href="<?=Url::toRoute(['/product/'.$Bestseller->slug]);?>">
                              <img src="<?= $Bestseller->getImage();?>" alt="" class="img-responsive">
                            </a>
                            
                          </div>
                          <div class="sale-para2 shop-1 pro-v1 hp2-para home-3">
                            <p>
                              <a href="<?=Url::toRoute(['/product/'.$Bestseller->slug]);?>"><?=$Bestseller->name;?>
                              </a>
                            </p>
                            <div class="star-icons">
                                <ul>
                                    <li>
                                    
                                    </li>
                                </ul>
                            </div>
                            <div class="review-hp1 hp3">
                                <?= $Bestseller->getSalePrice("<p>{{sell_price}}</p><del>{{price}}</del>"); ?>
                            </div>
                          </div>
                        </div>
                        <?php endforeach;?>
                    
                    </div>
                </div>
              </div>
          </div>
          
          <?php endif; ?>
           
          <!-- //Bestseller -->
          
          <div class="row">
            <div class="container">
              <h3 style="text-align:center; margin-bottom:30px;">Featured Categories
              </h3>
              <div class="col-md-4">
                <div class="feature" style="background:url(images/f1.png) no-repeat; background-size:40%; background-position:bottom right;">
                  <h4>Baby Product
                  </h4>
                  <ul>
                    <li>Sunshade Baby Paddling Pool
                    </li>
                    <li>Buggy Push Chair
                    </li>
                    <li>Millilitre Bubbles Peppa Pig
                    </li>
                    <li>Swimming Pool Paddling
                    </li>
                    <li>Bar Hook Strap Pram
                    </li>
                    <li>Armbands Inflatable 
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="feature" style="background:url(images/f2.png) no-repeat; background-size:40%; background-position:bottom right;">
                  <h4 style="background:#46b9e4;">Cloth,Shoes & Accessories
                  </h4>
                  <ul>
                    <li>Sunshade Baby Paddling Pool
                    </li>
                    <li>Buggy Push Chair
                    </li>
                    <li>Millilitre Bubbles Peppa Pig
                    </li>
                    <li>Swimming Pool Paddling
                    </li>
                    <li>Bar Hook Strap Pram
                    </li>
                    <li>Armbands Inflatable Kids Swim Aid 
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="feature" style="background:url(images/f3.png) no-repeat; background-size:40%; background-position:bottom right;">
                  <h4>Fitness
                  </h4>
                  <ul>
                    <li>Sunshade Baby Paddling Pool
                    </li>
                    <li>Buggy Push Chair
                    </li>
                    <li>Millilitre Bubbles Peppa Pig
                    </li>
                    <li>Swimming Pool Paddling
                    </li>
                    <li>Bar Hook Strap Pram
                    </li>
                    <li>Armbands Inflatable
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="feature" style="background:url(images/f4.png) no-repeat; background-size:50%; background-position:bottom right;">
                  <h4 style="background:#46b9e4;">Home & Kitchen
                  </h4>
                  <ul>
                    <li>Sunshade Baby Paddling Pool
                    </li>
                    <li>Buggy Push Chair
                    </li>
                    <li>Millilitre Bubbles Peppa Pig
                    </li>
                    <li>Swimming Pool Paddling
                    </li>
                    <li>Bar Hook Strap Pram
                    </li>
                    <li>Armbands Inflatable  
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="feature" style="background:url(images/f5.png) no-repeat; background-size:50%; background-position:bottom right;">
                  <h4>Pet Supplies
                  </h4>
                  <ul>
                    <li>Sunshade Baby Paddling Pool
                    </li>
                    <li>Buggy Push Chair
                    </li>
                    <li>Millilitre Bubbles Peppa Pig
                    </li>
                    <li>Swimming Pool Paddling
                    </li>
                    <li>Bar Hook Strap Pram
                    </li>
                    <li>Armbands Inflatable 
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="feature" style="background:url(images/f6.png) no-repeat; background-size:50%; background-position:bottom right;">
                  <h4 style="background:#46b9e4;">Travel Accessories
                  </h4>
                  <ul>
                    <li>Sunshade Baby Paddling Pool
                    </li>
                    <li>Buggy Push Chair
                    </li>
                    <li>Millilitre Bubbles Peppa Pig
                    </li>
                    <li>Swimming Pool Paddling
                    </li>
                    <li>Bar Hook Strap Pram
                    </li>
                    <li>Armbands Inflatable 
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Sign up to -->
          <div class="sign-up">
            <div class="miukid-hp3">
              <h4>Sign up to
                <span>Miukid
                </span>
              </h4>
            </div>
            <div class="form-home3">
              <form class="form_newsletter hp1 sign-hp3" action="#" method="post">
                <input type="email" value="" placeholder="Enter your emaill" name="EMAIL" id="mail" class="newsletter-input form-control">
                <button id="subscribe" class="button_mini zoa-btn button bt-hp3
                                              " type="submit">
                  Subscribe
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
