@extends('nurse.layout.index')
@section('content')

<style>
  .form-group label {
      font-weight: bold;
      font-size: 16px;
  }

  .table td,
  .table th {
      vertical-align: middle;
  }

  .table th {
      text-align: center;
  }

  .table tfoot td {
      font-weight: bold;
      text-align: right;
  }

  #qrcode canvas {
      width: 60%;
      height: 60%;
  }

  .qr-code {
      float: right;
      /* border: solid black 1pt; */
  }

  .form-group {
      width: 60%;
  }
</style>
<body class="hold-transition sidebar-mini ">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content mt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        <h2>Hóa đơn điện tử</h2>
        <form>
            <div class="form-group">
                <label for="name">Tên khách hàng:</label>
                <input type="text" class="form-control" id="name" placeholder="Nhập tên khách hàng"
                    name="name" value="{{ $userDetail->name_bn }}">
            </div>
            <div class="qr-code">
                <div id="qrcode"></div>
            </div>
            <div class="form-group">
                <label for="email">Địa chỉ email:</label>
                <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email"
                    name="email" value="{{ $userDetail->email_bn }}">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" class="form-control" id="phone" placeholder="Nhập số điện thoại"
                    name="phone" value="{{ $userDetail->phone_bn }}">
            </div>
            <div class="form-group">
                <label for="phone">Địa chỉ</label>
                <input type="tel" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address" value="{{ $userDetail->address_bn }}">
            </div>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="product1">
                        </td>
                        <td><input type="number" class="form-control" placeholder="Nhập số lượng" name="quantity1">
                        </td>
                        <td><input type="number" class="form-control" placeholder="Nhập đơn giá" name="price1">
                        </td>
                        <td><input type="number" class="form-control" placeholder="Tổng tiền" name="total1" readonly>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" align="right">Tổng tiền:</td>
                        <td><input type="number" class="form-control" id="amount" placeholder="Tổng tiền"
                                name="total" readonly>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <button type="submit" class="btn btn-primary active">In hoá đơn</button>
        </form>
    </div>
        </div>
      </div>
    </div>
  </body>
</body>


    <script>
        // Tính toán tổng tiền khi thay đổi giá trị của các trường số lượng và đơn giá
        $('input[name^="quantity"], input[name^="price"]').on('change', function() {
            var row = $(this).closest('tr');
            var quantity = parseInt(row.find('input[name^="quantity"]').val()) || 0;
            var price = parseFloat(row.find('input[name^="price"]').val()) || 0;
            var total = quantity * price;
            row.find('input[name^="total"]').val(total.toFixed(2));
            updateTotal();
        });

        // Cập nhật tổng tiền khi có thay đổi ở các trường số lượng và đơn giá
        function updateTotal() {
            var total = 0;
            $('input[name^="total"]').each(function() {
                total += parseFloat($(this).val()) || 0;
            });
            $('#amount').val(total.toFixed(2));
            var qrCodeData = "Payment Done! " + total.toFixed(2) + " VND";
            // Xóa mã QR cũ và tạo lại mã QR mới
            $('#qrcode').empty().qrcode(qrCodeData);
        }


        // Khởi động tính toán tổng tiền và mã QR
        updateTotal();
    </script>




@endsection
