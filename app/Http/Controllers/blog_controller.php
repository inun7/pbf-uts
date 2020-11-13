<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class blog_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
      $data = json_decode(Storage::get('public/articles.json'));
      return view('my_blog', [
        'data' => ($data)
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('create_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = Storage::get('public/articles.json');

      //mengubah array menjadi string
      $decode = json_decode($data, true);

      // isi form kedalam array
      array_push($decode, array(
        'title' => $request->input('title'),
        'datetime' => date('Y-m-d H:i:s'),
        'author' => $request->input('author'),
        'content' => $request->input('content')
      ));

      // ubah array menjadi string
      Storage::put('public/articles.json', json_encode($decode));
      return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = json_decode(Storage::get('public/articles.json'));

        abort_if(!isset($data[$id]), 404);

        // abort_unless(isset($data[$id]), 404);

        // if(!isset($data[$id])){
        //   abort(404);
        // }

        return view('review_blog', [
          'id' => $id,
          'articles' => $data[$id]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = json_decode(Storage::get('public/articles.json'));

      abort_if(!isset($data[$id]), 404);

      // abort_unless(isset($data[$id]), 404);

      // if(!isset($data[$id])){
      //   abort(404);
      // }

      return view('update_blog', [
        'id' => $id,
        'articles' => $data[$id]
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = json_decode(Storage::get('public/articles.json'), true);

      abort_if(!isset($data[$id]), 404);

      $data[$id] = array_replace($data[$id], $request->except(['_method', '_token']));

      Storage::put('public/articles.json', json_encode($data));

      return redirect('/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = json_decode(Storage::get('public/articles.json'), true);

        abort_if(!isset($data[$id]), 404);

        array_splice($data, $id, 1);

        Storage::put('public/articles.json', json_encode($data));

        return redirect('/blog');
    }
}
