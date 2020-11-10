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
                    @foreach ($edit_category_product as $edit_category)
                        <div class="position-center">
                            <form role="form" action="{{ URL::to('/updata-category-product/'.$edit_category->category_id) }}" method="post">                         
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Danh Mục</label>
                                    <input value="{{ $edit_category->category_name }}" type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục....">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả Danh Mục</label>
                                    <textarea style="resize:none" row="8" name="category_product_desc"  class="form-control" id="exampleInputPassword1" placeholder="Hãy Nhập Mô Tả ...........">{{$edit_category->category_desc}}</textarea>
                                </div>                                              
                                <button type="submit" name="update_category_product" class="btn btn-info">Submit</button>
                             </form>
                        </div>                                          
                    @endforeach                   
                </div>
            </section>

    </div>
</div>
@endsection
