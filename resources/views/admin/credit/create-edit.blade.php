@extends('layouts.admin.app')
@section('content')
    @include('admin.errors.validation')
    <form action="{{route($routebasesave)}}" method="post">
        {{ csrf_field() }}
        @if (isset($model))
        <input type="hidden" name="id" value="{{$model->id}}">
        @endif
        <div class="form-group">
            <label for="inputName">Descrição</label>
            <input type="text" name="name" value="{{isset($model) ? $model->name: old('name')}}" class="form-control" id="inputName" placeholder="Descrição" autofocus>
        </div>
        @include('admin.utils.button-submit-cancel')
    </form>
@endsection