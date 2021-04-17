<script>
    productName= document.getElementsByClassName('productname')
    productQuantity = document.getElementsByClassName('pro-quantity')
    productPrice = document.getElementsByClassName('cart-price')
    for(var i=0;i<productName.length;i++)
    {   
        items.push({
        name: productName[i].innerHTML,
        unit_amount: {value: ((parseFloat(productPrice[i].innerHTML)/25000)/(parseFloat(productQuantity[i].innerHTML))).toFixed(2).toString(), currency_code: 'USD'},
        quantity: productQuantity[i].innerHTML.slice(0, -1),
        sku: 'haf001'
    })
    console.log(items)
    }
    paypal.Buttons(
    {
    createOrder: function(data, actions) {
       
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
                amount: {
                    value: <?php echo $subtotal/25000?>,
                    currency_code: 'USD',
                    breakdown: {
                        item_total: {value: <?php echo $subtotal/25000?>, currency_code: 'USD'}
                    }
                },
                invoice_id: Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5),
                items: items
            }]

      });
    },onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        var shippingaddress = document.getElementsByName('ShippingAddress');
        var ordermessage=document.getElementsByName('ordermessage')
        $.ajax({
            url:'/paypal/payment_status',
            type: 'POST',
            data:{'payername' :details.payer.name.given_name,'ShippingAddress':shippingaddress[0].value,'ordermessage':ordermessage[0].value},
            success:function(result)
            {
                $("body").html(result);
            }
            
        })
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');</script>
</script>