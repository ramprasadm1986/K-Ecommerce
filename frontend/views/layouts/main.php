<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\Cart;
if(Yii::$app->session->get('CartIdentifire')!=""){
	$CartIdentifire = Yii::$app->session->get('CartIdentifire');
}else{
	$CartIdentifire = "";
}
$cart_obj = new Cart();
$cartdetails = $cart_obj->getHeadercartdetails($CartIdentifire);
$no_cartitem = $cartdetails['Totalcartitem'];
$cartamount = $cartdetails['Totalamount'];

$imageurl=Yii::$app->homeUrl.'/';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script>
	var HOME_URL	='<?=Yii::$app->homeUrl;?>';
	var STORAGE_URL	='<?=Yii::getAlias('@storageUrl');?>';
	</script>
</head>
<body>
<?php $this->beginBody() ?>

    <!-- push menu-->
	<div class="pushmenu menu-home5">
		<div class="menu-push">
			<span class="close-left js-close"><i class="ion-ios-close-empty f-40"></i></span>
			<div class="clearfix"></div>
			<form role="search" method="get" id="searchform" class="searchform" action="/search">
				<div>
					<label class="screen-reader-text" for="q"></label>
					<input type="text" placeholder="Search for products" value="" name="q" id="q" autocomplete="off">
					<input type="hidden" name="type" value="product">
					<button type="submit" id="searchsubmit"><i class="ion-ios-search-strong"></i></button>
				</div>
			</form>
			<ul class="nav-home5 js-menubar">
				<li class="level1 active dropdown">
					<a href="<?= Url::home(); ?>">Home</a>
					
				</li>
				<li class="level1">
					<a href="index.html">About</a>
					
				</li>
				<li class="level1 active"><a href="<?=Url::toRoute(['/category']);?>">Shop</a>
					
				</li>
				<li class="level1 active"><a href="shop.html">Contact Us</a>
					
				</li>
				
			</ul>
			<ul class="mobile-account">
				<li><a href="#"><i class="fa fa-unlock-alt"></i>Login</a></li>
				<li><a href="#"><i class="fa fa-user-plus"></i>Register</a></li>
				<li><a href="#"><i class="fa fa-heart"></i>Wishlist</a></li>
			</ul>
			<h4 class="mb-title">connect and follow</h4>
			<div class="mobile-social mg-bottom-30">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-google-plus"></i></a>
			</div>
		</div>
	</div>
	<header id="header" class="header-v2">
		<div class="topbar hidden-xs hidden-sm">
			<div class="container">
				<div class="row flex">
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="topbar-left homepage-v1">
							<div class="a">
								<a class="hover-images" href="#"><img src="<?=$imageurl;?>images/icon.png" alt="icon"> welcome to Hot Bargains !</a>
							</div>
							<div class="topbar-social gift">
								<a href="#"><i class="fa fa-gift home3" aria-hidden="true"></i>Gift Vouchers</a>
								<span>02</span>
							</div>
						</div>
					</div>
					<div class="col-md-7 col-sm-12 col-xs-12 justify-content-end">
						<div class="topbar-right homepage-v1">
							<div class="element element-currency">
								<a href="#"><i class="fa fa-language" aria-hidden="true"></i>Language:</a>
								<a id="label3" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span>ENG</span>
									<span class="fa fa-chevron-down"></span>
								</a>
								<ul class="dropdown-menu" aria-labelledby="label3">
									<li><a href="#">EN-English</a></li>
									<li><a href="#">US-American</a></li>
									<li><a href="#">FR-France</a></li>
								</ul>
							</div>
							<div class="element element-leaguage">
								<a href="#"><i class="fa fa-dollar" aria-hidden="true"></i>Curency:</a>
								<a id="label2" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<span>USD</span>
									<span class="fa fa-chevron-down"></span>
								</a>
								<ul class="dropdown-menu" aria-labelledby="label2">
									<li><a href="#">USD-Dollar</a></li>
									<li><a href="#">Eur-Euro</a></li>
									<li><a href="#">GBP-Pound</a></li>
								</ul>
							</div>
							<div class="sign-in">
                                <?php if(!Yii::$app->user->identity): ?>
								<p><a href="<?= Url::to(['site/login']); ?>">Sign in</a></p>
                                <?php else: ?>
                                <p><a href="<?= Url::to(['my-account/index']); ?>">My Account</a></p>
                                <?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-center-1">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-12 col-xs-12 header">
						<div class="logo">
							<a href="<?= Url::home(); ?>"><img src="<?=$imageurl;?>images/logo.png" alt="logo"></a>
						</div>
					</div>
					<div class="col-md-3 col-sm-12 col-xs-12 logo">
						<div class="date2">
							<div class="date">
								<a href="#"><i class="fa fa-calendar st-calendar" aria-hidden="true"></i></a>
							</div>
							<div class="para-a">
								<h4>Mon - Sat 8h00 -18h00</h4>
								<p>Sunday</p>
								<span>CLOSED</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-12 col-xs-12 header-center2">
						<div class="date2">
							<div class="date">
								<a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i></a>
							</div>
							<div class="para-a a2">
								<h4>Every Week Sales!</h4>
								<p>Discount</p>
								<span>up to 50% off.</span>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-12 col-xs-12 hd-right">
						<div class="date4">
							<div class="date">
								<a href="#"><i class="fa fa-phone st-phone" aria-hidden="true"></i></a>
							</div>
							<div class="para-a a3">
								<h4>Have a Questions?</h4>
								<p>Call:</p>
								<span>+44 7534 269292</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-center pro-v1 hp1">
			<div class="container">
				<!-- push-menu -->
				<a href="#" class="icon-pushmenu js-push-menu">
					<i class="fa fa-bars" aria-hidden="true"></i></a>
					<div class="row flex align-items-center justify-content-between">
						<div class="col-md-6 col-xs-12 col-sm-6 col2 flex justify-content-end">
							<ul class="nav navbar-nav js-menubar hidden-xs hidden-sm">
								<li class="level1 active dropdown home-page-v1-st style-menu-home-1"><a class="menu-home-3 home-1-font" href="<?= Url::home(); ?>">Home</a>
									<span class="plus js-plus-icon"></span>
									
								</li>
								<li class="level1 active dropdown home-page-v1-st style-menu-home-1"><a class="menu-home-3 home-1-font" href="#">About</a>
									<span class="plus js-plus-icon"></span>
									
								</li>
								<li class="level1 dropdown hassub style-menu-home-1"><a class="menu-home-3 home-1-font" href="<?=Url::toRoute(['/category']);?>">Shop</a>
									<span class="plus js-plus-icon"></span>
									
								</li>

								<li class="level1 dropdown hassub style-menu-home-1">
									<a class="menu-home-3 home-1-font" href="#">Wishlist</a>
								</li>
								<li class="level1 dropdown hassub style-menu-home-1">
									<a class="menu-home-3 home-1-font" href="#">Contact Us</a>
								</li>
							</ul>
						</div>
						<div class="col-md-6 col-xs-12 col-sm-6 carts">
							<div class="search3 search-home-1">
								<form method="get" action="/search" role="search" class="search-form  has-categories-select">
									<input name="q" class="search-input" type="text" value="" placeholder="Search..." autocomplete="off">
									<input type="hidden" name="post_type" value="product">
									<button type="submit" id="search-btn"><i class="ion-ios-search-strong"></i></button>
								</form>
							</div>
							<div class="date3 dropdown">
								<div class="date mycart">
                                    <a href="<?=Url::to(['/cart'])?>" style="color:#fff;">
									<button class="fa fa-shopping-cart dropdown-toggle" >
									</button>
									</a>
								</div>
								<div class="para-a a4">
									<h4><a href="<?=Url::to(['/cart'])?>" style="color:#fff;">My Cart.</a></h4>
									<p id="cart_items"><?=number_format($no_cartitem,2);?></p>
									<span>/ <?= Yii::getAlias('@currency');?><span id="cart_total"><?=number_format($cartamount,2);?></span></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- header -->

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>


<!-- footer -->
<footer>
    <div class="footers">
        <div class="border-ft-homepage-3"></div>
        <div class="container container-home-3 ">
            <div class="one">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12 ft-logo ft-logo-home3">                        
                        <?= Yii::$app->getModule('cms')->getBlock('block-footer-one'); ?>
                    </div>
                    <!-- footer-left -->
                    <div class="col-md-7 col-sm-7 col-xs-12 fix ft-left-home3 ">
                        <div class="ft-center">
                            <div class="information info-home3-hd">
                                <?= Yii::$app->getModule('cms')->getBlock('block-footer-two'); ?>
                                
                            </div>
                            <div class="information center info-home3-hd">
                                <?= Yii::$app->getModule('cms')->getBlock('block-footer-three'); ?>
                                
                            </div>
                            
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="border"></div>
        </div>
    </div>

<!-- footer-ending -->
<div class="footerending">
    <div class="container container-home-3 ">
       <?= Yii::$app->getModule('cms')->getBlock('block-footer-copyright'); ?>
    </div>
</div>
</footer>

<?php 
$crsf=\yii\helpers\Json::encode([\yii::$app->request->csrfParam => \yii::$app->request->csrfToken]);
$this->registerJs("
        $.ajaxSetup({
        data:$crsf});");
        
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
