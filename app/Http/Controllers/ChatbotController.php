<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function index()
    {
        $menu = config('chatbot.menu');
        return view('chatbot', compact('menu'));
    }

    public function getStep($key)
    {
        $flow = config('chatbot.flow');
        $menu = config('chatbot.menu');

        // Kunci spesial: kembali ke menu utama
        if ($key === '__menu__') {
            return response()->json([
                'message' => 'Oke, topik apa lagi yang ingin kamu tanyakan?',
                'options' => array_map(fn($item) => [
                    'label' => $item['label'],
                    'next'  => $item['key'],
                ], $menu),
                'is_menu' => true,
            ]);
        }

        if (!isset($flow[$key])) {
            return response()->json([
                'message' => 'Maaf, aku tidak mengerti pertanyaan itu 😅',
                'options' => [],
            ]);
        }

        return response()->json($flow[$key]);
    }
}