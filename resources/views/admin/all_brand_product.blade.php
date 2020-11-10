@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Liệt Kê Thương Hiệu Sản Phẩm
      </div>
      <div class="table-responsive">
        <?php
				$message=Session::get('message');

				if($message){
					echo '<span style="width: 100%;text-align:center;color: red;">'.$message.' </span>';
					Session::put('message',null);
				}
			?>
        <table  class="table table-striped b-t b-light" id="myTable">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên Thương hiệu</th>
              <th>Mô Tả</th>
              <th>Trạng Thái</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($all_brand as $item)
                  <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>                 
                    <td><span class="text-ellipsis">{{ $item->brand_name }}</span></td>
                    <td><span class="text-ellipsis">{{ $item->brand_desc }}</span></td>
                    <td>
                      <?php
                        if($item->brand_status==1){
                          ?>
                         <a href="{{ URL::to('/unactive-brand/'.$item->brand_id) }}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                        <?php
                          }else {
                         ?>                       
                          <a href="{{ URL::to('/active-brand/'.$item->brand_id) }}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                        <?php
                          }
                        ?>
                       
        
                    </td>
                    <td>
                      <a href="{{ URL::to('/edit-brand/'.$item->brand_id) }}" class="active" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o text-success text-active"></i>                     
                      </a>
                      <a  href="{{ URL::to('/delete-brand/'.$item->brand_id) }}" class="active" onclick="return confirm('Bạn Có Muốn Xóa Thương hiệu Này ?')" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                      </a>
                    </td>
                  </tr>
              @endforeach          
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection