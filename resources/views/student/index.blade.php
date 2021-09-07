@extends('layout.app')
@section('content')

<div class="content">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">assignment</i>
    </div>
 
    <form class="navbar-form navbar-top" role="search">
        <div class="form-group form-search is-empty">
            <input type="text" class="form-control" name="search" value="{{$search}}" placeholder=" Search ">
            <span class="material-input"></span>
        </div>
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
        </button>
    </form>
    <div class="table-responsive">
        <form>
            @foreach ($students as $student)
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên học sinh</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $student->fistNameStudent." ". $student->lastNameStudent}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Ngày sinh</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $student->dateBirth }}">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Giới tính</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $student->gender }}">
                </div>
              </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $student->emailStudent }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="{{ $student->passWordStudent }}">
              </div>
              <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $student->idGrade }}">
              </div>
            </div>
            </div>
            @endforeach 
          </form>
        
         {{-- $grades->linhs() phan trang
                appends tim kiem
            --}}
            <div class="text-center">
                {{ $students->appends(['search' => $search])->links() }}
                </div>
            {{-- end --}}
            </div>
</div>
@endsection

   
   
    