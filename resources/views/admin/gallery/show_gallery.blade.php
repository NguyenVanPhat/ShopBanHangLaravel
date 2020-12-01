@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       GALLERY
      </div>
      <div class="table-responsive">
        <?php
				  $message=Session::get('message');
				  if($message){
				  	echo '<span style="width: 100%;text-align:center;color: red;">'.$message.' </span>';
					  Session::put('message',null);
				  }
        ?>
        <form action="{{URL::TO('insert-gallery/'.$pro_id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-3" align="right">

            </div>

            <div class="col-md-6">
                  <input type="file" class="form-control" id="file" name="file[]" accept="image/*" multiple>
                  <span id="error_gallery"></span>
            </div>
            <div class="col-md-3">
                <button type="submit" name="taianh" class="btn btn-success"> Tải ảnh </button>
            </div>
         </div>
        </form>
        <form >
            @csrf
            <input type="hidden" class="product_id" value="{{ $pro_id }}" >
            <div id="load_gallery">
               
           </div>
        </form>       
       
      </div>
    </div>
  </div>
@endsection