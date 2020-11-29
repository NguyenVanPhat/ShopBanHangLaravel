@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Liệt Kê Danh Mục Bài Viết
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
              
              <th>Tên Danh Mục</th>
              <th>Mô Tả</th>
              <th>Trạng Thái</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($category_post as $item)
                  <tr>
                                     
                    <td><span class="text-ellipsis">{{ $item->cate_post_name }}</span></td>
                    <td><span class="text-ellipsis">{{ $item->cate_post_desc }}</span></td>
                    <td>
                      <?php
                        if($item->cate_post_status==1){
                          ?>
                         <span class="">Hiển Thị</span>
                        <?php
                          }else {
                         ?>                       
                          <span class="">Không Hiển Thị</span>
                        <?php
                          }
                        ?>    
                    </td>
                    <td>
                      <a href="{{ URL::to('/edit-cate-post/'.$item->cate_post_id) }}" class="active" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o text-success text-active"></i>                     
                      </a>  
                      <a  href="{{ URL::to('/delete-cate-post/'.$item->cate_post_id) }}" class="active" onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Bài Viết Này ?')" ui-toggle-class="">
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