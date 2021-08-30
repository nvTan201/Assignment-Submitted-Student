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
                
               
                @foreach ($exercises as $exercise)
                <a href="{{ route('Exercise.show', $exercise->idExercise) }}">
                 <table class="table table-striped " >
                        <tr>
                             <td>
                                <b>Bài Tập : 
                            </td>
                        </tr>
                        <tr>
                            <td> <label class="label-control">{{ $exercise->question }} </label>
                                <br>
                                <p class="label-control"> <b>Ngày đăng:</b> {{ $exercise->postingTime }}|<b>Hạn nộp : </b>{{ $exercise->deadlineSubmission }} |10Point</p>
                            </td>
                            
                        </tr>
                  </table>
                </a>
                @endforeach
            </div>
       
        </div>
    </div> 
</div>
    

@endsection
