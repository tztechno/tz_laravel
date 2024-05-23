<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = Storage::disk('local')->allFiles('doc');
        return view('files.index', compact('files'));
    }

    public function showFile($filename)
    {
        $filePath = 'doc/' . $filename;
        $content = Storage::disk('local')->get($filePath);

        if (pathinfo($filePath, PATHINFO_EXTENSION) === 'md') {
            $content = app('markdown')->convertToHtml($content);
        } else {
            $content = '<pre>' . e($content) . '</pre>';
        }

        return view('files.show', compact('filename', 'content'));
    }
}