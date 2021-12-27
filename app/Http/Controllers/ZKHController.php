<?php

namespace App\Http\Controllers;

use App\Models\ZKH;
use Illuminate\Http\Request;

use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelExport;
use Illuminate\Support\Facades\Storage;

class ZKHController extends Controller
{
    /**
     * Отображает список ресурсов
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = ZKH::all();
        return view('zkh.index', compact('entries'));
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
     * Помещает созданный ресурс в хранилище, генерирует и сохраняет PDF
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
        $model = ZKH::create($request->all());
        $this->generatePdf($model->id);
        return redirect()->route('zkh.index')->with('success', 'Запись добавлена');
    }

    /**
     * Отображает указанный ресурс.
     *
     * @param  \App\Models\ZKH  $entry
     * @return \Illuminate\Http\Response
     */
    public function show($entry)
    {
        $entry = ZKH::find($entry);
        return view('zkh.show', compact('entry'));
    }

    /**
     * Выводит форму для редактирования указанного ресурса
     *
     * @param  \App\Models\ZKH  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit($entry)
    {
        $entry = ZKH::find($entry);
        return view('zkh.edit', compact('entry'));
    }

    /**
     * Обновляет указанный ресурс в хранилище, генерирует и сохраняет PDF
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ZKH  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $entryid)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'secondname' => 'required',
        ]);
        $request['statefee'] = ZKH::stateFee($request['debt']);
        $entry = ZKH::find($entryid);
        $entry->update($request->all());
        $this->generatePdf($entryid);
        return redirect()->route('zkh.index')->with('success', 'Запись обновлена');
    }

    /**
     * Удаляет указанный ресурс из хранилища, удаляет PDF
     *
     * @param  \App\Models\ZKH  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy($entryid)
    {
        $entry = ZKH::find($entryid);
        $entry->delete();
        Storage::delete($this->getEntryPath($entryid));
        return redirect()->route('zkh.index')
            ->with('success', 'Запись удалена');
    }
    /**
     * Отдает PDF на скачивание
     * @param mixed $entryid
     * 
     * @return [type]
     */
    public function pdf($entryid)
    {
        $path = $this->getEntryPath($entryid);
        if (!file_exists($path)) {
            $this->generatePdf($entryid);
        }
        return Storage::download($path);
        // return $pdf->download( 'list-'. $entry->id . '.pdf');
    }
    /**
     * Генерирует и отдает таблицу Excel на скачивание
     * @return [type]
     */
    public function excel()
    {
        $entry = ZKH::all();
        return Excel::download(new ExcelExport, 'excel.xlsx');
    }

    /**
     * Генерирует и сохраняет PDF
     * @param mixed $entryid
     * 
     * @return [type]
     */
    protected function generatePdf($entryid)
    {
        $entry = ZKH::find($entryid);
        $pdf = PDF::loadView('zkh.pdf', compact('entry'));
        $path = $this->getEntryPath($entryid);
        $content = $pdf->download()->getOriginalContent();
        Storage::put($path, $content);
    }
    /**
     * Получает путь к PDF файлу
     * @param mixed $entryid
     * 
     * @return [type]
     */
    protected function getEntryPath($entryid)
    {
        return "public/entry_" . $entryid . ".pdf";
    }
}
