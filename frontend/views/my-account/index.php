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


$menu_items=[
                [
                    'url'=>Url::to(['my-account/index']),
                    'label'=>'My Orders',      
                ],
                [
                    'url'=>Url::to(['site/logout']),
                    'label'=>'Logout', 
                    'data'=>
                        [
                            'data-method'=>'post'
                        ]
                ],
            ];
?>
<section>
  <div class="categories-home3" style="margin-top:10px;">
    <div class="container container-home-3 ">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="categories-homepage-v3">
            <div class="cate-hp-3 ">
              <img class="js-push-menu" src="images/menu.png" alt="">
              <a href="">My Account
              </a>
            </div>
            <?php echo CategorySidebar::widget([
                    'items' => $menu_items, 
                    'options' => ['class' => 'nav-home5 js-menubar nav-megamenu']
                ]);
            ?>
          </div>
          <div id="flip">
            <button type="">
              <img src="images/menu.png" alt="">My Account
            </button> 
          </div>
          <div id="panel">
            <?php echo CategorySidebar::widget([
                    'items' => $menu_items ,
                    'options' => ['class' => 'nav-home5 js-menubar nav-megamenu nav-cate-home3']
                ]);
            ?>
          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 owl-center" style="padding-left:0px;">
         
        </div>
      </div>
    </div>
   </div>
</section>