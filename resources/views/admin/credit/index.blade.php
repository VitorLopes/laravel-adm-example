@extends('layouts.admin.app')
@section('content')
    @include('admin.utils.filter-index')
    @include('admin.utils.button-new')
    <table class="table table-condensed">
        <tr>
            <th style="width: 15%" class="text-center">Id</th>
            <th class="text-center">Descrição</th>
            <th style="width: 15%" class="text-center">...</th>
        </tr>
        @foreach($model as $item)
        <tr>
            <td class="text-center">{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td class="text-center">
                @include('admin.utils.button-edit-remove')
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3" class="text-center">
                @include('admin.utils.paginate-index')
            </td>
        </tr>
    </table>
@endsection