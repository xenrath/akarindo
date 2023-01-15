<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ], [
            'pertanyaan.required' => 'Pertanyaan tidak boleh kosong!',
            'jawaban.required' => 'Jawaban tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Faq::create($request->all());

        return redirect('admin/faq')->with('success', 'Berhasil menambahkan FAQ');
    }

    public function edit($id)
    {
        $faq = Faq::where('id', $id)->first();
        return view('admin.faq.edit', compact('faq'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required',
            'jawaban' => 'required',
        ], [
            'pertanyaan.required' => 'Pertanyaan tidak boleh kosong!',
            'jawaban.required' => 'Jawaban tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Faq::where('id', $id)->update([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);

        return redirect('admin/faq')->with('success', 'Berhasil mengubah FAQ');
    }

    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        return redirect('admin/faq')->with('success', 'Berhasil menghapus FAQ');
    }
}
