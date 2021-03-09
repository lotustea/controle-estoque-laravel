@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Remover quantidade do estoque</h2>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <h3>{{ $product->name }} - SKU: {{ $product->sku }} </h3>

            <div class="card">
                <hr>
                    <form method="patch" action="{{route('products.removeAmount')}}">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <div class="form-group row">
                            <label for="quantidade" class="col-md-4 col-form-label text-md-right">Quantidade</label>
                            <div class="col-md-6">
                                <input id="quantidade" class="form-control" name="amount" type="numeric" value="">
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
                <hr>
            </div>
            <hr>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
@endsection
