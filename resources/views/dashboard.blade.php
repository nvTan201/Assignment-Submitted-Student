@extends('layout.app')
@section('content')
    
<div class="content">
    <h1>HELLO</h1>
 
        <div id="row">
          
            <div class="col-lg-3 col-md-6 col-sm-6">
               
                <a href="{{ route('Exercise.index') }}">
                
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="blue">
                            <i class="material-icons">LỚP</i>
                        </div>
                        <div class="card-content">
                            <p class="category"></p>
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger"></i>
                                <a href="#pablo"></a>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
        
   
       
        </div>
  
</div>
@endsection

            