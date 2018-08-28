@extends('layouts.admin.app')
@section('content')
    @include('admin.errors.validation')
    <form action="{{route($routebasesave)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if (isset($model))
            <input type="hidden" name="id" value="{{$model->id}}">
        @endif
        <div class="form-group">
            <label for="inputTitle">Título</label>
            <textarea name="title" id="inputTitle" class="form-control" required autofocus>{{isset($model) ? $model->title: old('title')}}</textarea>
        </div>
        <div class="form-group">
            <label for="inputBody">Texto</label>
            <textarea name="body" id="inputBody" class="form-control" required>{{isset($model) ? $model->body: old('body')}}</textarea>
        </div>
        <div class="form-group">
            <label for="selectCreditId">Credito</label>
            <select class="form-control" name="credit_id" id="selectCreditId">
            @if (isset($modelCredit))
            @foreach($modelCredit as $key => $value)
            <option value="{{$key}}"{!!isset($model)?($model->credit_id==$key?' selected="selected"':''):''!!}>{{$value}}</option>
            @endforeach
            @endif
            </select>
        </div>
        <div class="form-group">
            <label for="filePhotoCover">Foto Capa</label>
            <input type="file" id="filePhotoCover" name="photocover">
        </div>
        @if(isset($photocoverimage))
        <div style="margin-bottom: 10px;">
            <img src="{{$photocoverimage}}" style="width: 250px" />
        </div>
        @endif
        @include('admin.utils.button-submit-cancel')
    </form>
@endsection