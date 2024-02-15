<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Pengaduan;
use App\Models\Sesi;
use App\Models\Session;
use App\Models\User;
use App\Models\userPelatihan;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use function PHPUnit\Framework\returnSelf;

class DashboardController extends Controller
{
    public function index()
    {
        $pelatihan = userPelatihan::all();
        $pesertas = userPelatihan::where('pelatihan_id')->get();

        return view('admin.index', ['pelatihan' => $pelatihan, 'pesertas' => $pesertas]);
    }



    public function pelatihanUser(Request $request)
    {
        $user = auth()->user();
        // $data = Pelatihan::all();
        $data = Pelatihan::orderBy('created_at', 'desc')->get();
        $keyword = $request->input('keyword');

        $trainings = Pelatihan::where('nama_pelatihan', 'like', '%' . $keyword . '%')
            ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
            ->get();

        // return response()->json($trainings);

        // return view('trainings.index', compact('trainings'));

        // return view('admin.pelatihanUser', compact('user', 'data'));
        return view('admin.pelatihanUser', ['user' => $user, 'data' => $data, 'trainings' => $trainings]);
    }
    public function pelatihanUserDetail()
    {
        // $pelatihan = userPelatihan::all();
        // return view('admin.pelatihanDetail' . compact('pelatihan'));
        $pelatihan = userPelatihan::all();
        return view('admin.pelatihanDetail', ['pelatihan' => $pelatihan]);
    }

    public function createpelatihanUser(Request $request, $trainingId)
    {
        $user = auth()->user();
        // dd('User:', $user, 'Trainings:', $user->trainings, 'Training ID:', $trainingId);
        // if (!$user->trainings->contains($trainingId)) {
        //     $userTraining = new userPelatihan(['pelatihan_id' => $trainingId]);
        //     $user->trainings()->save($userTraining);

        //     return redirect()->route('dashboard')->with('success', 'Anda berhasil mengikuti pelatihan.');
        // } else {
        //     return redirect()->route('dashboard')->with('failed', 'Anda sudah terdaftar pada pelatihan ini.');
        // }
        // Periksa apakah pengguna sudah mengikuti pelatihan
        if (!$user->trainings()->where('pelatihan_id', $trainingId)->exists()) {
            // Jika belum, simpan data pengikutan
            userPelatihan::create([
                'user_id'     => $user->id,
                'pelatihan_id' => $trainingId,
            ]);
            return redirect()->route('dashboard')->with('success', 'Anda berhasil mengikuti pelatihan.');
        }

        return redirect()->route('pelatihanUser')->with('failed', 'Anda sudah terdaftar pada pelatihan ini.');
        // 

        // $request->request->add(['user_id', 'pelatihan_id' => auth()->user()->id]);
        // User::create($request->all());
        // return redirect('/dashboard');
    }

    public function pelatihan()
    {
        $data_pelatihan = Pelatihan::all();
        return view('admin.pelatihan', ['data_pelatihan' => $data_pelatihan]);
    }

    public function pelatihanDashboard($id)
    {
        $data_pelatihan = Pelatihan::all();
        $data  = Pelatihan::with('sesiPelatihans')->findOrFail($id);
        $pesertas = $data->pesertas;
        $sesiPelatihans = $data->sesiPelatihans;
        return view('admin.pelatihanDashboard', ['data' => $data, 'pesertas' => $pesertas, 'data_pelatihan' => $data_pelatihan, 'sesiPelatihans' => $sesiPelatihans]);
    }
    public function pembatalanPelatihan($id)
    {
        $data_pelatihan = Pelatihan::all();
        $data  = Pelatihan::find($id);
        $pesertas = $data->pesertas;
        return view('admin.pembatalanPelatihan', ['data' => $data, 'pesertas' => $pesertas, 'data_pelatihan' => $data_pelatihan]);
    }


    // public function tambahPelatihan($userId, $pelatihanId)
    // {
    //     // $userId = $request->input('user_id');
    //     // $trainingId = $request->input('training_id');

    //     $user = User::find($userId);
    //     $pelatihan = Pelatihan::find($pelatihanId);

    //     if (!$user || !$pelatihan) {
    //         return response()->json(['message' => 'Pengguna atau pelatihan tidak ditemukan'], 404);
    //     }

    //     // Menambahkan pelatihan untuk pengguna
    //     $user->trainings()->attach($pelatihan->id);

    //     return response()->json(['message' => 'Pelatihan berhasil ditambahkan untuk pengguna'], 200);
    // }



    public function pelatihan_tambah()
    {
        return view('admin.tambahPelatihan');
    }



    public function pelatihan_tambah_proses(Request $request)
    {
        $request->validate(
            [
                'nama_Pelatihan' => 'required',
                'lokasi'    =>  'required',
                'tanggal_awal'    =>  'required',
                'tanggal_berakhir'    =>  'required',
                'waktu_mulai'    =>  'required',
                'waktu_berakhir'    =>  'required',
                // 'kouta'    =>  'required',
                'gambar'    =>  'required|mimes:png,jpg,jpeg|max:2048',
                'deskripsi'    =>  'required',

            ]
        );

        $gambar     = $request->file('gambar');
        $filename   = date('Y-m-d')  . $gambar->getClientOriginalName();
        $path       = 'gambar-pelatihan/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($gambar));

        $data['nama_Pelatihan']     = $request->nama_Pelatihan;
        $data['lokasi']     = $request->lokasi;
        $data['tanggal_awal']     = $request->tanggal_awal;
        $data['tanggal_berakhir']     = $request->tanggal_berakhir;
        $data['waktu_mulai']     = $request->waktu_mulai;
        $data['waktu_berakhir']     = $request->waktu_berakhir;
        $data['gambar']     = $filename;
        $data['deskripsi']     = $request->deskripsi;
        $data['link']     = $request->link;
        Pelatihan::create($data);
        return redirect()->route('pelatihan')->with('success', 'Data Pelatihan Berhasil Ditambahkan');
    }



    public function pelatihan_update($id)
    {
        $data  = Pelatihan::find($id);
        return view('admin.updatePelatihan', ['data' => $data]);
    }



    public function pelatihan_update_proses(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'nama_Pelatihan' => 'required',
        //     'lokasi'         => 'required',
        //     'deskripsi'      => 'required'
        // ]);
        // if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        $find = Pelatihan::find($id);
        $gambar =  $request->file('gambar');

        if ($gambar) {
            $filename   = date('Y-m-d')  . $gambar->getClientOriginalName();
            $path       = 'gambar-pelatihan/' . $filename;

            if ($find->gambar) {
                Storage::disk('public')->delete('gambar-pelatihan/' . $find->gambar);
            }
            Storage::disk('public')->put($path, file_get_contents($gambar));
            $data['gambar']     = $filename;
        }
        $data['nama_Pelatihan']     = $request->nama_Pelatihan;
        $data['lokasi']     = $request->lokasi;
        $data['tanggal_awal']     = $request->tanggal_awal;
        $data['tanggal_berakhir']     = $request->tanggal_berakhir;
        $data['waktu_mulai']     = $request->waktu_mulai;
        $data['waktu_berakhir']     = $request->waktu_berakhir;
        $data['kouta']     = $request->kouta;
        $data['deskripsi']     = $request->deskripsi;
        $data['link']     = $request->link;

        $find->update($data);
        return redirect('/pelatihan')->with('success', 'Data Pelatihan Berhasil Ditambahkan');

        // return view('admin.updatePelatihan');
    }

    public function pelatihanUserSesi($id)
    {
        $pelatihan = Pelatihan::with('sesiPelatihans')->findOrFail($id);
        // dd($pelatihan);
        return view('admin.sesiPelatihan', compact('pelatihan'));
    }
    public function approveAndGenerateCertificate($userId, $trainingId)
    {
        // Verifikasi izin operator atau yang memiliki hak akses untuk approve

        // Set status approve
        userPelatihan::where('user_id', $userId)
            ->where('pelatihan_id', $trainingId)
            ->update(['is_approved' => true]);

        // Generate sertifikat
        $certificatePath = $this->generateCertificate($userId, $trainingId);

        return redirect()->back()->with('success', 'Peserta diapprove dan sertifikat di-generate');
    }

    // private function generateCertificate($userId, $trainingId)
    // {
    //     // Logika untuk generate sertifikat menggunakan FPDI
    //     $pdf = new Fpdi();
    //     // ... (aturan dan isi sertifikat)

    //     // Simpan sertifikat ke storage
    //     $path = "certificates/{$userId}_{$trainingId}_certificate.pdf";
    //     $pdf->Output('F',$outputfile, storage_path("app/public/{$path}"));

    //     return $path;
    // }
    public function generateCertificate($userId, $trainingId)
    {
        // Dapatkan informasi pelatihan dan user
        $userTraining = userPelatihan::where('user_id', $userId)
            ->where('pelatihan_id', $trainingId)
            ->with(['user', 'pelatihan'])
            ->first();

        if (!$userTraining) {
            abort(404, 'Peserta pelatihan tidak ditemukan');
        }
        $userName = $userTraining->user->name;
        $trainingName = $userTraining->pelatihan->nama_Pelatihan;
        // Lokasi template sertifikat
        $templatePath = storage_path('app/public/certificate_templates/template.pdf');

        // Logika untuk generate sertifikat menggunakan FPDI
        $fpdi = new Fpdi();

        // Tambahkan halaman template ke sertifikat baru
        $templatePageCount = $fpdi->setSourceFile($templatePath);
        $templatePageId = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($templatePageId);
        $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
        $fpdi->useTemplate($templatePageId);

        // // Hitung lebar nama pengguna dan tentukan posisi tengah
        $fpdi->SetFont("courier", "I", 30);
        $userNameWidth = $fpdi->GetStringWidth($userTraining->user->name);
        $userNameX = 150 - ($userNameWidth / 2);
        $fpdi->SetXY($userNameX, 105);
        $fpdi->Cell($userNameWidth, 10, $userTraining->user->name);

        // Set font and size for training name
        $fpdi->SetFont("courier", "I", 16);

        // Set the maximum width for the training name
        $maxWidth = 160;

        // Wrap the training name to the next line if it's too long
        $fpdi->SetXY(70, 115);
        $fpdi->MultiCell($maxWidth, 10, $userTraining->pelatihan->nama_Pelatihan, 0, 'C');

        // Move the Y position to the end of the multi-cell text
        // $fpdi->SetY($fpdi->GetY() + 50);
        // ...
        $tandaTanganPath = storage_path('app/public/certificate_templates/ttd.png');
        $fpdi->Image($tandaTanganPath, 100, 143, 80);

        // Simpan sertifikat ke storage
        $path = "certificates/{$userId}_{$trainingId}_certificate.pdf";
        // $path = storage_path('app/public/certificates/1_1_certificate.fpdi');

        $fpdi->Output('F', storage_path("app/public/{$path}"));
        $userTraining->update(['certificate_path' => $path]);

        return $path;
    }

    public function coba()
    {
        $pelatihan = userPelatihan::all();
        return view('admin.coba', ['pelatihan' => $pelatihan]);
    }
    public function download()
    {
        $pelatihan = userPelatihan::all();
        return view('admin.sertifikatUser', ['pelatihan' => $pelatihan]);
    }
    public function downloadCertificate($userId, $trainingId)
    {
        $userTraining = userPelatihan::where('user_id', $userId)
            ->where('pelatihan_id', $trainingId)
            ->where('is_approved', true)
            ->first();

        if (!$userTraining) {
            abort(404, 'Sertifikat tidak ditemukan');
        }
        // $certificatePath = storage_path("app/public/certificates/{$userId}_{$trainingId}_certificate.pdf");

        // return response()->download($certificatePath, 'sertifikat.pdf');
        $certificatePath = $userTraining->certificate_path;

        return new BinaryFileResponse(storage_path("app/public/{$certificatePath}"));

        // return view('admin.sertifikatUser', ['userTraning' => $userTraining]);
    }
    public function pengaduan()
    {
        $data = Pengaduan::all();
        return view('admin.pengaduan', compact('data'));
    }
    public function pengaduanCreate(Request $request)
    {
        $request->validate(
            [
                'laporan' => 'required',
                'gambar'    =>  'required|mimes:png,jpg,jpeg|max:2048',

            ]
        );

        $user_id = Auth::id();

        $gambar     = $request->file('gambar');
        $filename   = date('Y-m-d')  . $gambar->getClientOriginalName();
        $path       = 'gambar-pengaduan/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($gambar));

        $user = Auth::user();
        $data['laporan']     = $request->laporan;
        $data['gambar']     = $filename;
        $data['user_id'] = $user_id;

        Pengaduan::create($data);

        return redirect()->route('pengaduan')->with('success', 'Data Pelatihan Berhasil Ditambahkan');
    }
    public function submitResponse(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string',
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->tanggapan = $request->tanggapan;
        $pengaduan->status = 'Selesai Diverifikasi'; // Change the status as needed
        $pengaduan->response_at = Carbon::now();
        $pengaduan->save();

        return redirect()->route('allPengaduan')->with('success', 'Tanggapan berhasil ditambahkan');
    }
    public function tanggapan($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.tanggapan', compact('pengaduan'));
    }
    public function detailPengaduan($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.detailPengaduan', compact('pengaduan'));
    }


    public function allPengaduan()
    {
        $data = Pengaduan::all();
        return view('admin.allPengaduan', compact('data'));
    }

    // public function cancelTraining($userTrainingId)
    // {
    //     $userTraining = userPelatihan::findOrFail($userTrainingId);

    //     // Verifikasi apakah pengguna yang mencoba membatalkan adalah pemilik pelatihan
    //     if ($userTraining->user_id !== auth()->user()->id) {
    //         abort(403, 'Anda tidak memiliki izin untuk membatalkan pelatihan ini.');
    //     }

    //     // Verifikasi apakah pelatihan dapat dibatalkan (mungkin ada batas waktu)
    //     // ...

    //     // Lakukan logika pembatalan pelatihan
    //     $userTraining->delete();

    //     return redirect()->back()->with('success', 'Pelatihan berhasil dibatalkan.');
    // }
    public function cancelTraining(Request $request, $trainingId)
    {
        $user = auth()->user();

        // Temukan pelatihan yang akan dibatalkan
        $userTraining = userPelatihan::where('user_id', $user->id)
            ->where('pelatihan_id', $trainingId)
            ->first();

        // Periksa apakah pengguna sudah terdaftar pada pelatihan
        if ($userTraining) {
            // Validasi alasan pembatalan
            $request->validate([
                'alasanPembatalan' => 'required|string',
            ]);

            // Simpan alasan pembatalan dan ubah status menjadi "pending"
            $userTraining->update([
                'alasanPembatalan' => $request->input('alasanPembatalan'),
                'status' => 'pending',
            ]);

            return redirect()->route('dashboard')->with('success', 'Permintaan pembatalan pelatihan telah diajukan.');
        } else {
            // Jika tidak terdaftar, berikan pesan atau redirect sesuai kebutuhan
            return redirect()->route('dashboard')->with('error', 'Anda tidak terdaftar pada pelatihan ini.');
        }
    }
    public function approveCancellation(Request $request, $userTrainingId)
    {
        $admin = auth()->user();

        // Temukan pembatalan pelatihan yang akan disetujui
        $userTraining = userPelatihan::findOrFail($userTrainingId);

        // // Periksa apakah admin yang memiliki wewenang untuk menyetujui
        // if ($admin->hasRole('operator')) {
        //     // Pastikan admin yang menyetujui adalah admin yang membuat pelatihan tersebut
        //     if ($admin->id === $userTraining->training->admin_id) {
        //         // Setujui pembatalan
        //         $userTraining->update([
        //             'status' => 'approved',
        //             'approved_by' => $admin->id,
        //         ]);

        //         return redirect()->route('dashboard')->with('success', 'Pembatalan pelatihan disetujui.');
        //     } else {
        //         return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki izin untuk menyetujui pembatalan ini.');
        //     }
        // } else {
        //     return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki izin untuk menyetujui pembatalan ini.');
        // }
        // Periksa apakah pengguna yang login memiliki peran sebagai admin
        $userTraining->delete();
        $userTraining->update([
            'status' => 'approved',
            'approved_by' => $admin->id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pembatalan pelatihan disetujui.');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        Pelatihan::where('nama_pelatihan', 'like', '%' . $keyword . '%')
            ->orWhere('deskripsi', 'like', '%' . $keyword . '%')
            ->get();

        // return view('trainings.index', compact('trainings'));
    }

    function sertifikat()
    {
        $pelatihan = userPelatihan::all();
        $pesertas = userPelatihan::where('pelatihan_id')->get();

        return view('user.sertifikat', ['pelatihan' => $pelatihan, 'pesertas' => $pesertas]);
    }
    function permintaanPembatalan()
    {
        $data = userPelatihan::all();
        return view('user.permintaanPembatalan', compact('data'));
    }
    public function viewTambahSesi($pelatihanId)
    {
        $data = Pelatihan::findOrFail($pelatihanId);
        return view('admin.tambahSesi', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'namasesi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktuMulai' => 'required|date_format:H:i',
            'waktuBerakhir' => 'required|date_format:H:i|after:waktuMulai',
            'deskripsi' => 'required|string',
            'link' => 'url|nullable', // Make sure it's a valid URL or null
            // Add validation rules for other columns as needed
        ]);

        Sesi::create([
            'pelatihan_id' => $request->input('pelatihan_id'),
            'namasesi' => $request->input('namasesi'),
            'tanggal' => $request->input('tanggal'),
            'waktuMulai' => $request->input('waktuMulai'),
            'waktuBerakhir' => $request->input('waktuBerakhir'),
            'deskripsi' => $request->input('deskripsi'),
            'link' => $request->input('link'),
            // Tambahkan kolom lain sesuai kebutuhan
        ]);

        return redirect()->route('pelatihan', $request->input('pelatihan_id'))->with('success', 'Sesi berhasil ditambahkan.');
    }
}
