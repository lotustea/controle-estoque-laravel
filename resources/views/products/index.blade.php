@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Produtos</h2>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th colspan="2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td><a href="products/{{ $product->id }}">{{ $product->sku }}</a></td>
                            <td>{{ $product->nome }}</td>
                            <td>{{ $product->preco }}</td>
                            <td>{{ $product->quantidade }}</td>
                            <td>
                                <a href="{{action('ProductController@edit', $product->id)}}" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                                <form action="{{action('ProductController@destroy', $product->id)}}" method="post">
                                  {{csrf_field()}} {{ method_field('delete') }}
                                  <button class="delete-item btn btn-danger" type="submit">Deletar</button>
                              </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
