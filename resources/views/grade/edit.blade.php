@extends('layout.app')
@section('content')

<div class="content">
    <form action="{{ route('grade.update', $grade->idGrade)}}" method="post" id="LoginValidation">
            @method('PUT')
             @csrf
    <div class="modal-body">
        <div class="card">
      
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Sua học sinh</h4>
                    <div class="form-group label-floating">
                        <label class="control-label">Tên học sinh
                            <star>*</star>
                        </label>
                        <input class="form-control" name="nameGrade" type="text"  required="true" value="{{ $grade->nameGrade }}" />
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Khóa
                            <star>*</star>
                        </label>
                        <input class="form-control" name="course"  required="true" value="{{ $grade->course }}"/>
                    </div>
                    <div class="category form-category">
                        <star>*</star> Required fields</div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-rose btn-fill btn-wd">Register</button>
                        <a href="javascript:history.back()"><u>Quay lại</u></a>
                    </div>
                </div>
           
        </div>
    </div>
    
    </form>

           
</div>
@endsection

            