@extends('layouts.appadmin')

@section('title')
    Editar Panel
@endsection

@section('content')
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Editar Panel</h4>  
                    {!!Form::open(['action' => 'SliderController@updateslider', 'class' => 'cmxform', 'method' => 'POST', 'id' => 'commentForm', 'enctype' => 'multipart/form-data'])!!}
                        {{csrf_field()}}
                            <div class="form-group">
                                {{Form::hidden('id', $slider->id)}}
                                {{Form::label('', 'Descripcion 1', ['for' => 'cname'])}}
                                {{Form::text('description_one', $slider->description1, ['class' => 'form-control', 'minlength' => '2'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('', 'Descripcion 2', ['for' => 'cname'])}}
                                {{Form::text('description_two', $slider->description2, ['class' => 'form-control', 'minlength' => '2'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('', 'Imagen del panel', ['for' => 'cname'])}}
                                {{Form::file('slider_image', ['class' => 'form-control'])}}
                            </div>

                            {{Form::submit('Actualizar', ['class' => 'btn btn-primary'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('backend/js/bt-maxLength.js')}}"></script>
@endsection