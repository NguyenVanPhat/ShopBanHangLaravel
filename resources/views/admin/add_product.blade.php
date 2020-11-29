@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Sản Phẩm
                </header>
                <?php
				$message=Session::get('message');

				if($message){
					echo '<span style="width: 100%;text-align:center;color: red;">'.$message.' </span>';
					Session::put('message',null);
				}
			?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-product') }}" method="post" enctype="multipart/form-data">                         
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                <input  type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="áđâsđâsđá" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Thương Hiệu....">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                                <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Tên Thương Hiệu....">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Lượng Sản Phẩm</label>
                                <input type="munber" name="product_quantity" class="form-control" id="exampleInputEmail1" placeholder="Tên Thương Hiệu....">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình Ảnh</label>
                                <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Tên Thương Hiệu....">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                                <textarea style="resize:none" row="8" name="product_desc"  class="form-control" id="ckeditor1" placeholder="Hãy Nhập Mô Tả ..........."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội Dung Sản Phẩm</label>
                                <textarea style="resize:none" row="8" name="product_content"  class="form-control" id="ckeditor" placeholder="Hãy Nhập Mô Tả ..........."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh Mục Sản Phẩm</label>                          
                                <select name="category_id" class="form-control input-sm m-bot15">
                                    @foreach ($category_all as $cate)
                                        <option value="{{$cate->category_id}}">{{ $cate->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiệu Sản Phẩm</label>
                                <select name="brand_id" class="form-control input-sm m-bot15">
                                    @foreach ($brand_all as $brand)
                                    <option value="{{$brand->brand_id}}">{{ $brand->brand_name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng Thái</label>
                                <select name="product_status" class="form-control input-sm m-bot15">
                                    <option value='1'>Hiện Thị</option>
                                    <option value='0'>Ẩn</option>                              
                                </select>
                            </div>                       
                            <button type="submit" name="add_brand" class="btn btn-info">Submit</button>
                         </form>
                    </div>
                </div>
            </section>

    </div>
</div>
@endsection