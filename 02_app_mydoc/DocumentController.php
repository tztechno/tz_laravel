<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use League\CommonMark\CommonMarkConverter;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = File::files(public_path('documents'));
        Log::info("Documents found: " . json_encode($documents));
        return view('top_page', compact('documents'));
    }

    public function show($filename)
    {
        Log::info("Requested filename: " . $filename);
        $filePath = public_path("documents/{$filename}");
        Log::info("Full file path: " . $filePath);

        if (!File::exists($filePath)) {
            Log::error("File does not exist: " . $filePath);
            abort(404);
        }

        $markdown = File::get($filePath);
        Log::info("Markdown Content: " . $markdown);

        try {
            $html = $this->convertMarkdownToHtml($markdown);
            Log::info("HTML Content: " . $html);
        } catch (\Exception $e) {
            Log::error("Error converting Markdown to HTML: " . $e->getMessage());
            return response("Error processing file", 500);
        }

        return view('document', compact('html', 'filename'));
    }

    private function convertMarkdownToHtml($markdown)
    {
        $converter = new CommonMarkConverter();
        return $converter->convertToHtml($markdown);
    }
}

