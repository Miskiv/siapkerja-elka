<?php

namespace App\Http\Controllers;

use App\Enums\QuizEnum;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class QuizController extends Controller
{
    public function showQuiz()
    {
        // Tampilkan halaman quiz
        return view('apps.quiz.index');
    }

    public function submitQuiz(Request $request)
    {
        // Logika untuk memeriksa jawaban dan menghitung benar dan salah
        $correctAnswers = 0;
        $wrongAnswers = 0;

        // Pertanyaan
        $questions = [];
        for ($i = 1; $i <= 5; $i++) {
            $questions['question' . $i] = QuizEnum::MAP_VALUE['question' . $i]['question'];
        }

        // Menentukan jawaban yang benar
        $correctAnswersData = [];
        for ($i = 1; $i <= 5; $i++) {
            $correctAnswersData['question' . $i] = QuizEnum::MAP_VALUE['question' . $i]['correct_answer'];
        }

        // Menentukan jawaban yang benar
        $explanationAnswersData = [];
        for ($i = 1; $i <= 5; $i++) {
            $explanationAnswersData['question' . $i] = QuizEnum::MAP_VALUE['question' . $i]['explanation'];
        }

        // Jawaban pengguna
        $userAnswers = [];

        // Memeriksa jawaban yang dikirim oleh pengguna
        foreach ($correctAnswersData as $question => $correctAnswer) {
            $userAnswer = $request->input($question);

            // Memeriksa apakah jawaban pengguna benar atau salah
            if ($userAnswer === $correctAnswer) {
                $correctAnswers++;
            } else {
                $wrongAnswers++;
            }

            // Menyimpan jawaban pengguna
            $userAnswers[$question] = $userAnswer;
        }

        // Simpan data jawaban dalam sesi
        session([
            'correctAnswers' => $correctAnswers,
            'wrongAnswers' => $wrongAnswers,
            'correctAnswersData' => $correctAnswersData,
            'userAnswers' => $userAnswers,
            'questions' => $questions,
            'finalScore' => $correctAnswers * 20,
            'explanationAnswersData' => $explanationAnswersData,
        ]);

        // Tambahkan nilai jika sudah pernah approve sebelumnya
        $dokumen = Dokumen::where('user_id', Auth::user()->id)->where('tahun', date('Y'))->whereNull('final_score')->first();
        if($dokumen){
            $dokumen->final_score = session('finalScore');
            $dokumen->save();
        }

        Alert::success('Selamat!', 'Anda telah menyelesaikan kuis.');

        // Redirect ke halaman hasil jawaban
        return redirect()->route('quiz.result');
    }

    public function showResult()
    {
        // Ambil data jawaban dari sesi
        $correctAnswers = session('correctAnswers');
        $wrongAnswers = session('wrongAnswers');
        $correctAnswersData = session('correctAnswersData');
        $userAnswers = session('userAnswers');
        $explanationAnswersData = session('explanationAnswersData');
        $questions = session('questions');
        $finalScore = session('finalScore');

        // Tampilkan halaman hasil jawaban dengan menyertakan data jawaban
        return view('apps.quiz.result', compact('correctAnswers', 'wrongAnswers', 'correctAnswersData', 'userAnswers', 'explanationAnswersData', 'questions', 'finalScore'));
    }
}
