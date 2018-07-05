<div class="container" style="margin-top: 2rem;margin-bottom:6rem;">
<div class="panel-heading text-left"> <h4>Review Order</h4> </div> 
    <!--REVIEW ORDER-->
    <div class="row">
        <div class="col-sm-4 col-md-4">
            <div class="row">
                
                <div class="col-md-12">
                    <strong>Subtotal (# item)</strong>
                    <div class="pull-right"><span>$</span><span>200.00</span></div>
                </div>
                <div class="col-md-12">
                    <strong>Tax</strong>
                    <div class="pull-right"><span>$</span><span>200.00</span></div>
                </div>
                <div class="col-md-12">
                    <small>Shipping</small>
                    <div class="pull-right"><span>-</span></div>
                    <hr>
                </div>
                <div class="col-md-12">
                    <strong>Order Total</strong>
                    <div class="pull-right"><span>$</span><span>150.00</span></div>
                    <hr>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
        </div>
        <div class="col-sm-8 col-md-8">
              <!--SHIPPING METHOD-->
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h4>Current Cart</h4></div>
                <div class="panel-body">
                   <table class="table borderless">
                    <thead>
                        <tr>
                            <td><strong>Your Cart: # item</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                        <tr>
                            <td class="col-md-3">
                                <div class="media">
                                     <div class="media-body">
                                         <h5 class="media-heading"> Kode Layanan </h5>
                                     </div>
                                </div>
                            </td>
                            <td class="text-center">$10.99</td>
                            <td class="text-center">1</td>
                            <td class="text-right">$32.99</td>
                            <td class="text-right"><button type="button" class="btn btn-danger">Hapus</button></td>
                        </tr>
                    </tbody>
                </table> 
                </div>
            </div>
            <!--SHIPPING METHOD END-->
        </div>
    </div>
    </div>
</div>