@extends('layout.app')
@section('content')
<div class="content">
   
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Thêm học sinh
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                        <h4 class="card-title">Thêm học sinh</h4>
                        <div class="form-group label-floating">
                            <label class="control-label">Tên học sinh
                                <star>*</star>
                            </label>
                            <input class="form-control" name="nameGrade" type="text"  required="true" />
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Khóa
                                <star>*</star>
                            </label>
                            <input class="form-control" name="course" type="password" required="true" />
                        </div>
                        <div class="category form-category">
                            <star>*</star> Required fields</div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-rose btn-fill btn-wd">Register</button>
                        </div>
                    </div>
               
            </div>
        </div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
  {{-- end--}}



@endsection
