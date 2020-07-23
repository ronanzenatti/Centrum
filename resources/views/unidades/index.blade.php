@extends('adminlte::page')

@section('title', 'Unidades - Centrum')

@section('content_header')
    <h1 class="text-bold">Listar Unidades
        <a class="btn btn-success btn-add" href='{{url("unidades/create")}}'>Adicionar</a>
    </h1>
@stop

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
            {{ $message }}
        </div>
    @endif

    @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
            {{ $message }}
        </div>
    @endif

    @csrf
    <table id="unidadesTable" class="table table-bordered table-striped dataTable" style="width: 100%">
        <thead>
        <tr class="text-center">
            <th>#</th>
            <th>Tipo</th>
            <th>Unidade</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Ações</th>
        </tr>
        </thead>
    </table>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Versão</b> 1.0.0
    </div>
    <strong>Copyright © 2020 <a href="http://www.ronanzenatti.com">Ronan Adriel
            Zenatti</a>.</strong> Todos os direitos reservados.
@stop

@section('css')

@stop

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('js')
    <script>
        $('#unidadesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('dataTableUnits') !!}',
            language: {
                decimal: ",",
                url: 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json'
            },
            columns: [
                {data: 'id', name: 'id', class: 'text-center'},
                {data: 'tipo', name: 'tipo', class: 'text-center'},
                {data: 'unidade', name: 'unidade', class: 'text-center'},
                {data: 'nome', name: 'nome'},
                {data: 'cidade', name: 'cidade'},
                {data: 'actions', name: 'actions', class: 'text-center', searchable: false, orderable: false}
            ]
        });
    </script>
@stop
