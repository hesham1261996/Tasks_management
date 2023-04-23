@extends('layouts.app')
@section('title' , "الملف الشخصي")

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="text-center">
                    
                    <img src="{{asset('storage/'.auth()->user()->image)}}" alt="" width="82px" height="82px">
                    <h3>
                        {{auth()->user()->name}}
                    </h3>
                </div>
                <div class="card-body text-right">
                    <form action="/profile" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name" >{{__('name')}}</label>
                        <input type="text"id="name" class="form-control" name="name" value="{{auth()->user()->name}}">
                    @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" >البريد الالكتروني</label>
                        <input type="text"id="email" class="form-control" name="email" value="{{auth()->user()->email}}">
                    </div>
                    @error('email')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="password" >كلمه المرور</label>
                        <input type="password"id="password" class="form-control" name="password">
                    </div>
                    @error('password')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <div class="form-group">
                        <label for="password-confirmation" >تاكيد كلمه المرور </label>
                        <input type="password" id="password-confirmation" class="form-control" name="password-confirmation" >
                    </div>
                    <div class="form-group">
                        <label id="image">تغير صوره الملف الشخصي</label>
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-inbut" >
                            <label for="image" id="image-lable" class="custom-file-lable text-left" data-browse='استعراض'></label>

                        </div>
                        @error('image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group d-flex mt-5">
                        <button type="submit" class="btn btn-primary mr-2">حفظ التعديلات</button>
                        <button type="submit" class="btn btn-light" form="logout"> تسجيل الخروج</button>
                    </div>
                    </form>
                    <form action="/logout" method="POST" id="logout">@csrf</form>
                </div>
            </div>
        </div>
    </div>
@endsection