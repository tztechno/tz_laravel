<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Parsedown;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = File::files(public_path('documents'));

        return view('top_page', compact('documents'));
    }

    public function show($document)
    {
        $filePath = public_path('documents/' . $document);

        if (file_exists($filePath)) {
            $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

            if ($fileExtension === 'md') {
                $parsedown = new Parsedown();
                $htmlContent = $parsedown->text(file_get_contents($filePath));
                
            } elseif (in_array($fileExtension, ['html', 'txt', 'php', 'vue'])) {
                $htmlContent = file_get_contents($filePath);
            } elseif ($fileExtension === 'csv') {
                $csvContent = array_map('str_getcsv', file($filePath));
                $htmlContent = '<table>';
                foreach ($csvContent as $row) {
                    $htmlContent .= '<tr>';
                    foreach ($row as $cell) {
                        $htmlContent .= '<td>' . htmlspecialchars($cell) . '</td>';
                    }
                    $htmlContent .= '</tr>';
                }
                $htmlContent .= '</table>';
            } else {
                abort(404); // 対応する拡張子がない場合は404エラーを返す
            }

            return view('document', compact('htmlContent'));
        } else {
            abort(404); // ファイルが存在しない場合は404エラーを返す
        }
    }
}
