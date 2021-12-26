<?php

namespace App\Http\Controllers;

use App\Models\ZKH;
use Illuminate\Http\Request;

use PDF;


class ZKHController extends Controller
{
    /**
     * Отображает список ресурсов
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = ZKH::all();

        return view('zkh.index', compact('posts'));
    }

    /**
     * Выводит форму для создания нового ресурса
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zkh.create');
    }

    /**
     * Помещает созданный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'secondname' => 'required',
        ]);

        $request['statefee'] = ZKH::stateFee($request['debt']);

        ZKH::create($request->all());

        return redirect()->route('zkh.index')->with('success', 'Запись добавлена');
    }

    /**
     * Отображает указанный ресурс.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $post = ZKH::find($post);
        return view('zkh.show', compact('post'));
    }

    /**
     * Выводит форму для редактирования указанного ресурса
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        $post = ZKH::find($post);
        return view('zkh.edit', compact('post'));
    }

    /**
     * Обновляет указанный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'secondname' => 'required',
        ]);
        $request['statefee'] = ZKH::stateFee($request['debt']);
        $post = ZKH::find($post);
        $post->update($request->all());

        return redirect()->route('zkh.index')->with('success', 'Запись обновлена');
    }

    /**
     * Удаляет указанный ресурс из хранилища
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $post = ZKH::find($post);
        $post->delete();

        return redirect()->route('zkh.index')
            ->with('success', 'Запись удалена');
    }
    public function pdf($post)
    {
        $post = ZKH::find($post);

        $pdf = PDF::loadView('zkh.pdf',  compact('post'));



        return $pdf->download( 'list-'. $post->id . '.pdf');
    }
}
