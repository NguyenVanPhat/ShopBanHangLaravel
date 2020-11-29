@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Bài Viết 
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
                        <form role="form" action="{{ URL::to('/save-add-post') }}" method="post" enctype="multipart/form-data">                    
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu Đề Bài Viết</label>
                            <input type="text" name="post_title" class="form-control" id="exampleInputEmail1" placeholder="Tên Bài Viết....">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả </label>
                            <textarea style="resize:none" row="8" name="post_desc"  class="form-control" id="ckeditor3" placeholder="Hãy Nhập Mô Tả ..........."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội Dung </label>
                            <textarea style="resize:none" row="8" name="post_content"  class="form-control" id="ckeditor4" placeholder="Hãy Nhập Nội Dung  ..........."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình Ảnh </label>
                            <input type="file" name="post_image" class="form-control" id="exampleInputEmail1" placeholder="Tên Thương Hiệu....">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh Mục Bài Viết</label>
                            <select name="cate_post_id" class="form-control input-sm m-bot15">
                                @foreach($catepost as $item)
                                <option value="{{$item->cate_post_id}}">{{$item->cate_post_name}}</option>
                                @endforeach                              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng Thái</label>
                            <select name="post_status" class="form-control input-sm m-bot15">
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