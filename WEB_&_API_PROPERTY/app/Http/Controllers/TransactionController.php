<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'DESC')->get();
        $response = [
            'masage' => 'List transaction by id',
            'data' => $transactions
        ];

        return response()->json($response, Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'harga' => ['required'],
        'metode_bayar' => ['required', 'cash,kredit']

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try{
            $transactions = Transaction::create($request->all());
            $response = [
                'message' => 'Transaction created',
                'data' => $transactions
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transactions = Transaction::findOrFail($id);
        $response = [
            'message' => 'detail of transaction',
            'data' => $transactions
        ];

        return response()->json($response, Response::HTTP_OK);
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
        $transactions = Transaction::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'harga' => ['required'],
            'metode_bayar' => ['required', 'in:cash,kredit']

            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(),
                Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            try{
                $transactions->update($request->all());
                $response = [
                    'message' => 'Transaction update',
                    'data' => $transactions
                ];

                return response()->json($response, Response::HTTP_OK);
            } catch (QueryException $e) {
                return response()->json([
                    'message' => "Failed" . $e->errorInfo
                ]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transactions = Transaction::findOrFail($id);

            try{
                $transactions->delete();

                $response = [
                    'message' => 'Transaction deleted'
                ];

                return response()->json($response, Response::HTTP_OK);
            } catch (QueryException $e) {
                return response()->json([
                    'message' => "Failed" . $e->errorInfo
                ]);
            }
    }
}
