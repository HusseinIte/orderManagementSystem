@extends('layouts.admin')

@section('title')
    الرئيسية
@endsection

@section('contentheader')
    الرئيسية
@endsection

@section('contentheaderlink')
    <a href="{{route('admin.dashboard')}}">الرئيسية</a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')
{{--    <!-- TABLE: LATEST ORDERS -->--}}
{{--    <div class="card">--}}
{{--        <div class="card-header border-transparent">--}}
{{--            <h3 class="card-title">Latest Orders</h3>--}}

{{--            <div class="card-tools">--}}
{{--                <button type="button" class="btn btn-tool" data-card-widget="collapse">--}}
{{--                    <i class="fas fa-minus"></i>--}}
{{--                </button>--}}
{{--                <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
{{--                    <i class="fas fa-times"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- /.card-header -->--}}
{{--        <div class="card-body p-0">--}}
{{--            <div class="table-responsive">--}}
{{--                <table class="table m-0">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>رقم الطلب</th>--}}
{{--                        <th>اسم المركز</th>--}}
{{--                        <th>تكلفة الطلب</th>--}}
{{--                        <th>حالة الطلب</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($orders as $order)--}}
{{--                        <tr>--}}
{{--                            <td><a href="pages/examples/invoice.html">{{$order->id}}</a></td>--}}
{{--                            <td>Call of Duty IV</td>--}}
{{--                            <td>--}}
{{--                                <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>--}}
{{--                            </td>--}}
{{--                            <td><span class="badge badge-success">Shipped</span></td>--}}
{{--                        </tr>--}}
{{--                        @endforeach--}}

{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--            <!-- /.table-responsive -->--}}
{{--        </div>--}}
{{--        <!-- /.card-body -->--}}
{{--    </div>--}}
{{--    <!-- /.card -->--}}
{{--    </div>--}}
{{--    <!-- /.col -->--}}

@endsection
