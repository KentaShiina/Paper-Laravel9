@extends('app')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">編集画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/papers') }}">戻る</a>
        </div>
    </div>
 </div>   
 
 <div style="text-align:left;">
 <form action="{{ route('paper.update',$paper->id) }}" method="POST">
    @method('PUT')
    @csrf
    

     <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="name" value="{{ $paper->name }}" class="form-control" placeholder="名前">
                @error('name')
                <span style="color:red;">名前を50文字以内で入力してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="author" value="{{ $paper->author }}" class="form-control" placeholder="著者/メンバー">
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <select name="categoryi" class="form-select">
                    <option>分類を選択してください</otion>
                    @foreach ($categorys as $category)
                        <option value="{{ $category->id }}"@if($category->id==$paper->category) selected @endif>{{ $category->str }}</otion>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            <textarea class="form-control" style="height:100px" name="shosai" placeholder="詳細">{{ $paper->shosai }}</textarea>
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">編集</button>
        </div>
    </div>  
</div>    
</form>
@endsection