@extends('layouts.app')
@section('content')
    <header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
    <div class="h6 text-dark">
        <a href="/projects">المشاريع / {{$project->title}}</a>
    </div>

    <div>
        <a href="/projects/{{$project->id}}/edit" class="btn btn-primary px-4" role="button">تعديل المشروع </a>
    </div>
    </header>
    <section class="row text-right" dir="rtl">
        <div class="col-4 mb-4">
            <div class="card text-right" >
                <div class="card-body">
                    <div class="status">
                        @switch($project->status)
                            @case(1)
                                <span class="text-success">مكتمل</span>
                            @break
                            @case(2)
                            <span class="text-danger">ملغي</span>
                            @break
                            @default
                            <span class="text-warning">فيد التنفيذ</span>
                        @endswitch
                        <h5 class="font-weight-bold card-title">
                            <a href="/projects/{{$project->id}}">{{$project->title}}</a>
                        </h5>
                        <div class="card-text mt-4">
                            {{$project->description }}
                        </div>

                        @include('projects.foter')
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="/projects/{{$project->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="custom-select" onchange="this.form.submit()">
                        <option value="0"{{($project->status)== 0 ? 'selected':""}}>فيد التنفيذ</option>
                        <option value="1"{{($project->status)== 1 ? 'selected':""}}>مكتمل</option>
                        <option value="2"{{($project->status)== 2 ? 'selected':""}}>ملغي</option>
                    </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            @foreach ($project->tasks as $task)
                <div class="card d-flex flex-row mr-3">
                    <div class= "{{$task->status?'checked muted':''}}">
                        {{$task->body}}
                    </div>
                    <div class="mr-auto">
                        <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <input type="checkbox" name="status" {{$task->status?'checked':''}}   onchange="this.form.submit()">
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <form action="/projects/{{$task->project_id}}/tasks/{{$task->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value=" " class="btn-delete">
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="card">
                <form action="/projects/{{$project->id}}/tasks" method="post" class="d-felx">
                    @csrf
                    <input type="text" name="body" class="form-control p-2 ml-2" placeholder="اضف مهمه جديده">
                    <button type="submit" class="btn btn-primary">اضافه</button>
                </form>
            </div>
        </div>
    </section>
@endsection