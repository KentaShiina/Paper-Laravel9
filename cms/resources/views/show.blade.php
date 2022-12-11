@extends('app')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">詳細画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/papers') }}">戻る</a>
        </div>
    </div>
 </div>   
 
 <div style="text-align:left;">
 
    <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                {{ $paper->name }}                
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                {{ $paper->author }}                
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                @foreach ($categorys as $category)
                    @if($category->id==$paper->category) {{ $category->str }} @endif
                @endforeach         
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            {{ $paper->shosai }}                
            </div>
        </div>
    </div>

@endsection