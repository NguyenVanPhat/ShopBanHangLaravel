@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhật Danh Mục Sản Phẩm
                </header>
                <?php
				$message=Session::get('message');

				if($message){
					echo '<span style="width: 100%;text-align:center;color: red;">'.$message.' </span>';
					Session::put('message',null);
				}
			?>
                <div class="panel-body">
                    @foreach ($edit_product as $edit)
                        <<div class="position-center">
                            <form role="form" action="{{ URL::to('/updata-product/'.$edit->product_id) }}" method="post" enctype="multipart/form-data">                         
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input VALUE="{{ $edit->product_name }}" type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Sản Phẩm....">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                                    <input VALUE="{{ $edit->product_price }}" type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá Sản Phẩm....">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Lượng Sản Phẩm</label>
                                    <input VALUE="{{ $edit->product_quantity }}" type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Số Lượng Sản Phẩmn....">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="....">
                                    <img  width="100px" hight="100px" src="{{URL::TO('public/uploads/product/'.$edit->product_image)}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                                    <textarea  style="resize:none" row="8" name="product_desc" id="ckeditor4" class="form-control" id="exampleInputPassword1" placeholder="Hãy Nhập Mô Tả ...........">{{ $edit->product_desc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội Dung Sản Phẩm</label>
                                    <textarea style="resize:none" row="8" name="product_content" id="ckeditor5"  class="form-control" id="exampleInputPassword1" placeholder="Hãy Nhập Mô Tả ...........">{{ $edit->product_content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh Mục Sản Phẩm</label>                          
                                    <select name="category_id" class="form-control input-sm m-bot15">
                                        @foreach ($category_all as $cate)
                                        @if($cate->category_id==$edit->category_id)
                                        <option selected value="{{$cate->category_id}}">{{ $cate->category_name }}</option>
                                    @else
                                    <option value="{{$cate->category_id}}">{{ $cate->category_name }}</option>
                                    @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiệu Sản Phẩm</label>
                                    <select name="brand_id" class="form-control input-sm m-bot15">
                                        @foreach ($brand_all as $brand)
                                            @if($brand->brand_id==$edit->brand_id)
                                                <option selected value="{{$brand->brand_id}}">{{ $brand->brand_name }}</option>
                                            @else
                                                <option value="{{$brand->brand_id}}">{{ $brand->brand_name }}</option>
                                            @endif
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
                    @endforeach                   
                </div>
            </section>

    </div>
</div>
@endsection
