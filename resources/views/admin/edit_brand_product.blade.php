@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhật Thương Hiệu Sản Phẩm
                </header>
                <?php
				$message=Session::get('message');

				if($message){
					echo '<span style="width: 100%;text-align:center;color: red;">'.$message.' </span>';
					Session::put('message',null);
				}
			?>
                <div class="panel-body">
                    @foreach ($edit_brand as $edit)
                        <div class="position-center">
                            <form role="form" action="{{ URL::to('/updata-brand/'.$edit->brand_id) }}" method="post">                         
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Thương hiệu</label>
                                    <input value="{{ $edit->brand_name }}" type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Thương hiệu....">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả Thương hiệu</label>
                                    <textarea style="resize:none" row="8" name="brand_desc"  class="form-control" id="exampleInputPassword1" placeholder="Hãy Nhập Mô Tả ...........">{{$edit->brand_desc}}</textarea>
                                </div>                                              
                                <button type="submit" name="update_brand" class="btn btn-info">Submit</button>
                             </form>
                        </div>                                          
                    @endforeach                   
                </div>
            </section>

    </div>
</div>
@endsection
