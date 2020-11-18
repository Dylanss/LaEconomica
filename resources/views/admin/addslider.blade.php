@extends('layouts.appadmin')

@section('title')
    Agregar Panel
@endsection

@section('content')
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Crear Panel</h4>
                    {!!Form::open(['action' => 'SliderController@addslider', 'class' => 'cmxform', 'method' => 'POST', 'id' => 'commentForm'])!!}
                        {{csrf_field()}}
                            <div class="form-group">
                                {{Form::label('', 'Descripcion 1', ['for' => 'cname'])}}
                                {{Form::text('description_one', '', ['class' => 'form-control', 'minlength' => '2'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('', 'Descripcion 2', ['for' => 'cname'])}}
                                {{Form::number('description_two', '', ['class' => 'form-control', 'minlength' => '2'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('', 'Imagen del panel', ['for' => 'cname'])}}
                                {{Form::file('slider_image', ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('', 'Status del Panel', ['for' => 'cname'])}}
                                {{Form::checkbox('silder_status', '','true',['class' => 'form-control'])}}
                            </div>
                            {{Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
@endsection