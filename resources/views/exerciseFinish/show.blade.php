@extends('layout.app')
@section('content')
    
<div class="content">
    <table class="table table-striped">
        <tr>
            <th>Tên bài tập</th>
            <th>Ngày nộp</th>
            <th>Điểm</th>
            <th>Đánh giá</th>
        </tr>
        {{-- @foreach ($exerciseFinishs as $exerciseFinish) --}}
            <tr>
                <td>{{ $exerciseFinishs->exerciseFinish}}</td>
                <td>{{ $exerciseFinishs->respponTime}}</td>
                <td>{{ $exerciseFinishs->mark}}</td>
                <td>{{ $exerciseFinishs->note}}</td>
            </tr>
        {{-- @endforeach --}}
      
        
      </table>
</div>
@endsection