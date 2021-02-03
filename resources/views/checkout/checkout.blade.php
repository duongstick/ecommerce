@extends('layout')

@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{'/'}}">Trang chu</a></li>
              <li class="active">Thanh toan</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="register-req">
            <p>Hay dang ky de co trai nghiem tot nhat</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-15 clearfix">
                    <div class="bill-to">
                        <p>Chuyen toi</p>
                        <div class="form-one">
                            <form action="{{'/save-checkout-cus'}}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="shipping_email" placeholder="Email*">
                                <input type="text" name="shipping_name" placeholder="Ten nguoi nhan *">
                                <input type="text" name="shipping_phone" placeholder="So dien thoai nguoi nhan *">
                                <input type="text" name="shipping_add" placeholder="Dia chi nhan hang *">
                                <p>Ghi chu</p>
                                <textarea name="message" name="shipping_note" placeholder="" rows="16"></textarea>
                                <label><input type="checkbox"> Gui toi dai chi tren</label>
                                <input type="submit" value="Gui" name="send-order" class="btn btn-primary btn-sm">
                            </form>
                        </div>
                    </div>
                </div>					
            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lai va thanh toan</h2>
        </div>

        <div class="table-responsive cart_info">
            <?php
            $content = Cart::content();
            
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên sp</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('/public/upload/product/'.$v_content->options->image)}}" width="90" alt="" /></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$v_content->name}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($v_content->price).' '.'vnđ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                {{ csrf_field() }}
                                <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}"  >
                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                
                                <?php
                                $subtotal = $v_content->price * $v_content->qty;
                                echo number_format($subtotal).' '.'vnđ';
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
    </div>
</section> <!--/#cart_items-->

@endsection