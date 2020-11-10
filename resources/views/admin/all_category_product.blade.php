@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Liệt Kê Danh Mục Sản Phẩm
      </div>
      <div class="table-responsive">
        <?php
				$message=Session::get('message');

				if($message){
					echo '<span style="width: 100%;text-align:center;color: red;">'.$message.' </span>';
					Session::put('message',null);
				}
			?>
        <table class="table table-striped b-t b-light" id="myTable">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên Danh Mục</th>
              <th>Mô Tả</th>
              <th>Trạng Thái</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($all_category_product as $item)
                  <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>                 
                    <td><span class="text-ellipsis">{{ $item->category_name }}</span></td>
                    <td><span class="text-ellipsis">{!! $item->category_desc !!}</span></td>
                    <td>
                      <?php
                        if($item->category_status==1){
                          ?>
                         <a href="{{ URL::to('/unactive-category-product/'.$item->category_id) }}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                        <?php
                          }else {
                         ?>                       
                          <a href="{{ URL::to('/active-category-product/'.$item->category_id) }}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                        <?php
                          }
                        ?>
                       
        
                    </td>
                    <td>
                      <a href="{{ URL::to('/edit-category-product/'.$item->category_id) }}" class="active" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o text-success text-active"></i>                     
                      </a>
                      <a  href="{{ URL::to('/detele-category-product/'.$item->category_id) }}" class="active" onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này ?')" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                      </a>
                    </td>
                  </tr>
              @endforeach          
          </tbody>
        </table>
        

      </div>
      <form action="{{url('import-category')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="form" type="file" name="file" accept=".xlsx"><br>
        <input type="submit" value="Import Excel" name="import_category" class="btn btn-warning">
      </form>
     <form  style="margin-top:10px;" action="{{url('export-category')}}" method="POST">
        @csrf
        <input  type="submit" value="Export Excel" name="export_csv" class="btn btn-success mt-5">
    </form>
    </div>
  </div>
@endsection