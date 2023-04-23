@extends('layouts.app')
@section('title' , "انشاء مشروع جديد")
@section('content')

<div class="row justify-content-center text-right">
    <div class="col-10">
        <h3 class="text-center pb-5 font-weight-boold">
            مشرع جديد
        </h3>
        <form action="/projects" method="POST" dir="rtl">
            @include('projects.form' , ['project' => new App\Models\project])
            <div class="form-group">
                <button class="btn btn-primary" >انشاء مشروع</button>
                <a href="/projects" class="btn btm-light">الغاء</a>
            </div>
        </form>
    </div>
</div>

@endsection