<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Board $board)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Board $board)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        //
    }
    public function checkAnswer(Request $request)
    {
        // Ambil nama board dari input
        $boardName = $request->input('name');

        // Cari board berdasarkan nama
        $board = Board::where('name', $boardName)->first();

        if (!$board) {
            return redirect()->back()->with('error', 'Board tidak ditemukan');
        }

        // Cek jawaban untuk board yang dipilih
        if ($board->answer == $request->input('answer')) {
            // Cek jika jawaban sudah pernah digunakan di board lain
            $existingAnswer = Board::where('answer', $request->input('answer'))
                ->where('name', '!=', $boardName)
                ->first();

            if ($existingAnswer) {
                return redirect()->back()->with('error', 'Jawaban sudah digunakan di board lain');
            }

            return redirect()->back()->with('success', 'Jawaban Anda benar, silahkan ke sesi selanjutnya');
        } else {
            return redirect()->back()->with('error', 'Jawaban Anda salah, kembali ke tempat duduk');
        }
    }
}
