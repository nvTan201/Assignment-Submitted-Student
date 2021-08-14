@extends('layout.app')
@section('content')
    
<div class="content">
  
    <div class="row"> --}}
       <div class="col-md-12">
            <div class="card">
           
                @foreach ($grades as $grade)
                <div class="card-content">
                    <h4 class="card-title">{{ $grade->nameGrade }}</h4>
                    <div class="form-group">
                        <p>{{ $grade->question }} </p>
                        <label class="label">{{ $grade->postingTime }}</label>
                
                        <label class="label-right">10 Points </label>
                    </div>
                </div>
                @endforeach 
            </div>
       
        </div>
       
        
    </div> 
</div>

@endsection
