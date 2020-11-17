@extends('layouts.appadmin')

@section('title')
    Products
@endsection

@section('content')
{{Form::hidden('',$increment=1)}}
<div class="card">
            <div class="card-body">
              <h4 class="card-title">Products</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Imagen</th>
                            <th>Nombre del producto</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $product)
                              <tr>
                                <td>{{$increment}}</td>
                                <td><img src="/storage/product_images/{{$product->product_image}}" alt=""></td>
                                <td>{{$product->product_name}}</td>
                                <td>S/{{$product->product_price}}</td>
                                <td>{{$product->product_category}}</td>
                                @if ($product->status == 1)
                                  <td>
                                    <label class="badge badge-success">Activo</label>
                                  </td>
                                    @else
                                    <td>
                                      <label class="badge badge-danger">Inactivo</label>
                                    </td>
                                @endif
                                
                                <td>
                                  <button class="btn btn-outline-primary" onclick="window.location='{{url('/edit_product/'.$product->id)}}'" >Editar</button>
                                  <a href="" class="btn btn-outline-danger" id="delete">Eliminar</a>
                                  @if ($product->status == 1)
                                    <button class="btn btn-outline-warning">Desactivar</button>
                                  @else
                                    <button class="btn btn-outline-success">Activar</button>
                                  @endif
                                  
                                </td>
                            </tr>    
                            {{Form::hidden('',$increment=$increment +1)}}
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
  <script src="{{asset('backend/js/data-table.js')}}"></script>
@endsection