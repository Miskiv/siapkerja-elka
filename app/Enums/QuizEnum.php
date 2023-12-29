<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class QuizEnum extends Enum
{
    const MAP_VALUE = [
        'question1' => [
            'question' => 'Apa yang di maksud Standar Perilaku (Code of Conduct)?',
            'options' => [
                'a' => 'A. Kebijakan yang terdiri dari etika usaha dan etika kerja setiap karyawan yang disusun untuk mengatur, membentuk, dan melakukan kesesuaian perilaku sehingga unsur budaya dan visi perusahaan dapat terpenuhi.',
                'b' => 'B. Kebijakan dan bentuk komitmen yang terdiri dari etika usaha dan etika kerja setiap Insan Kimia Farma yang disusun untuk mengubah, membentuk, dan melakukan kesesuaian perilaku sehingga unsur budaya dan visi perusahaan dapat terpenuh.',
                'c' => 'C. Kebijakan dan bentuk komitmen yang terdiri dari etika usaha dan etika kerja setiap Insan Kimia Farma yang disusun untuk mengatur, membentuk, dan melakukan kesesuaian perilaku sehingga unsur budaya dan visi perusahaan dapat terpenuhi.',
                'd' => 'D. Kebijakan dan bentuk komitmen yang terdiri dari etika usaha dan etika kerja setiap Insan Kimia Farma yang disusun untuk mengatur dan membentuk kesesuaian perilaku sehingga unsur budaya dan visi perusahaan dapat terpenuhi.',
            ],
            'correct_answer' => 'c',
            'explanation' => 'C. Kebijakan dan bentuk komitmen yang terdiri dari etika usaha dan etika kerja setiap Insan Kimia Farma yang disusun untuk mengatur, membentuk, dan melakukan kesesuaian perilaku sehingga unsur budaya dan visi perusahaan dapat terpenuhi.',
        ],
        'question2' => [
            'question' => 'Apa tujuan dari Pedoman Standar Perilaku (Code Of Conduct)?',
            'options' => [
                'a' => 'A. Komitmen bersama pelaksanaan visi dan misi Perusahaan.',
                'b' => 'B. Panduan perilaku dalam bekerja.',
                'c' => 'C. Pedoman untuk menghindari benturan kepentingan.',
                'd' => 'D. Semua jawaban benar.',
            ],
            'correct_answer' => 'd',
            'explanation' => 'D. Semua jawaban benar. Tujuan dari Pedoman Standar Perilaku (Code Of Conduct) adalah: a). Komitmen bersama pelaksanaan visi dan misi Perusahaan. b). Panduan perilaku dalam bekerja. c). Pedoman untuk menghindari benturan kepentingan. d). Sinergi yang harmonis antar Insan Kimia Farma Grup',
        ],
        'question3' => [
            'question' => 'Bapak Nemo adalah seorang manager operasi gudang yang rajin dan disiplin. Dalam melakukan pekerjaan Bapak Nemo selalu menerapkan prosedur Kesehatan dan keselamatan kerja untuk seluruh anggotanya. Salah satunya adalah seluruh karyawan yang memasuki gudang wajib menggunakan antara lain rompi dan helm keselematan kerja. Hal ini merupakan implementasi Standar Perilaku dalam bekerja yaitu:',
            'options' => [
                'a' => 'A. Kesehatan dan keselematan kerja.',
                'b' => 'B. Pemasaran dan layanan.',
                'c' => 'C. Pengelolaan lingkungan.',
                'd' => 'D. Perlindungan Aset Perusahaan.',
            ],
            'correct_answer' => 'a',
            'explanation' => 'A. Kesehatan dan keselematan kerja. Salah satu implementasi Standar Perilaku dalam bekerja yaitu Kesehatan Keselamatan kerja (K3) merupakan Perusahaan selalu mengutamakan K3 pegawai dalam operasional pekerjaan.',
        ],
        'question4' => [
            'question' => 'Bapak Boby seorang Manager pengadaan yang teladan dan jujur. Saat hari raya Idul Fitri Bapak Boby menerima parcel atau bingkisan berupa makanan dan minuman ringan serta ucapan hari raya Idul Fitri yang tidak menyertakan nama dan alamat pengirim. Menurut Bapak Boby hal tersebut merupakan salah satu bentuk dari pemberian gratifikasi karena terindikasi terkait jabatan Bapak Boby sebagai Manager pengadaan. Oleh sebab itu, Bapak Boby langsung berinisiatif melaporkan pemberian gratifikasi tersebut ke Unit Corporate Legal & Compliance untuk dilanjutkan pelaporan tersebut ke sistem Gratifikasi Online (GOL) KPK. Hal ini merupakan implementasi Standar Perilaku dalam bekerja yaitu:',
            'options' => [
                'a' => 'A. Etika Usaha Anti KKN.',
                'b' => 'B. Benturan Kepentingan.',
                'c' => 'C. Afiliasi Politik.',
                'd' => 'D. Perlindungan Aset Perusahaan.',
            ],
            'correct_answer' => 'a',
            'explanation' => 'A. Etika Usah Anti KKN Bapak boby dalam kasus ini, tidak melaksanakan praktik Korupsi, Kolusi, dan Nepotisme (KKN) serta penerimaan gratifikasi/suap.',
        ],
        'question5' => [
            'question' => 'Direksi dan pegawai Perseroan tidak boleh memanfaatkan jabatan untuk kepentingan pribadi atau pihak lain yang terkait. Hal ini sesuai dengan implementasi Standar Perilaku dalam bekerja yaitu:',
            'options' => [
                'a' => 'A. Etika Usaha Anti KKN.',
                'b' => 'B. Benturan Kepentingan.',
                'c' => 'C. Afiliasi Politik.',
                'd' => 'D. Perlindungan Aset Perusahaan.',
            ],
            'correct_answer' => 'b',
            'explanation' => 'B. Benturan Kepentingan.',
        ],
    ];
}
