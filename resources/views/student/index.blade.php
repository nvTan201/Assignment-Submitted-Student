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
        <table class="table">
            <thead>
                <tr>
                   
                    <th>Mã học sinh</th>
                    <th>Tên học sinh</th>
                    <th>ngày sinh</th>
                    <th>giới tính</th>
                    <th >email</th>
                    <th>mật khẩu</th>
                    <th>lớp</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($students as $student)
                <tr>
                 
                    <td>{{ $student->idStudent }}</td>
                    <td>{{ $student->fistNameStudent." ". $student->lastNameStudent}}</td>
                    <td>{{ $student->dateBirth }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->emailStudent }}</td>
                    <td>{{ $student->passWordStudent }}</td>
                    <td> {{ $student->idGrade }}</td>
                    {{-- <td>{{ $student->grade->nameGrade."k".$student->grade->course }}</td> --}}
                    {{-- <td >  <a href="{{ route('grade.show', $grade->idGrade) }}">xem</td>

                    <td>
                        <a href="{{ route('grade.edit', $grade->idGrade) }}"  class="btn btn-success" ><i class="material-icons">edit</i></a>
                     </td> --}}
             
                    {{-- <td >
                        
                           <form action="{{ route('grade.destroy',$grade->idGrade ) }}" method="post" id="LoginValidation">
                            @method('DELETE')
                            @csrf
                        <button onclick=" return confirm('Bạn có muốn xóa không')" class="btn btn-danger btn sm">
                            <i class="material-icons">close</i>
                        </button>
                       
                           </form>
                    </td> --}}
                </tr>
                @endforeach 
            </tbody>
        </table>
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

   
   
    