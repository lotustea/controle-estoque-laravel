@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card card-default">
                <div class="card-header">
                    <h3>Produto</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="@if (isset($action)) {{  $action }} @else {{ url('products') }} @endif">
                        {{csrf_field()}}
                        @isset($product) {{method_field('patch')}} @endisset
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
                            <div class="col-md-6">
                                <input id="name" class="form-control" name="name" type="text" value="@if (isset($product)) {{  $product->name }} @endif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sku" class="col-md-4 col-form-label text-md-right">SKU</label>
                            <div class="col-md-6">
                                <input id="autor" class="form-control" name="sku" type="text" value="@if (isset($product)) {{  $product->sku }} @endif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="preco" class="col-md-4 col-form-label text-md-right">Preço</label>
                            <div class="col-md-6">
                                <input id="preco" class="form-control" name="price" type="text" value="@if (isset($product)) {{  $product->price }}@endif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantidade" class="col-md-4 col-form-label text-md-right">Quantidade</label>
                            <div class="col-md-6">
                                <input id="quantidade" class="form-control" name="amount" type="number" value="@if (isset($product)) {{  intval($product->amount) }}@endif">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
