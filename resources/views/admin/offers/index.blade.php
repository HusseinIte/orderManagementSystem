@extends('layouts.admin')

@section('title')
    العروض
@endsection

@section('contentheader')
    العروض
@endsection

@section('contentheaderactive')
    العروض
@endsection
@section('OfferActive')
    active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-image">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">رمز المنتج</th>
                        <th scope="col">صورة</th>
                        <th scope="col">الصنف</th>
                        <th scope="col">السعر</th>
                        <th scope="col">الكمية</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <th scope="row">{{$product->numberModel}}</th>
                            <td class="w-25">
                                <img
                                    src="{{route('ProductImage',$product->id)}}"
                                    class="img-fluid img-thumbnai img-lg float-left"  alt="Sheep">
                            </td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->amount}}</td>
                            <td>
                                <button type="button" class="btn btn-block btn-secondary">إضافة عرض</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


