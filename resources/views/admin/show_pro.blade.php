@extends('admin_layout')

@section('admin_content')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                Danh sách san pham
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
                                <th>Gia</th>
                                <th>Anh san pham</th>
                                <th>Danh muc</th>
                                <th>Thuong hieu</th>
                                <th>Hiển thị</th>
                                <th>Ghi chú</th>
                                <th style="width:30px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show_pro as $key => $pro)
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                <td>{{ $pro->product_name }}</td>
                                <td>{{ $pro->product_price }}</td>
                                <td><img src="public/upload/product/{{$pro->product_image }}" height="100" width="100"></td>
                                <td>{{ $pro->category_name }}</td>
                                <td>{{ $pro->brand_name }}</td>
                                <td>
                                    <?php
                                    if($pro->product_status==0){
                                        ?>
                                        <a href="{{('/unactive-pro/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                        <?php
                                        }else{
                                        ?>  
                                        <a href="{{('/active-pro/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                        <?php
                                    }
                                    ?>
                                </td>
                                {{-- <td>{{ $brand_pro->brand_desc }}</td> --}}
                                <td>
                                    <a href="{{('/edit-pro/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil text-success text-active"></i>
                                    </a>
                                    <a onclick="return confirm('Mày chắc chắn muốn xóa chứ')" href="{{('/delete-pro/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
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