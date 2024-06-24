<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class LucasController extends Controller
{
    public function calculate(Request $request)
    {
        try {
            Log::info('Request received for Lucas calculation', ['request' => $request->all()]);

            $n = $request->input('n');

            if (!is_numeric($n) || $n < 0) {
                Log::warning('Invalid input', ['input' => $n]);
                return response()->json(['error' => 'Invalid input'], 400);
            }

            // 計算開始時間
            $start_time = microtime(true);

            // Lucas数の計算
            $result = $this->lucas($n);

            // 計算終了時間
            $end_time = microtime(true);

            // 処理時間計算
            $process_time = ($end_time - $start_time) * 1000; // msecに変換

            Log::info('Lucas calculation successful', ['result' => $result, 'process_time' => $process_time]);

            // レスポンス
            return response()->json([
                'result' => $result,
                'process_time' => $process_time
            ]);
        } catch (\Exception $e) {
            // エラーログを出力
            Log::error('Error calculating Lucas number: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    private function lucas($n)
    {
        if ($n == 0) return 2;
        if ($n == 1) return 1;
        return $this->lucas($n - 1) + $this->lucas($n - 2);
    }
}
