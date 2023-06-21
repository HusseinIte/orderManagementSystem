{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>How To Generate Invoice PDF In Laravel 9 - Techsolutionstuff</title>--}}
{{--</head>--}}
{{--<style type="text/css">--}}
{{--    body {--}}
{{--        font-family: 'Roboto Condensed', sans-serif;--}}
{{--    }--}}

{{--    .m-0 {--}}
{{--        margin: 0px;--}}
{{--    }--}}

{{--    .p-0 {--}}
{{--        padding: 0px;--}}
{{--    }--}}

{{--    .pt-5 {--}}
{{--        padding-top: 5px;--}}
{{--    }--}}

{{--    .mt-10 {--}}
{{--        margin-top: 10px;--}}
{{--    }--}}

{{--    .text-center {--}}
{{--        text-align: center !important;--}}
{{--    }--}}

{{--    .w-100 {--}}
{{--        width: 100%;--}}
{{--    }--}}

{{--    .w-50 {--}}
{{--        width: 50%;--}}
{{--    }--}}

{{--    .w-85 {--}}
{{--        width: 85%;--}}
{{--    }--}}

{{--    .w-15 {--}}
{{--        width: 15%;--}}
{{--    }--}}

{{--    .logo img {--}}
{{--        width: 200px;--}}
{{--        height: 60px;--}}
{{--    }--}}

{{--    .gray-color {--}}
{{--        color: #5D5D5D;--}}
{{--    }--}}

{{--    .text-bold {--}}
{{--        font-weight: bold;--}}
{{--    }--}}

{{--    .border {--}}
{{--        border: 1px solid black;--}}
{{--    }--}}

{{--    table tr, th, td {--}}
{{--        border: 1px solid #d2d2d2;--}}
{{--        border-collapse: collapse;--}}
{{--        padding: 7px 8px;--}}
{{--    }--}}

{{--    table tr th {--}}
{{--        background: #F4F4F4;--}}
{{--        font-size: 15px;--}}
{{--    }--}}

{{--    table tr td {--}}
{{--        font-size: 13px;--}}
{{--    }--}}

{{--    table {--}}
{{--        border-collapse: collapse;--}}
{{--    }--}}

{{--    .box-text p {--}}
{{--        line-height: 10px;--}}
{{--    }--}}

{{--    .float-left {--}}
{{--        float: left;--}}
{{--    }--}}

{{--    .total-part {--}}
{{--        font-size: 16px;--}}
{{--        line-height: 12px;--}}
{{--    }--}}

{{--    .total-right p {--}}
{{--        padding-right: 20px;--}}
{{--    }--}}
{{--</style>--}}
{{--<body>--}}
{{--<div class="head-title">--}}
{{--    <h1 class="text-center m-0 p-0">Invoice</h1>--}}
{{--</div>--}}
{{--<div class="add-detail mt-10">--}}
{{--    <div class="w-50 float-left mt-10">--}}
{{--        <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#1</span></p>--}}
{{--        <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">AB123456A</span></p>--}}
{{--        <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">22-01-2023</span></p>--}}
{{--    </div>--}}
{{--    <div class="w-50 float-left logo mt-10">--}}
{{--        <img src="https://techsolutionstuff.com/frontTheme/assets/img/logo_200_60_dark.png" alt="Logo">--}}
{{--    </div>--}}
{{--    <div style="clear: both;"></div>--}}
{{--</div>--}}
{{--<div class="table-section bill-tbl w-100 mt-10">--}}
{{--    <table class="table w-100 mt-10">--}}
{{--        <tr>--}}
{{--            <th class="w-50">From</th>--}}
{{--            <th class="w-50">To</th>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>--}}
{{--                <div class="box-text">--}}
{{--                    <p>Mountain View,</p>--}}
{{--                    <p>California,</p>--}}
{{--                    <p>United States</p>--}}
{{--                    <p>Contact: (650) 253-0000</p>--}}
{{--                </div>--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                <div class="box-text">--}}
{{--                    <p> 410 Terry Ave N,</p>--}}
{{--                    <p>Seattle WA 98109,</p>--}}
{{--                    <p>United States</p>--}}
{{--                    <p>Contact: 1-206-266-1000</p>--}}
{{--                </div>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    </table>--}}
{{--</div>--}}
{{--<div class="table-section bill-tbl w-100 mt-10">--}}
{{--    <table class="table w-100 mt-10">--}}
{{--        <tr>--}}
{{--            <th class="w-50">Payment Method</th>--}}
{{--            <th class="w-50">Shipping Method</th>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--            <td>Cash On Delivery</td>--}}
{{--            <td>Free Shipping - Free Shipping</td>--}}
{{--        </tr>--}}
{{--    </table>--}}
{{--</div>--}}
{{--<div class="table-section bill-tbl w-100 mt-10">--}}
{{--    <table class="table w-100 mt-10">--}}
{{--        <tr>--}}
{{--            <th class="w-50">رمز المنتج</th>--}}
{{--            <th class="w-50"> ماركةالمنتج</th>--}}
{{--            <th class="w-50">نوع المنتج</th>--}}
{{--            <th class="w-50">السعر</th>--}}
{{--            <th class="w-50">الكمية</th>--}}
{{--            <th class="w-50">المجموع الجزئي</th>--}}
{{--        </tr>--}}
{{--        @foreach($items as $item)--}}
{{--            <tr align="center">--}}
{{--                <td>{{$item->product->numberModel}}</td>--}}
{{--                <td>{{$item->product->manufactureCompany}}</td>--}}
{{--                <td>{{$item->product->category->name}}</td>--}}
{{--                <td>{{$item->product->price}}</td>--}}
{{--                <td>{{$item->quantity}}</td>--}}
{{--                <td>{{$item->product->price*$item->quantity}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        <tr>--}}
{{--            <td >--}}
{{--                <div class="total-part">--}}
{{--                    <div class="total-left w-85 float-left" align="right">--}}
{{--                        <p>Sub Total</p>--}}
{{--                        <p>Tax (18%)</p>--}}

{{--                    </div>--}}
{{--                    <div class="total-right w-15 float-left text-bold" align="right">--}}
{{--                        <p>$7600</p>--}}
{{--                        <p>$400</p>--}}
{{--                        <p>$8000.00</p>--}}
{{--                    </div>--}}
{{--                    <div style="clear: both;"></div>--}}
{{--                </div>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    </table>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('assets/admin/fonts/SansPro/SansPro.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="{{asset('assets/admin/fonts/SansPro/SansPro.css')}}" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h2 class="page-header">
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: 2/10/2014</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice #007612</b><br>
                <br>
                <b>Order ID:</b> 4F3S8J<br>
                <b>Payment Due:</b> 2/22/2014<br>
                <b>Account:</b> 968-34567
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Serial #</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Call of Duty</td>
                        <td>455-981-221</td>
                        <td>El snort testosterone trophy driving gloves handsome</td>
                        <td>$64.50</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Need for Speed IV</td>
                        <td>247-925-726</td>
                        <td>Wes Anderson umami biodiesel</td>
                        <td>$50.00</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Monsters DVD</td>
                        <td>735-845-642</td>
                        <td>Terry Richardson helvetica tousled street art master</td>
                        <td>$10.70</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Grown Ups Blue Ray</td>
                        <td>422-568-642</td>
                        <td>Tousled lomo letterpress</td>
                        <td>$25.99</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
                <p class="lead">Payment Methods:</p>
                <img src="{{asset('assets/admin/dist/img/credit/visa.png')}}" alt="Visa">
                <img src="{{asset('assets/admin/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                <img src="{{asset('assets/admin/dist/img/credit/american-express.png')}}" alt="American Express">
                <img src="{{asset('assets/admin/dist/img/credit/paypal2.png')}}" alt="Paypal">

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg dopplr
                    jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                </p>
            </div>
            <!-- /.col -->
            <div class="col-6">
                <p class="lead">Amount Due 2/22/2014</p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>$250.30</td>
                        </tr>
                        <tr>
                            <th>Tax (9.3%)</th>
                            <td>$10.34</td>
                        </tr>
                        <tr>
                            <th>Shipping:</th>
                            <td>$5.80</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>$265.24</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
