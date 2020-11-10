@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Liệt Kê Mã Giảm Giá
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
              <th>Tên Mã Giảm Giá</th>
              <th>Mã Giảm Giá</th>
              <th>Điều Kiện Giảm Giá</th>
              <th>Số Lượng Giảm Giá</th>
              <th>Xóa</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($coupon as $item)
                  <tr>                                
                    <td><span class="text-ellipsis">{{ $item->coupon_name }}</span></td>
                    <td><span class="text-ellipsis">{{ $item->coupon_code }}</span></td>
                    <td>
                      <?php
                        if($item->coupon_condition==1){
                          ?>
                         <p >Giảm Theo Phần Trăm</p>
                        <?php
                          }else {
                         ?>                       
                           <p >Giảm Theo Tiền</p>
                        <?php
                          }
                        ?>       
                    </td>
                    <td>
                      <?php
                        if($item->coupon_condition==1){
                          ?>
                         <p >Giảm {{ $item->coupon_money }} % </p>
                        <?php
                          }else {
                         ?>                       
                             <p>Giảm {{ $item->coupon_money }} VND </p>
                        <?php
                          }
                        ?>       
                    </td>
                    <td>                     
                      <a href="{{ URL::to('/delete-coupon/'.$item->coupon_id) }}" class="active" onclick="return confirm('Bạn Có Muốn Xóa Thương hiệu Này ?')" ui-toggle-class="">
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