@extends('layout.app')
@section('content')


<div class="content">
        {{-- them --}}
        <button type="button" class="btn btn-primary navbar-right" data-toggle="modal" data-target="#exampleModal">
            Thêm lop 
          </button>
          
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{ route('grade.store') }}" method="post" id="LoginValidation">
                    
                    @csrf
                <div class="modal-body">
                    <div class="card">
                  
                            <div class="card-header card-header-icon" data-background-color="rose">
                                <i class="material-icons">contacts</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Thêm lớp nè</h4>
                                <div class="form-group label-floating">
                                    <label class="control-label">Tên lớp 
                                        <star>*</star>
                                    </label>
                                    <input class="form-control" name="nameGrade" type="text"  required="true" />
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Khóa
                                        <star>*</star>
                                    </label>
                                    <input class="form-control" name="course" type="" required="true" />
                                </div>
                                <div class="category form-category">
                                    <star>*</star> Required fields</div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-rose btn-fill btn-wd">Register</button>
                                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                                </div>
                            </div>
                       
                    </div>
                </div>
               
                </form>
              </div>
            </div>
          </div>
           {{-- end --}}
           {{-- search --}}
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
{{-- end --}}
    <div class="card">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">assignment</i>
    </div>
   
   
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                   
                    <th>Mã lớp</th>
                    <th>Tên lớp</th>
                    <th>Khóa</th>z
                    <th>Xem</th>
                    <th >Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($grades as $grade)
                <tr>
                 
                    <td>{{ $grade->idGrade }}</td>
                    <td>{{ $grade->nameGrade }}</td>
                    <td>{{ $grade->course }}</td>
                    <td >  <a href="{{ route('grade.show', $grade->idGrade) }}">xem</a></td>

                    <td>
                        <a href="{{ route('grade.edit', $grade->idGrade) }}"  class="btn btn-success" ><i class="material-icons">edit</i></a>
                     </td>
             
                        
                  


                    <td >
                        
                           <form action="{{ route('grade.destroy',$grade->idGrade ) }}" method="post" id="LoginValidation">
                            @method('DELETE')
                            @csrf
                        <button onclick=" return confirm('Bạn có muốn xóa không')" class="btn btn-danger btn sm">
                            <i class="material-icons">close</i>
                        </button>
                       
                           </form>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
        {{-- $grades->linhs() phan trang
                appends tim kiem
            --}}
            <div class="text-center">
            {{ $grades->appends(['search' => $search])->links() }}
            </div>
        {{-- end --}}
        </div>
   
       
    </div> 
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">today</i>
                </div>
                @foreach ($grades as $grade)
                <div class="card-content">
                    <h4 class="card-title">{{ $grade->nameGrade }}</h4>
                    <div class="form-group">
                        <label class="label-control">{{ $grade->question }} </label>
                        <input type="text" class="form-control datetimepicker" value="10/05/2016" />
                    </div>
                </div>
                @endforeach 
            </div>
       
        </div>
    </div>     



@endsection
