<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all(); // Получаем все треки из базы данных

        return view('tracks.index', compact('tracks'));
    }

    public function create()
    {
        return view('tracks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'file' => 'required|mimes:mp3|max:20480', // Максимум 20 МБ
        ]);

        // Сохранение файла в директорию
        $path = $request->file('file')->store('music');

        // Создание новой записи в базе данных
        Track::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'file_path' => $path,
        ]);

        return redirect()->route('tracks.index')->with('success', 'Трек успешно добавлен.');
    }
}

