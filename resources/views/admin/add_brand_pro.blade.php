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
                        Quản lý thương hiệu
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
                            <form role="form" action="/save-brand-pro" method="POST">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" name="brand_pro_name" class="form-control" id="exampleInputEmail1" placeholder="Điền tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea type="text" name="brand_pro_desc" class="form-control" id="exampleInputPassword1" placeholder="Desscription"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Xem</label>
                                <select name="brand_pro_status" id="" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    {{-- <option>3</option> --}}
                                </select>
                            </div>
                            <button type="submit" name="add_brand_pro" class="btn btn-info">Thêm danh mục</button>
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
