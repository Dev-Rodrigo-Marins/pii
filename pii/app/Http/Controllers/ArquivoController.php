<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArquivoController extends Controller
{
    public function index()
    {
        $arquivos = Arquivo::where('user_id', auth()->id())
                          ->orderBy('created_at', 'desc')
                          ->paginate(2);
        
        return view('listararquivo', compact('arquivos'));
    }

    /**
     * Mostrar formulário de upload
     */
    public function create()
    {
        return view('enviararquivo');
    }

    /**
     * Processar upload de arquivo
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'arquivo' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'anexo' => 'required|file|mimes:pdf|max:10240',
        ]);

        try {
            $caminho = $request->file('anexo')->store('arquivos', 'public'); 

            Arquivo::create([
                'user_id' => auth()->id(),
                'arquivo' => $request->arquivo,
                'categoria' => $request->categoria,
                'anexo' => $caminho
            ]);

            return redirect()->route('enviararquivo')->with('success', 'Arquivo enviado com sucesso!');

        } catch (\Exception $e) {
            \Log::error('Erro no upload: ' . $e->getMessage());
            return back()->with('error', 'Erro ao enviar arquivo: ' . $e->getMessage());
        }
    }

    /**
     * Download de arquivo
     */
    public function download($id)
    {
        $arquivo = Arquivo::where('user_id', auth()->id())->findOrFail($id);

        if (!Storage::disk('public')->exists($arquivo->anexo)) {
            abort(404);
        }

        return Storage::disk('public')->download(
            $arquivo->anexo, 
            $arquivo->arquivo . '.pdf'
        );
    }

    /**
     * Atualizar arquivo
     */
    public function update(Request $request, $id)
    {
        $arquivo = Arquivo::where('user_id', auth()->id())->findOrFail($id);

        $validated = $request->validate([
            'arquivo' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'anexo' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $dados = $request->only(['arquivo', 'categoria']);

        if ($request->hasFile('anexo')) {
            // Remove o arquivo antigo do disco corretamente
            if ($arquivo->anexo && Storage::disk('public')->exists($arquivo->anexo)) {
                Storage::disk('public')->delete($arquivo->anexo);
            }

            $caminho = $request->file('anexo')->store('arquivos', 'public');
            $dados['anexo'] = $caminho;
        }

        $arquivo->update($dados);

        return redirect()->route('arquivos.index')
                        ->with('success', 'Arquivo atualizado com sucesso!');
    }

    /**
     * Excluir arquivo
     */
    public function destroy($id)
    {
        $arquivo = Arquivo::where('user_id', auth()->id())->findOrFail($id);

        if ($arquivo->anexo && Storage::disk('public')->exists($arquivo->anexo)) {
            Storage::disk('public')->delete($arquivo->anexo);
        }

        $arquivo->delete();

        return redirect()->route('listararquivo')
                        ->with('success', 'Arquivo excluído com sucesso!');
    }

    /**
     * Mostrar formulário de edição
     */
    public function edit($id)
    {
        $arquivo = Arquivo::where('user_id', auth()->id())->findOrFail($id);
        return view('editararquivo', compact('arquivo'));
    }
}
