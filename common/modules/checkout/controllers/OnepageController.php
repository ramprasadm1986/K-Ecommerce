<?php

namespace common\modules\checkout\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use common\models\User;

use common\models\Cart;
use common\models\CartItem;
use common\models\CartAddress;

use common\models\ShippingMethod;

use common\models\Order;
use common\models\OrderItem;
use common\models\OrderAddress;

use yii\web\HttpException;

use ramprasadm1986\paypal\PayPalPayment;
 


/**
 * PageController implements the CRUD actions for CmsPage model.
 */
class OnepageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        
                        'allow' => (Yii::$app->user->isGuest || Yii::$app->user->identity instanceof User),
                       
                    ],
                   
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    public function getCartidentifier(){
		$session = Yii::$app->session;
        $session->open();
       
        $CartIdentifire=Yii::$app->session->get('CartIdentifire');
		
		return $CartIdentifire;
	}
    public function getOrderidentifire(){
        $session = Yii::$app->session;
        $session->open();
       
        $OrderIdentifire=Yii::$app->session->get('OrderIdentifire');
		
        if($OrderIdentifire==""){
            $count = Yii::$app->db->createCommand("
                SELECT `AUTO_INCREMENT`
                FROM  INFORMATION_SCHEMA.TABLES
                WHERE TABLE_SCHEMA = DATABASE()
                AND   TABLE_NAME   = :TableName
            ")->bindValues([
                ':TableName' => Order::getTableSchema()->name,
            ])->queryScalar();
            
            $OrderIdentifire='ORDER'.str_pad($count,9,"0",STR_PAD_LEFT);
            Yii::$app->session->set('OrderIdentifire',$OrderIdentifire);
        }
        
		return $OrderIdentifire;
	}
    public function actionReturn(){
        $session = Yii::$app->session;
        $session->open();
       
        $OrderIdentifire=Yii::$app->session->get('OrderIdentifire');
        $CartIdentifire=Yii::$app->session->get('CartIdentifire');
        $PayPalId=Yii::$app->session->get('PayPalId');
       
        if($PayPalId!="" && $OrderIdentifire!="" && $CartIdentifire!=""){
            
          
           $response= Yii::$app->PayPalPayment->doCapture($PayPalId);
           
           if($response->statusCode==201){
                $Order = Order::find()->where(['order_identifire'=>$OrderIdentifire,'status'=>0])->one();
                $Cart = Cart::find()->where(['cart_identifire'=>$CartIdentifire,'status'=>0])->one();
                
                $Order->status=1;
                $Order->order_status="placed";
                $tags=json_decode( $Order->order_tags,true);
                $tags["placed"]=date("Y-m-d H:i:s");
                $Order->order_tags=json_encode($tags);
                $Order->save();
                $Cart->status=1;
                $Cart->save();
                
                Yii::$app->session->remove('CartIdentifire');
                Yii::$app->session->remove('PayPalId');
                return $this->redirect(['/checkout/success']); 
           }
            else{
                Yii::$app->session->remove('OrderIdentifire');
                Yii::$app->session->remove('PayPalId');
                return $this->redirect(['/cart']);
            }
            
          
          
            
        }
        else{
                     
       
            $OrderIdentifire=Yii::$app->session->get('OrderIdentifire');
            $CartIdentifire=Yii::$app->session->get('CartIdentifire');
            $PayPalId=Yii::$app->session->get('PayPalId');
            Yii::$app->session->remove('CartIdentifire');
            Yii::$app->session->remove('OrderIdentifire');
            Yii::$app->session->remove('PayPalId');
            return $this->redirect(['/cart']);
            
          
        }
        
    }
    public function actionCancel(){
        
            $session = Yii::$app->session;
            $session->open();
       
            $OrderIdentifire=Yii::$app->session->get('OrderIdentifire');
            $CartIdentifire=Yii::$app->session->get('CartIdentifire');
            $PayPalId=Yii::$app->session->get('PayPalId');
            Yii::$app->session->remove('CartIdentifire');
            Yii::$app->session->remove('OrderIdentifire');
            Yii::$app->session->remove('PayPalId');
            return $this->redirect(['/cart']);
        
    }
    public function actionSetshipping(){
        
		$post = Yii::$app->request->post();
		extract($post);
		$CartIdentifire = $this->getCartidentifier();
		$Cart = Cart::find()->where(['cart_identifire'=>$CartIdentifire,'status'=>0])->one();
        $ShippingMethod=ShippingMethod::find()->where(['method'=>$method,'status'=>1])->one();
		if($Cart && $ShippingMethod){
            
            $shipping=0;
            if($Cart->cart_subtotal_excl_tax>=$ShippingMethod->freeship_threshold)
            {
                
                $Cart->shipping=$shipping;
                $Cart->shipping_details=$ShippingMethod->name."( Free )";
                $Cart->save();
            }
            else{
               
                
                foreach($Cart->cartItems as $item){
                    
                    $shipping=$shipping+(($item->qty-1)*$ShippingMethod->snd_price)+$ShippingMethod->price;
                    
                
                }
                $Cart->shipping=$shipping;
                $Cart->shipping_details=$ShippingMethod->name;
                $Cart->cart_total=$Cart->cart_subtotal_excl_tax+$Cart->shipping;
                $Cart->save();
            }
                
            $json_result = array();
            $json_result['status'] = true;
            $json_result['cart_data'] = ['shipping'=>$Cart->shipping,'cart_total'=>$Cart->cart_total];
           
		
		
            return $this->asJson($json_result);    
            
            
            
            
            
            
           
            
            
        }
            $json_result = array();
            $json_result['status'] = false;
            
           
		
		
            return $this->asJson($json_result);  
        
        
        
    }
    
    
    public function actionIndex(){
        
        
        $CartIdentifier = $this->getCartidentifier();
		$Cart = Cart::find()->where(['cart_identifire'=>$CartIdentifier,'status'=>0])->one();
       
        
        if(Yii::$app->request->post()){
            
             $model =new CartAddress();
            
            if ($model->load(Yii::$app->request->post())) {  
                $model->cart_identifire=$Cart->cart_identifire;
                $model->save();
                $Cart->user_email= $model->email;
                
                $Cart->save();
                
                 $session = Yii::$app->session;
                 $session->open();
       
                $OrderIdentifire=Yii::$app->session->get('OrderIdentifire');
                
                if($OrderIdentifire==''){
                    $OrderIdentifire=$this->getOrderidentifire();
                    $order= new Order();
                    
                    $order->order_identifire=$OrderIdentifire;
                    $order->user_email=$Cart->user_email;
                    $order->user_id=$Cart->user_id;
                    $order->order_subtotal_excl_tax=$Cart->cart_subtotal_excl_tax;
                    $order->discount=$Cart->discount;
                    $order->descout_details=$Cart->descout_details;
                    $order->tax=$Cart->tax;
                    $order->tax_details=$Cart->tax_details;
                    $order->shipping=$Cart->shipping;
                    $order->shipping_details=$Cart->shipping_details;
                    $order->order_total=$Cart->cart_total;
                    $order->status=0;
                    $order->order_status="pending";                
                    $order->order_tags=json_encode(['pending'=>date("Y-m-d H:i:s")]);           
                    $order->save();
                    
                    
                    $orderAddress= new OrderAddress();
                    
                    $orderAddress->order_identifire=$order->order_identifire;
                    $orderAddress->name=$model->name;
                    $orderAddress->email=$model->email;
                    $orderAddress->country=$model->country;
                    $orderAddress->state=$model->state;
                    $orderAddress->city=$model->city;
                    $orderAddress->zip=$model->zip;
                    $orderAddress->phone=$model->phone;
                    
                    $orderAddress->save();
                
                    foreach($Cart->cartItems as $cart_item){
                        
                        $OrderItem= new OrderItem();
                        $OrderItem->order_identifire=$order->order_identifire;
                        $OrderItem->item_id=$cart_item->item_id;
                        $OrderItem->item_name=$cart_item->item_name;
                        $OrderItem->variations=$cart_item->variations;
                        $OrderItem->price=$cart_item->price;
                        $OrderItem->sell_price=$cart_item->sell_price;
                        $OrderItem->qty=$cart_item->qty;
                        $OrderItem->total=$cart_item->total;
                        $OrderItem->tax=$cart_item->tax;
                        $OrderItem->tax_details=$cart_item->tax_details;
                        $OrderItem->shipping=$cart_item->shipping;
                        $OrderItem->row_total=$cart_item->row_total;                   
                        $OrderItem->save();
                        
                    }
                
                }
                else
                    $order = Order::find()->where(['order_identifire'=>$OrderIdentifire,'status'=>0])->one();
                
                    
                    
                $data=[
                        "reference_id" => $order->order_identifire,
                        "amount" => [
                             "value" => $order->order_total,
                             "currency_code" => "GBP"
                        ]
                    ];
               
                
                $response=Yii::$app->PayPalPayment->doCheckout($data);
                
                
                
                if($response->statusCode==201){
                  
                    
                    Yii::$app->session->set('PayPalId',$response->result->id);
                   
                    foreach($response->result->links as $link){
                    
                            if($link->rel=="approve")                                
                                $this->redirect($link->href);
                    }
                }
                else{
                  
                   
                    Yii::$app->session->remove('OrderIdentifire');
                    return $this->redirect(['/cart']);
                  
                }               
                
            }
            
            
            
        }
        
        
        if($Cart){
            $Cart->scenario = 'checkout';
			$CartItems = $Cart->cartItems;
			if($CartItems){
				$cartitems = array();
				$cartdetails = array();
				foreach($CartItems as $Cartitemkey=>$Cartitemvalu){
					$cartitems[$Cartitemkey]['item_name'] = $Cartitemvalu->item_name;
					$cartitems[$Cartitemkey]['variations'] = $Cartitemvalu->variations;
					$cartitems[$Cartitemkey]['qty'] = $Cartitemvalu->qty;
					$cartitems[$Cartitemkey]['id'] = $Cartitemvalu->id;
					$cartitems[$Cartitemkey]['price'] = $Cartitemvalu->price;
					$cartitems[$Cartitemkey]['sell_price'] = $Cartitemvalu->sell_price;
					$cartitems[$Cartitemkey]['total'] = $Cartitemvalu->total;
					$cartitems[$Cartitemkey]['row_total'] = $Cartitemvalu->row_total;
					if ($Cartitemvalu->item->base_image !='') {
						$getimage = $Cartitemvalu->item->base_image;
					}else{
						$getimage = Yii::getAlias('@storageUrl')."/default/default_product.png";
					}
					$cartitems[$Cartitemkey]['image'] = $getimage;
				}
				$cartdetails['cart_identifire'] = $Cart->cart_identifire;
				$cartdetails['id'] = $Cart->id;
				$cartdetails['cart_subtotal_excl_tax'] = $Cart->cart_subtotal_excl_tax;
				$cartdetails['cart_total'] = $Cart->cart_total;
				
				$CartItemmodel['CartItems'] = $cartitems;
				$CartItemmodel['CartDetails'] = $cartdetails;
			}else{
				$CartItemmodel['CartItems'] = array();
				$CartItemmodel['CartDetails'] = array();
			}
            
            if(count($CartItemmodel['CartItems']))
                return $this->render('checkout',['CartAddress' => new CartAddress(),'CartItemmodel'=>$CartItemmodel,'Cart'=>$Cart]);
            else
                return $this->redirect(['/cart']);
                
		}else{
			return $this->redirect(['/cart']);
		}
		
    }


}