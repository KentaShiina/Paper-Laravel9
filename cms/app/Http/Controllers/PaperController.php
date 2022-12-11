<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Category;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    //SQLに近い構文　IDごとに並べられる    
    $papers = Paper::select([
    'b.id',
    'b.name',
    'b.author',
    'b.shosai',
    'r.str as category',
    ])
    ->from('papers as b')
    ->join('categories as r', function($join) {
         $join->on('b.category', '=', 'r.id');
    })
    
    ->orderBy('b.id', 'DESC')
    ->paginate(5);
    
      //$papers = Paper::latest()->paginate(5);
    return view('index',compact('papers'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //table作成の際、複数形注意
        $categorys = Category::all();
        return view('create')
            ->with('categorys',$categorys);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //バリテーション
       $request->validate([
           'name' => 'required|max:50',
           'author' => 'required|max:140',
           'category' => 'required|integer',
           'shosai' => 'required|max:200',
        ]);
        
        //登録処理
        $paper = new Paper;
        $paper->name = $request->input(["name"]);
        $paper->author = $request->input(["author"]);
        $paper->category = $request->input(["category"]);
        $paper->shosai = $request->input(["shosai"]);
        
        $paper->save();
        
        return redirect()->route('papers.index')
                ->with("success",'登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function show(Paper $paper)
    {
     $categorys = Category::all();
        return view('show',compact('paper'))
           ->with('categorys',$categorys);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function edit(Paper $paper)
    {
         //編集処理
        $categorys = Category::all();
        return view('edit',compact('paper'))
           ->with('categorys',$categorys);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paper $paper)
    {
        //バリテーション
       $request->validate([
           'name' => 'required|max:50',
           'author' => 'required|max:140',
           'category' => 'required|integer',
           'shosai' => 'required|max:200',
        ]);
        
        $paper->name = $request->input(["name"]);
        $paper->author = $request->input(["author"]);
        $paper->category = $request->input(["category"]);
        $paper->shosai = $request->input(["shosai"]);
        
        $paper->save();
    
        return redirect()->route('papers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper)
    {
        //削除
        $paper->delete();
        return redirect()->route('papers.index')
            ->with('success','論文'.$paper->name.'を削除しました');
    }
}
