<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {
      $data = Link::all();
      return view('Dashboard.index')
        ->with('data',$data);
    }
    public function create()
    {
      return view('dashboard.create')->with([
        'url'=> new Link(),
        'button' => 'New',
      ]);
    }
    public function store(LinkRequest $request)
    {
     
      $url = $this->getRandomUrl();
      $exist = Link::find($url);
      while($exist){
        $url = $this->getRandomUrl();
        $exist = Link::find($url);
      }
      $request->merge([
        'id' => $url,
        'clicks_no'=> 0,
      ]);
      link::create($request->except('_token'));
    
      return redirect()->route('dashboard.index');
    }

    public function redirection(Request $request,$url)
    {
        // using incrementing function 

      $link = Link::findOrFail($url);
      $data['clicks_no'] = $link->clicks_no;
      $data['clicks_no']++;
      
      $link->update($data); 
      
      return redirect($link->original_url);
    }

    public function edit($link)
    {
      $url = Link::findOrFail($link);

      return view("dashboard.edit")
                  ->with('url',$url)
                  ->with('button','update');
    }
    
    public function update(LinkRequest $request,$url)
    {
      $link = Link::findOrFail($url);
      $data = $request->all();

      if($link->original_url != $data['original_url']){
        $data['clicks_no'] = 0;
      }

      $link->update($data);
      return redirect()->route('dashboard.index');
    }

    public function destroy($link)
    {
       Link::where('id', '=', $link)->delete();
      
      return redirect()->route('dashboard.index');
    }

    private function getRandomUrl()
    {
      return Str::random(rand(4, 10));  
    }
    
}
