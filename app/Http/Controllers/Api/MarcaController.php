<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    use ApiResponse;

    public function index()
    {
        try {
            $marca = Marca::all();
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
            'marcas' => $marca
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'min:5', 'max:254']
        ]);

        try {
            $marca = Marca::create(['nome' => $request->nome]);
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
            'marca' => $marca
        ]);

    }


    public function show(Request $request)
    {
        $request->validate([
            'uuid' => ['required', 'uuid', 'exists:marcas,uuid'],
        ]);

        try {
            $marca = Marca::where('uuid', $request->uuid)->firstOrFail();
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
            'marca' => $marca
        ]);
    }


    public function update(Request $request)
    {

        $request->validate([
            'uuid' => ['required', 'uuid', 'exists:marcas,uuid'],
            'nome' => ['required', 'string', 'min:5', 'max:254']
        ]);

        try {
            $marca = Marca::where('uuid', $request->uuid)->firstOrFail();
            if ($marca) {
                $marca->nome = $request->nome;
                $marca->save();
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
            'marca' => $marca
        ]);
    }


    public function destroy(Request $request)
    {

        $request->validate([
            'uuid' => ['required', 'uuid', 'exists:marcas,uuid'],
        ]);

        try {
            $marca = Marca::where('uuid', $request->uuid)->firstOrFail();
            if ($marca) {
                $marca->delete();
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
            'marca' => $marca
        ]);
    }


}




