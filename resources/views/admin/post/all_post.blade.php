@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Liệt Kê Bài Viết 
      </div>
      <div class="table-responsive">
        <?php
				$message=Session::get('message');

				if($message){
					echo '<span style="width: 100%;text-align:center;color: red;">'.$message.' </span>';
					Session::put('message',null);
				}
			?>
        <table class="table table-striped b-t b-light"id="myTable">
          <thead>
            <tr>              
              <th>Tên Tiêu Đề</th>
              <th>Hình Ảnh</th>
              <th>Mô Tả</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
              <th>Danh Mục</th>
              {{-- <th>Trạng Thái</th> --}}
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($post as $item)
                  <tr>             
                    <td><span class="text-ellipsis">{{ $item->post_title }}</span></td>
                    <td><img width="100px" hight="100px" src="public/uploads/post/{{$item->post_image}}"></td>
                    <td><span class="text-ellipsis">{!! $item->post_desc!!}</span></td>
                    
                    <td><span class="text-ellipsis">{{ $item->cate_post_id }}</span></td>

                    
                    {{-- <td>
                      <?php
                        if($item->post_status==1){
                          ?>
                         <a href="{{ URL::to('/unactive-product/'.$item->product_id) }}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                        <?php
                          }else {
                         ?>                       
                          <a href="{{ URL::to('/active-product/'.$item->product_id) }}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                        <?php
                          }
                        ?>                      
                    </td> --}}
                    <td>
                      <a href="{{ URL::to('/edit-post/'.$item->post_id) }}" class="active" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o text-success text-active"></i>                     
                      </a>
                      <a  href="{{ URL::to('/delete-post/'.$item->post_id) }}" class="active" onclick="return confirm('Bạn Có Muốn Xóa Bài Viếtnnnnnnnn Này ?')" ui-toggle-class="">
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