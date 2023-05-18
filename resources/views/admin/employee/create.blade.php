@extends('layouts.admin')

@section('title')
    إضافة موظف
@endsection

@section('contentheader')
    إضافة موظف
@endsection
@section('contentheaderlink')
    <a href="{{route('admin.employee.index')}}">الموظفين</a>
@endsection

@section('contentheaderactive')
    إضافة
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">إضافة موظف</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="firstName">الإسم الأول</label>
                    <input type="text" class="form-control" id="firstName" placeholder="الإسم الأول">
                </div>
                <div class="form-group">
                    <label for="lastName">الإسم الأخير</label>
                    <input type="text" class="form-control" id="lastName" placeholder="الإسم الثاني">
                </div>
                <div class="form-group">
                    <label>نوع الموظف</label>
                    <select class="form-control">
                        <option>مستودع</option>
                        <option>عامل توصيل</option>
                        <option>صيانة</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="InputEmail">البريد الإلكتروني</label>
                    <input type="email" class="form-control" id="InputEmail" placeholder="أدخل الايميل">
                </div>
                <div class="form-group">
                    <label for="InputPassword">كلمة المرور</label>
                    <input type="password" class="form-control" id="InputPassword" placeholder="كلمة المرور">
                </div>
                <!-- textarea -->
                <div class="form-group">
                    <label>ملاحظة</label>
                    <textarea class="form-control" rows="3" placeholder="أدخل ملاحظة ..."></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection

