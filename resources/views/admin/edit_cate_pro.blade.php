@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa danh mục sản phẩm
            </header>
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="panel-body">
                @foreach ($edit_cate_pro as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{('/update-cate-pro/'.$edit_value->category_id)}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{$edit_value->category_name}}" name="cate_pro_name" class="form-control" id="exampleInputEmail1" placeholder="Điền tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea type="text" name="cate_pro_desc" class="form-control" id="exampleInputPassword1">{{$edit_value->category_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả desc</label>
                            <textarea type="text" name="cate_pro_key" class="form-control" id="exampleInputPassword1" placeholder="Desscription">{{$edit_value->meta_keywords}}</textarea>
                        </div>
                        <button type="submit" name="update_cate_pro" class="btn btn-info">Sửa danh mục</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection