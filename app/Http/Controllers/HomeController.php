<?php

namespace App\Http\Controllers;

use App\Video;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function search($text){
       $videos=Video::where('title','like','%'.$text.'%')->paginate(10);
       $videotag=Video::whereHas('tags',function (  $query) use ($text){
           return $query->where('tag_name',$text);

       })->paginate(10);
       $videocat=Video::whereHas('cat',function (  $query) use ($text){
           return $query->where('name',$text);

       })->paginate(10);
     $total=$videos->total()+$videotag->total()+$videocat->total();

     $items=array_merge($videos->items(),$videotag->items(),$videocat->items());
     $itemscollections=collect($items)->unique();
     $currentpage=\Illuminate\Pagination\LengthAwarePaginator::resolvecurrentpage();
     $count=count($itemscollections);
     $pag=new  \Illuminate\Pagination\LengthAwarePaginator($itemscollections, $total,$count, $currentpage);
     return view('welcome',compact('pag'));
    /* dd($itemscollections);
     dd($items);
     dd($total);
       dd($videos,$videotag, $videocat);*/
   }
}
