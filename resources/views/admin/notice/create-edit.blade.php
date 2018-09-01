@extends('layouts.admin.app')
@section('content')
    @include('admin.errors.validation')
    {{Form::open(['route' => $routebasesave, 'id'=>'form1', 'method' => 'post', 'enctype' => 'multipart/form-data', 'data-toggle'=>'validator'])}}
        {{ csrf_field() }}
        @if (isset($model))
        {{Form::hidden('id', $model->id)}}
        @endif
        <div class="form-group">
            {{Form::label('inputTitle', 'Título')}}
            {{Form::textArea('title', isset($model) ? $model->title: old('title'), ['cols'=>'50','rows'=>'3', 'class' => 'form-control', 'id'=>"inputTitle", 'required', 'autofocus', 'placeholder'=>"Digite o título"])}}
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            {{Form::label('inputBody', 'Texto')}}
            {{Form::textArea('body', isset($model) ? $model->body: old('body'), ['cols'=>'50','rows'=>'3','class'=>'form-control','id'=>'inputBody','placeholder'=>'Digite o texto','required'])}}
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            {{Form::label('selectCreditId', 'Texto')}}
            {{Form::select('credit_id',$modelCredit, isset($model) ? $model->credit_id :0,['id' => 'selectCreditId', 'class'=>'form-control'])}}
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            {{Form::label('filePhotoCover', 'Foto Capa')}}
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; {{Form::file('photocover',['id'=>'filePhotoCover', 'style'=>'display: none;'])}}
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
        </div>
        @if(isset($photocoverimage))
        <div style="margin-bottom: 10px;">
            <img src="{{$photocoverimage}}" style="width: 250px" />
        </div>
        @endif
        @include('admin.utils.button-submit-cancel')
    </form>
@endsection