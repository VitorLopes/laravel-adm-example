@extends('layouts.admin.app')
@section('content')
    @include('admin.errors.validation')
    {{Form::open(['route' => $routebasesave, 'method' => 'post'])}}
        @if (isset($model))
        {{Form::hidden('id', $model->id)}}
        @endif
        <div class="form-group">
            {{Form::label('inputName', 'Descrição')}}
            {{Form::text('name', isset($model) ? $model->name: old('name'), ['class' => 'form-control','id'=>'inputName','placeholder'=>'Digite a descrição','required','autofocus'])}}
        </div>
        @include('admin.utils.button-submit-cancel')
    </form>
@endsection