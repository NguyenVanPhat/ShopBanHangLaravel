@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Danh Mục Bài Viết
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
                        <form role="form" action="{{ URL::to('/save-category-post') }}" method="post" enctype="multipart/form-data">                         
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Danh Mục</label>
                                <input  type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="áđâsđâsđá" name="cate_post_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Thương Hiệu....">
                            </div>                                                   
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô Tả Danh Mục</label>
                                <textarea style="resize:none" row="8" name="cate_post_desc"  class="form-control" id="ckeditor1" placeholder="Hãy Nhập Mô Tả ..........."></textarea>
                            </div>                                                                               
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng Thái</label>
                                <select name="cate_post_status" class="form-control input-sm m-bot15">
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