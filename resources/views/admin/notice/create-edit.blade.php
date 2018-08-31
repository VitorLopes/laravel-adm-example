@extends('layouts.admin.app')
@section('content')
    @include('admin.errors.validation')
    <form action="{{route($routebasesave)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if (isset($model))
        {{Form::hidden('id', $model->id)}}
        @endif
        <div class="form-group">
            {{Form::label('inputTitle', 'Título')}}
            {{Form::textArea('title', isset($model) ? $model->title: old('title'), ['class' => 'form-control', 'id'=>"inputTitle", 'require', 'autofocus', 'placeholder'=>"Digite o título"])}}
        </div>
        <div class="form-group">
            {{Form::label('inputBody', 'Texto')}}
            {{Form::textArea('body', isset($model) ? $model->body: old('body'), ['class'=>'form-control','id'=>'inputBody','placeholder'=>'Digite o texto','required'])}}
        </div>
        <div class="form-group">
            {{Form::label('selectCreditId', 'Texto')}}
            {{Form::select('credit_id',$modelCredit, isset($model) ? $model->credit_id :0,['id' => 'selectCreditId', 'class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('filePhotoCover', 'Foto Capa')}}
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input type="file" style="display: none;" id="filePhotoCover" name="photocover">
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
            <span class="help-block">
                Try selecting one or more files and watch the feedback
            </span>
        </div>
        @if(isset($photocoverimage))
        <div style="margin-bottom: 10px;">
            <img src="{{$photocoverimage}}" style="width: 250px" />
        </div>
        @endif
        @include('admin.utils.button-submit-cancel')
    </form>
@endsection