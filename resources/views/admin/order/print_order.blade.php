<style>
    body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    overflow:hidden;
    min-height:297mm;
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
button {
    width:100px;
    height: 24px;
}
.header {
    overflow:hidden;
}
.logo {
    background-color:#FFFFFF;
    text-align:left;
    float:left;
}
.company {
    padding-top:24px;
    text-transform:uppercase;
    background-color:#FFFFFF;
    text-align:right;
    float:right;
    font-size:16px;
}
.title {
    text-align:center;
    position:relative;
    color:#0000FF;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
.TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}
.TableData .cotSTT {
    text-align:center;
    width: 10%;
}
.TableData .cotTenSanPham {
    text-align:left;
    width: 40%;
}
.TableData .cotHangSanXuat {
    text-align:left;
    width: 20%;
}
.TableData .cotGia {
    text-align:right;
    width: 120px;
}
.TableData .cotSoLuong {
    text-align: center;
    width: 50px;
}
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
.TableData .cotSoLuong input {
    text-align: center;
}
@media print {
 @page {
 margin: 0;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}
</style>
<body onload="window.print();">
    <div id="page" class="page">
        <div class="header">
            <div class="logo"><img width="100px" height="100px" src="https://scontent-sin6-2.xx.fbcdn.net/v/t1.0-9/80329149_1260803570770234_4205745290365370368_n.jpg?_nc_cat=105&ccb=2&_nc_sid=8bfeb9&_nc_ohc=4JUMx1YdOLkAX_r4Kzn&_nc_ht=scontent-sin6-2.xx&oh=8c85ea97b913e205fe6cd7a8a16647d7&oe=5FC4A9FD"/></div>
            <div class="company">C.Ty TNHH Nguyên Và Phát</div>
        </div>
      <br/>
      <div class="title">
            HÓA ĐƠN THANH TOÁN
            <br/>
            -------oOo-------
      </div>
      <br/>
      <br/>
      
      
      <table class="TableData">
        
        <tr>
          <th>STT</th>
          <th>Tên</th>
          <th>Đơn giá</th>
          <th>Số Lượng</th>
          <th>Thành tiền</th>
        </tr>
        <?php
            $getdate = getdate();
            $vv=0;
        ?>
        @foreach ($order_details as $order_details)
            
        <tr>
            <td>{{ $vv}}</td>
            <td>{{ $order_details->product_name}}</td>
            <th>{{ number_format($order_details->product_price,'0',',',',')}} VND</th>           
            <th>{{ $order_details->product_sales_quantity}}</th>
            <th>
                <?php  
                    $thanhtien=( $order_details->product_sales_quantity * $order_details->product_price );
                   echo number_format($thanhtien,'0',',',',').' VND';
                ?>
            </th>
          </tr> 
                {{ $vv++ }}              
         @endforeach
         
           
      
        
      </table>
      
      <div class="footer-left"> Cần thơ, ngày <?php echo $getdate['mday']; ?> tháng <?php echo $getdate['mon']; ?>năm <?php echo $getdate['year']; ?><br/>
        Khách hàng </div>
        <div class="footer-left"> Cần thơ, ngày <?php echo $getdate['mday']; ?> tháng <?php echo $getdate['mon']; ?>năm <?php echo $getdate['year']; ?><br/>
        Nhân viên </div>
    </div>
    </body>