@extends('layouts.admin')

@section('title')
    الطلبات
@endsection

@section('contentheader')
    الطلبات
@endsection

@section('contentheaderactive')
    الطلبات
@endsection

@section('content')
    <!-- TABLE: LATEST ORDERS -->
    <div class="card" id="app">
        <example-component></example-component>
        <div class="card-header border-transparent">
            <h3 class="card-title">Latest Orders</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0" id="orders-table">
                    <thead>
                    <tr>
                        <th>رقم الطلب</th>
                        <th>اسم المركز</th>
                        <th>نوع الطلب</th>
                        <th>تكلفة الطلب</th>
                        <th>حالة الطلب</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr id="{{$order->id}}">
                            <td><a href="pages/examples/invoice.html">{{$order->id}}</a></td>
                            <td>{{$order->customer->centerName}}</td>
                            <td>{{$order->orderType}}</td>
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{$order->totalPrice}}</div>
                            </td>
                            <td><span class="badge badge-success orderStatus">{{$order->orderStatus}}</span></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- /.col -->
@endsection

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
{{--    <script src="{{ asset('vendor/websockets/socket.io.js') }}"></script>--}}
{{--    <script src="{{ asset('js/bootstrap.js') }}"></script>--}}
{{--    <script>--}}
{{--        var ordersTable = document.querySelector('#orders-table');--}}
{{--        window.Echo.channel('orders')--}}
{{--            .listen('SendOrder', (e) => {--}}
{{--                // // Find the row in the table corresponding to the updated user--}}
{{--                // var row = ordersTable.querySelector('tr[data-id="' + e.order.id + '"]');--}}
{{--                // // Update the row with the new order data--}}
{{--                // row.querySelector('.orderStatus').textContent = e.order.orderStatus;--}}
{{--                // $('#orders-table').DataTable().ajax.reload();--}}
{{--                // location.reload();--}}
{{--                console.log(e.message)--}}
{{--            })--}}
{{--            .listen('ExecuteOrder', (e) => {--}}
{{--                // Find the row in the table corresponding to the updated order--}}
{{--                var row = ordersTable.querySelector('tr[data-id="' + e.order.orderStatus + '"]');--}}

{{--                // Update the row with the new order data--}}
{{--                // row.querySelector('.orderStatus').textContent = e.order.orderStatus;--}}
{{--                $('#orders-table').DataTable().ajax.reload();--}}
{{--            });--}}
{{--    </script>--}}
@endsection


