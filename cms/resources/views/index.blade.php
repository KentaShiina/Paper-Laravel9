@extends('app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:1rem;">タスク・論文</h2>
            </div>
            <div class="text-right">
            <a class="btn btn-success" href="{{ route('paper.create') }}">新規登録</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12"
        @if ($messeage = Session::get('success'))
            <div class="alert alert-success mt-1"><p>{{ $messeage }}</p></div>
        @endif
    </div>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>name</th>
            <th>author</th>
            <th>category</th>
        </tr>
        @foreach ($papers as $paper)
        <tr>
            <td style="text-align:right">{{ $paper->id }}</td>
            <td><a href="{{ route('paper.show',$paper->id) }}">{{ $paper->name }}</a></td>
            <td style="text-align:right">{{ $paper->author }}</td>
            <td style="text-align:left">{{ $paper->category }}</td>
            <td style="text-align:center">
            　　　<a class="btn btn-primary" href="{{ route('paper.edit',$paper->id) }}">編集</a>
            </td>
            <td style="text-align:center">
                <form action="{{ route('paper.destroy',$paper->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick='return confirm("削除しますか？");'>削除</button>
                </form>
            @endforeach    
            </td>  
        </tr>
    </table>

    {!! $papers->links('pagination::bootstrap-5') !!}
    
@endsection    
    