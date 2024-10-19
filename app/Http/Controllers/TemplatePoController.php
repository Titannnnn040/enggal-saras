<?php

namespace App\Http\Controllers;

use App\Models\TemplatePo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TemplatePoController extends Controller
{
    private function generateCode($model, $col, $param){
        $lastRnNumber = $model->whereDate('created_at', Carbon::today())
            ->where($col, 'like', $param . date('dmy') . '%')
            ->orderBy($col, 'desc')
            ->first();

        if ($lastRnNumber) {
            $lastNumber = intval(substr($lastRnNumber->$col, -2));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $kd = str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return $param . date('dmy') . $kd;
    }

    public function filterData($field, $model)
    {
        if (request($field)) {
            $model->where($field, 'like', '%' . request($field) . '%');
        }
    }

    public function indexDataTemplatePo()
    {
        $data = TemplatePo::latest();
        if (request('template_po_code')) {
            $this->filterData('template_po_code', $data);
        }
        if (request('template_po_name')) {
            $this->filterData('template_po_name', $data);
        }
        return view('pages.m_template_po.data-template-po', ['title' => 'data-template-po', 'data' => $data->get()]);
    }
    
    public function indexCreateTemplatePo()
    {
        return view('pages.m_template_po.create-template-po', ['title' => 'create-template-po']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'template_po_name' => ['required', 'string', 'max:255', 'unique:m_template_po,template_po_name'],
            'desc' => ['required', 'string', 'max:255'],
        ]);

        $create = TemplatePo::create([
            'template_po_code' => $this->generateCode(new TemplatePo, 'template_po_code', 'TP-'),
            'template_po_name' => strtoupper($request->template_po_name),
            'desc' => strtoupper($request->desc),
        ]);
        
        if (!$create) {
            return redirect()->route('create-template-po')->with('error', 'Data gagal ditambahkan');
        }else{
            return redirect()->route('data-template-po')->with('success', 'Data berhasil ditambahkan');
        }
    }

    public function edit($code)
    {
        $data = TemplatePo::where('template_po_code', $code)->first();
        return view('pages.m_template_po.edit-template-po', ['title' => 'template-po', 'data' => $data]);
    }

    public function update(Request $request, $code)
    {
        $validatedData = $request->validate([
            'template_po_name' => ['required', 'string', 'max:255', 'unique:m_template_po,template_po_name,' . $code . ',template_po_code'],
            'desc'             => ['required', 'string', 'max:255'],
        ]);

        $update = TemplatePo::where('template_po_code', $code)->update([
            'template_po_name' => strtoupper($request->template_po_name),
            'desc'             => strtoupper($request->desc),
            'updated_at'       => Carbon::now()
        ]);
        if (!$update) {
            return redirect()->route('edit-template-po', ['code' => $code])->with('error', 'Data gagal diubah');
        }else{
            return redirect()->route('data-template-po')->with('success', 'Data berhasil diubah');
        }
    }
    public function destroy(request $request, $code)
    {
        $delete = TemplatePo::where('template_po_code', $code)->delete();
        if (!$delete) {
            return redirect()->route('data-template-po')->with('error', 'Data gagal dihapus');
        }else{
            return redirect()->route('data-template-po')->with('success', 'Data berhasil dihapus');
        }
    }
}
