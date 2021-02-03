@extends('admin_layout')

@section('admin_content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                Thong tin nguoi mua
                </div>
                <div class="table-responsive">
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th>Tên nguoi dat hang</th>
                                <th>So dien thoai</th>
                                <th style="width:30px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($show_order as $key => $order) --}}
                            <tr>
                            
                                <td>{{$order_by_id->customer_name}}</td>
                                <td>{{$order_by_id->customer_phone}}</td>
                             
                               
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
                </footer>
            </div>
        </div>
        <br>
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                Thong tin van chuyen
                </div>
                <div class="table-responsive">
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th>Tên nguoi giao hang</th>
                                <th>Dia chi</th>
                                <th>So dien thoai</th>
                                <th style="width:30px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($show_order as $key => $order) --}}
                            <tr>
                            
                                <td>{{$order_by_id->shipping_name}}</td>
                                <td>{{$order_by_id->shipping_add}}</td>
                                <td>{{$order_by_id->shipping_phone}}</td>
                             
                               
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
                </footer>
            </div>
        </div>
        <br><br>
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                Liệt kê chi tiet đơn hàng
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <select class="input-sm form-control w-sm inline v-middle">
                            <option value="0">Bulk action</option>
                            <option value="1">Delete selected</option>
                            <option value="2">Bulk edit</option>
                            <option value="3">Export</option>
                        </select>
                        <button class="btn btn-sm btn-default">Apply</button>                
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="input-sm form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th style="width:20px;">
                                    <label class="i-checks m-b-none">
                                        <input type="checkbox"><i></i>
                                    </label>
                                </th>
                                <th>Tên san pham</th>
                                <th>So luong</th>
                                <th>Gia</th>
                                <th>Tong tien(da bao gom thue)</th>
                                <th style="width:30px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($show_order as $key => $order) --}}
                            <tr>
                                {{-- test --}}
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{$order_by_id->product_name}}</td>
                                <td>{{$order_by_id->product_sales_quantity}}</td>
                                <td>{{$order_by_id->product_price}}</td>
                               
                                <td>{{$order_by_id->order_total}}</td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        {{-- <div class="col-sm-5 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                        </div> --}}
                        <div class="col-sm-7 text-right text-center-xs">                
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href="">4</a></li>
                                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
</section>
@endsection