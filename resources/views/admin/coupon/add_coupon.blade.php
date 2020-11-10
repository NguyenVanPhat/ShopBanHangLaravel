@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Mã Giảm Giá
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
                        <form role="form" action="{{ URL::to('/add-coupon') }}" method="post">                    
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Mã Giảm Giá</label>
                            <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Mã Giảm Giá....">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã Giảm Giá</label>
                            <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1" placeholder="Mã Giảm Giá....">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Lượng Mã Giảm Giá</label>
                            <input type="text" name="coupon_qty" class="form-control" id="exampleInputEmail1" placeholder="số lượng Mã Giảm Giá....">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tính năng mã</label>
                            <select name="coupon_condition" class="form-control input-sm m-bot15">
                                <option value='0'>-------Chọn--------</option>
                                <option value='1'>Giảm Theo Phần Trăm</option>
                                <option value='2'>Giảm Theo Tiền</option>                              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hãy Nhập % Hoặc Số Tiền Giảm</label>
                            <input type="text" name="coupon_money" class="form-control" id="exampleInputEmail1" placeholder="số lượng Mã Giảm Giá....">
                        </div>                                            
                        <button type="submit" name="add_coupon" class="btn btn-info">Submit</button>
                    </form>
                    </div>
                </div>
            </section>

    </div>
</div>
@endsection