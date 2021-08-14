@extends('layout.app')
@section('content')

<div class="content">
    {{-- <form class="navbar-form navbar-top" role="search">
        <div class="form-group form-search is-empty">
            <input type="text" class="form-control" name="search" value="{{$search}}" placeholder=" Search ">
            <span class="material-input"></span>
        </div>
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
        </button>
    </form> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="blue">
                    <i class="material-icons">today</i>
                </div>
                @foreach ($exercises as $exercise)
                    <div class="card-content">
                    <h4 class="card-title"></h4>
                    <a href="{{ route('Exercise.show', $exercise->idExercise) }}">
                    <div class="form-group">
                        <p>{{ $exercise->nameGrade  }}</p>
                        <label class="label-control">{{ $exercise->question }} </label>
                        <br>
                        <p class="label-control">{{ $exercise->postingTime }} </p>
                        {{-- <input type="text" class="form-control datetimepicker" value="10/05/2016" /> --}}
                    </div>
                </a>
                </div>
                @endforeach 
            </div>
       
        </div>
    </div> 
</div>
    

@endsection
