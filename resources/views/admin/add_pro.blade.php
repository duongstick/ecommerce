@extends('admin_layout')

@section('admin_content')
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Quản lý sản phẩm
                    </header>
                    <div class="panel-body">
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                        <div class="position-center">
                            <form role="form" action="/save-pro" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="pro_name" class="form-control" id="exampleInputEmail1" placeholder="Điền tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="text" name="pro_price" class="form-control" id="exampleInputEmail1" placeholder="Điền giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                                <input type="file" name="pro_image" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea type="text" name="pro_desc" class="form-control" id="exampleInputPassword1" placeholder="Desscription"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">đéo hiểu</label>
                                <textarea type="text" name="pro_content" class="form-control" id="exampleInputPassword1" placeholder="Desscription"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                                <select name="pro_cate" id="" class="form-control input-sm m-bot15">
                                    @foreach ($cate_product as $key => $cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        {{-- <option value="1">Hiển thị</option> --}}
                                        {{-- <option>3</option> --}}
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thương hiệu</label>
                                <select name="pro_brand" id="" class="form-control input-sm m-bot15">
                                    @foreach ($brand_product as $key => $brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        {{-- <option value="1">Hiển thị</option> --}}
                                        {{-- <option>3</option> --}}
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Xem</label>
                                <select name="pro_status" id="" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    {{-- <option>3</option> --}}
                                </select>
                            </div>
                            <button type="submit" name="add_pro" class="btn btn-info">Thêm sản phẩm</button>
                        </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </div>
</section>
 <!-- footer -->
  <!-- / footer -->
</section>
@endsection
