@csrf
<div class="form-group">
    <label for="title" class="form-label">عنوان المشروع</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}">
    @error('title')
        {{$message}}
    @enderror
</div>
<div class="form-group">
    <label for="description" class="form-label">وصف المشروع</label>
    <textarea name="description" class="form-control" id="description" rows="3">{{$project->description}}</textarea>
    @error('description')
        {{$message}}
    @enderror
</div>
