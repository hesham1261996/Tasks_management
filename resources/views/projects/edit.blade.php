@extends('layouts.app')
@section('title' , "تعديل المشروع")
@section('content')

<div class="row justify-content-center text-right">
    <div class="col-10">
        <h3 class="text-center pb-5 font-weight-boold">
            تعديل المشروع
        </h3>
        <form action="/projects/{{$project->id}}" method="POST" dir="rtl">
            @method("PATCH")
            @include('projects.form')
        <div class="form-group">
            <button class="btn btn-primary" >تعديل المشروع</button>
            <a href="/projects" class="btn btm-light">الغاء</a>
        </div>
        </form>
    </div>
</div>

@endsection