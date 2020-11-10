@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Slider
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
                        <form role="form" action="{{ URL::to('/save-slider') }}" method="post" enctype="multipart/form-data">                    
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Slider</label>
                            <input type="text" name="slider_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Tên Slider....">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>
                            <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả </label>
                            <textarea style="resize:none" row="8" name="slider_desc"  class="form-control" id="ckeditor3" placeholder="Hãy Nhập Mô Tả ..........."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng Thái</label>
                            <select name="slider_status" class="form-control input-sm m-bot15">
                                <option value='1'>Hiện Thị</option>
                                <option value='0'>Ẩn</option>                              
                            </select>
                        </div>                       
                        <button type="submit" name="add_slider" class="btn btn-info">Submit</button>
                    </form>
                    </div>
                </div>
            </section>

    </div>
</div>
@endsection