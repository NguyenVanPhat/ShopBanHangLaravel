@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Liệt Kê  Sản Phẩm
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
              <th>Tên sản Phẩm</th>
              <th>Gallery</th>
              <th>Giá sản Phẩm</th>             
              <th>Số Lượng</th>
              <th>Hình Ảnh</th>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
              {{-- <th>Mô Tả</th> --}}
              {{-- <th>Nội Dung</th> --}}
              <th>Danh Mục Sản Phẩm</th>
              <th>Hiệu Sản Phẩm</th>
              <th>Trạng Thái</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($all_product as $item)
                  <tr>             
                    <td><span class="text-ellipsis">{{ $item->product_name }}</span></td>
                    <td> <a href="{{ URL('/show-gallery/'.$item->product_id) }}"> Thêm Gallery </a> </td>
                    <td><span class="text-ellipsis">{{ $item->product_price}}</span></td>
                    <td><span class="text-ellipsis">{{ $item->product_quantity}}</span></td>
                    <td><img width="100px" hight="100px" src="public/uploads/product/{{$item->product_image}}"></td>
                    {{-- <td><span class="text-ellipsis">{{ $item->product_desc}}</span></td> --}}
                    {{-- <td><span class="text-ellipsis">{{ $item->product_content}}</span></td> --}}
                    <td><span class="text-ellipsis">{{ $item->brand_name }}</span></td>
                    <td><span class="text-ellipsis">{{ $item->category_name }}</span></td>
                    <td>
                      <?php
                        if($item->product_status==1){
                          ?>
                         <a href="{{ URL::to('/unactive-product/'.$item->product_id) }}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                        <?php
                          }else {
                         ?>                       
                          <a href="{{ URL::to('/active-product/'.$item->product_id) }}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                        <?php
                          }
                        ?>                      
                    </td>
                    <td>
                      <a href="{{ URL::to('/edit-product/'.$item->product_id) }}" class="active" ui-toggle-class="">
                        <i class="fa fa-pencil-square-o text-success text-active"></i>                     
                      </a>
                      <a  href="{{ URL::to('/delete-product/'.$item->product_id) }}" class="active" onclick="return confirm('Bạn Có Muốn Xóa sản Phẩm Này ?')" ui-toggle-class="">
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