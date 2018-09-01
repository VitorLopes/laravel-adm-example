@extends('layouts.admin.app')
@section('content')
    @include('admin.errors.validation')
    {{Form::open(['route' => $routebasesave, 'method' => 'post','data-toggle'=>'validator'])}}
        @if (isset($model))
        {{Form::hidden('id', $model->id)}}
        @endif
        <div class="form-group">
            {{Form::label('inputName', 'Descrição')}}
            {{Form::text('name', isset($model) ? $model->name: old('name'), ['class' => 'form-control','id'=>'inputName','placeholder'=>'Digite a descrição','required','autofocus'])}}
            <div class="help-block with-errors"></div>
        </div>
        @include('admin.utils.button-submit-cancel')
    </form>
@endsection