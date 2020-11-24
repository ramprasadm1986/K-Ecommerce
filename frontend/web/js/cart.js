

function SwitchPrice(){
    
    
    
    
    $valid=true;
    $combination="";
    CPAttribute_ids.forEach(function (item) { 
            if(!$( "#"+item ).val()){
                $valid=false;
            return false;
            }
           
           $combination+=$( "#"+item ).prop("name")+":"+$( "#"+item ).val()+"|";
        });
    $combination=$combination.slice(0, -1);
    
   if( $valid && variation_ids.hasOwnProperty( $combination)){
       
       
       $id=variation_ids[$combination];
       $selector="#variant_img_"+$id;
       $slideIndex=$( $selector ).data( "slick-index" );
       if($slideIndex)
            $( ".js-product-slider-normal" ).slick('slickGoTo', parseInt($slideIndex));
        else
            $( ".js-product-slider-normal" ).slick('slickGoTo', 0);
    
   }
   else{
        $( ".js-product-slider-normal" ).slick('slickGoTo', 0);
   }
    
   if( $valid && price_variation.hasOwnProperty( $combination)){      
      
      $("#variable_price").html(currency_Symbol+" "+price_variation[$combination]);
   }
   else
   $("#variable_price").html("");
}



function addtoCart(url,itemid,variation=false){
    $combination="";
    if(variation){
        $valid=true;       
        CPAttribute_ids.forEach(function (item) { 
            if(!$( "#"+item ).val()){
                $valid=false;
            return false;
            }
           
           $combination+=$( "#"+item ).prop("name")+":"+$( "#"+item ).val()+"|";
        });
        $combination=$combination.slice(0, -1);
        
        
         if(!$valid){
             alert("Please Select Product Variants");
            return false;
         }
         
    }
    
	$.ajax({
		url: url,
		type: "POST",
		data: {
			item_id: itemid,
            variations:$combination
           
		},
		beforeSend:function(json)
		{ 
			//SimpleLoading.start('hourglass'); 
		},
		success: function (result) {
			var results = result;
			
			if(results.status == 1){
				//alertify.alert('Product added sucessfully').setHeader('<em class="alert_header"> Arunodayamedicare </em> ').show();
				//location.reload();
				
				var Totalamount = results.Headercartdetails.Totalamount;
				var TotalItems  = results.Headercartdetails.Totalcartitem;
				$('#cart_total').html(Totalamount);
				$('#cart_items').html(TotalItems);
			}
			
		},
		complete:function(json)
		{
			//SimpleLoading.stop();
		},
	});
}


function setShippingMethod(url,method){
    

	$.ajax({
		url: url,
		type: "POST",
		data: {
			method: method,
           
		},
		beforeSend:function(json)
		{ 
			$("#placeorder").prop('disabled', true);
		},
		success: function (result) {
			var results = result;
			
			if(results.status == 1){
				//alertify.alert('Product added sucessfully').setHeader('<em class="alert_header"> Arunodayamedicare </em> ').show();
				//location.reload();
				
				var grand_total = results.cart_data.cart_total;
				var shipping  = results.cart_data.shipping;
				$('#grand_total').html(grand_total);
				$('#shipping_amount').html(shipping);
			}
			
		},
		complete:function(json)
		{
			$("#placeorder").prop('disabled', false);
		},
	});
}