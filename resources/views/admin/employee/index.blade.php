@extends('layouts.admin')

@section('title')
    الموظفين
@endsection

@section('contentheader')
    الموظفين
@endsection

@section('contentheaderactive')
    الموظفين
@endsection
@section('content')
    <div class="card-footer clearfix">
        <a href="{{route('admin.employee.create')}}" class="btn btn-info float-left"><i class="fas fa-plus"></i>إضافة موظف</a>
{{--        <button type="button" class="btn btn-info float-left"><i class="fas fa-plus"></i>إضافة موظف</button>--}}
    </div>
    <section class="content">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                                مدير مستودع
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>حسين حمدان</b></h2>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                                Address: Demo Street 123, Demo City 04312, NJ
                                            </li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23
                                                52
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="{{asset('assets/admin/dist/img/user1-128x128.jpg')}}" alt=""
                                             class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-block btn-primary">
                                    <i class="fas fa-user"></i>
                                    <span> </span>
                                    عرض الملف
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

