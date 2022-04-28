<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiResponse;
use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    use ApiResponse;

    public function index()
    {
        try {
            $produto = Produtos::all();
        } catch (Exception $exception) {
            return $this->error(
                "An Error has ocurred",
                $exception->getCode(),
                [
                    'exception_type' => gettype($exception),
                    'exception_message' => $exception->getMessage(),
                    'exception_trace' => $exception->getTraceAsString(),
                ]
            );
        }
        return $this->success([
            'produtos' => $produto
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'min:5', 'max:254'],
            'descricao' => ['string', 'max:254'],
            'marca_id' => ['required', 'marca_id', 'exists:marcas,id']
        ]);

        try {
            $produto = Produtos::create(['nome' => $request->nome]);
        } catch (Exception $exception) {
            return $this->error(
                "An Error has ocurred",
                $exception->getCode(),
                [
                    'exception_type' => gettype($exception),
                    'exception_message' => $exception->getMessage(),
                    'exception_trace' => $exception->getTraceAsString(),
                ]
            );
        }
        return $this->success([
            'produto' => $produto
        ]);

    }


    public function show(Request $request)
    {
        $request->validate([
            'uuid' => ['required', 'uuid', 'exists:produtos,uuid'],
        ]);

        try {
            $produto = Produtos::where('uuid', $request->uuid)->firstOrFail();
        } catch (Exception $exception) {
            return $this->error(
                "An Error has ocurred",
                $exception->getCode(),
                [
                    'exception_type' => gettype($exception),
                    'exception_message' => $exception->getMessage(),
                    'exception_trace' => $exception->getTraceAsString(),
                ]
            );
        }
        return $this->success([
            'produto' => $produto
        ]);
    }


    public function update(Request $request)
    {

        $request->validate([
            'uuid' => ['required', 'uuid', 'exists:produtos,uuid'],
            'nome' => ['required', 'string', 'min:5', 'max:254']
        ]);

        try {
            $produto = Produtos::where('uuid', $request->uuid)->firstOrFail();
            if ($produto) {
                $produto->nome = $request->nome;
                $produto->save();
            }
        } catch (Exception $exception) {
            return $this->error(
                "An Error has ocurred",
                $exception->getCode(),
                [
                    'exception_type' => gettype($exception),
                    'exception_message' => $exception->getMessage(),
                    'exception_trace' => $exception->getTraceAsString(),
                ]
            );
        }
        return $this->success([
            'produto' => $produto
        ]);
    }


    public function destroy(Request $request)
    {
        $produto = Produtos::where('uuid', $request->uuid)->firstOrFail();
        if ($produto) {
            $produto->delete();
        }
        return $produto;
    }


    public function restore(string $uuid)
    {
        $collection = Produtos::withTrashed()->where('uuid', $uuid)->firstOrFail();
        $collection->restore();
        return $collection;
    }
}
