<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PerpusController extends Controller
{
    //digunakan untuk menuju halaman login 
    public function formLogin(){
        return view('formLogin');
    }

    public function aksiLogin(Request $req){
        $username = $req->user_name;
        $password = $req->password;
        $attempt = Auth::attempt(['username' => $username, 'password' => $password]);

        if(!$attempt){
            session()->flash('error', 'Username atau Password Salah');
            return redirect('/');
        }else{
            return redirect('/dashboardAdmin');
        }
    }
    
    //halaman registrasi
    public function formRegistrasi(){
        return view('formRegistrasi');
    }

    public function aksiRegistrasi(Request $req){
        $namaDepan = $req->nama_depan;
        $namaBelakang = $req->nama_belakang;
        $nama_lengkap = $namaDepan." ".$namaBelakang;
        User::create([
            'username' => $req->username,
            'password' => Hash::make($req->password),
            'role' => "Admin",
        ]);

        return redirect()->back()->with('success', 'Sukses Registrasi');
    }
    

    public function dashboardAdmin(){
        $dataAnggota = Anggota::all();
        $dataBuku = Buku::all();
        $buku = Buku::take(5)->get();
        $anggota = Anggota::take(5)->get();
        return view('dashboardAdmin', ['anggota'=>$dataAnggota, 'buku'=>$dataBuku, 'book' => $buku, 'member' => $anggota]);
    }

    public function halamanAnggota(){
        $datas = Anggota::all();
        return view('anggota' , ['data' => $datas]);
    }

    public function aksiTambahAnggota(Request $req){
        $validated = $req->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        if ($req->hasFile('foto')) {
            $nama_file = time() . '.' . $req->foto->extension();
            $req->foto->move(public_path('assets/img'), $nama_file);
        } else {
            $nama_file = null;
        }
        Anggota::create([
            'nama_lengkap' => $req->nama_lengkap,
            'alamat' => $req->alamat,
            'no_telp' => $req->no_telp,
            'email' => $req->email,
            'tgl_lahir' => $req->tgl_lahir,
            'tgl_bergabung' => $req->tgl_gabung,
            'status_anggota' => $req->status_anggota,
            'foto' => $nama_file
        ]);

        return redirect()->back()->with('success', 'Berhasil Tambah Anggota!!');
    }

    public function aksiUbahAnggota(Request $req, $id){
        if ($req->hasFile('foto')) {
            $nama_file = time() . '.' . $req->foto->extension();
            $req->foto->move(public_path('assets/img'), $nama_file);
        } else {
            $nama_file = null;
        }
       Anggota::find($id)->update([
            'nama_lengkap' => $req->nama_lengkap,
            'alamat' => $req->alamat,
            'no_telp' => $req->no_telp,
            'email' => $req->email,
            'tgl_lahir' => $req->tgl_lahir,
            'tgl_bergabung' => $req->tgl_gabung,
            'status_anggota' => $req->status_anggota,
            'foto' => $nama_file
           
       ]);
       return redirect()->back()->with('success', 'Berhasil Ubah Data Anggota!!');
    }
    
    public function aksiHapusAnggota($id){
        Anggota::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Anggota!!');
    }

    public function halamanBuku(){
        $datas = Buku::all();
        return view('buku' , ['data' => $datas]);
    }
    
    public function aksiTambahBuku(Request $req){
        $validated = $req->validate([
            'foto' => 'required|mimes:doc,docx,xlsx,pdf,jpg,jpeg,png|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        if ($req->hasFile('foto')) {
            $nama_file = time() . '.' . $req->foto->extension();
            $req->foto->move(public_path('assets/img'), $nama_file);
        } else {
            $nama_file = null;
        }
        Buku::create([
            'judul_buku' => $req->judul_buku,
            'penulis' => $req->penulis,
            'penerbit'=>$req->penerbit,
            'th_terbit' => $req->th_terbit,
            'genre' => $req->genre,
            'deskripsi' => $req->deskripsi,
            'sampul' => $nama_file,
            'status' => $req->status,
        ]);

        return redirect()->back()->with('success', 'Berhasil Tambah Buku!!');
    }
    
    public function aksiUbahBuku(Request $req,$id){
        $validated = $req->validate([
            'foto' => 'required|mimes:doc,docx,xlsx,pdf,jpg,jpeg,png|max:2048',
        ]);
        
        Buku::find($id)->update([
            'judul_buku' => $req->judul_buku,
            'penulis' => $req->penulis,
            'penerbit'=>$req->penerbit,
            'th_terbit' => $req->th_terbit,
            'genre' => $req->genre,
            'deskripsi' => $req->deskripsi,
            'status' => $req->status,
        ]);

        if($req->hasFile('foto')){
            $file = $req->file('foto');
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'assets/img';
            $file->move($tujuan_upload,$file->getClientOriginalName());
            Buku::find($id)->update([
                'sampul'=>$nama_file,
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil Ubah Buku!!');
    }

    public function aksiHapusBuku($id){
        Buku::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Buku!!');
    }

    

    public function halamanPeminjaman(){
        $data = Peminjaman::all();
        $anggota = Anggota::all();
        $buku = Buku::all();
        return view('peminjaman', ['data' => $data, 'anggota' => $anggota, 'buku' => $buku]);
    }

    public function aksiTambahPeminjaman(Request $req){
        $data = Peminjaman::create([
           'id_anggota' => $req->id_anggota,
           'id_buku' => $req->id_buku,
           'tgl_pinjam' => $req->tgl_pinjam,
           'tgl_jatuh_tempo' => $req->tgl_jatuh_tempo,
           'tgl_kembali' => "Belum Dikembalikan"
        ]);

        $buku = Buku::find($data->id_buku);
        if($data->tgl_kembali == "Belum Dikembalikan"){
            $buku->update([
                'status' => "Dipinjam"
            ]);
        }

        return redirect()->back()->with('success', 'Data Peminjaman Berhasil Ditambah');;
    }

    public function aksiUbahPeminjaman(Request $req, $id){
        Peminjaman::find($id)->update([
           'id_anggota' => $req->id_anggota,
           'id_buku' => $req->id_buku,
           'tgl_pinjam' => $req->tgl_pinjam,
           'tgl_jatuh_tempo' => $req->tgl_jatuh_tempo,
           'tgl_kembali' => $req->tgl_kembali,
        ]);
        return redirect()->back()->with('success', 'Data Peminjaman Berhasil Diubah');;
    }

    public function laporanBuku(){
        $dataBuku = Buku::all();
        return view('laporanBuku', ['data' => $dataBuku]);
    }

    public function eksportPdf(){
        $laporan = Buku::all();
        $pdf = PDF::loadview('laporanPdf',['data'=>$laporan]);
        return $pdf->stream('laporanPdf.pdf');
    }

    public function exportExcel()
    {
        // Ambil data dari database
        $books = Buku::all();

        // Buat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Set properties dokumen
        $spreadsheet->getProperties()
            ->setCreator("Your Name")
            ->setTitle("Daftar Buku")
            ->setDescription("Daftar Buku dari Database");

        // Tambahkan data ke dalam lembar kerja aktif
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Judul Buku');
        $sheet->setCellValue('C1', 'Penulis');
        $sheet->setCellValue('D1', 'Penerbit');
        $sheet->setCellValue('E1', 'Tahun Terbit');
        $sheet->setCellValue('F1', 'Status');

        // Isi data dari database
        $row = 2;
        foreach ($books as $book) {
            $sheet->setCellValue('A' . $row, $book->id);
            $sheet->setCellValue('B' . $row, $book->judul_buku);
            $sheet->setCellValue('C' . $row, $book->penulis);
            $sheet->setCellValue('D' . $row, $book->penerbit);
            $sheet->setCellValue('E' . $row, $book->th_terbit);
            $sheet->setCellValue('F' . $row, $book->status);
            $row++;
        }

        // Simpan dalam format Excel 2007 (Xlsx)
        $filename = 'daftar_buku.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        // Set header untuk mengirim file Excel sebagai respons
        return response()->download($filename, $filename)->deleteFileAfterSend(true);
    }

    public function getBookInfo()
    {
        $client = new Client();
        $response = $client->get("https://openlibrary.org/subjects/science_fiction.json?limit=10");

        $books = json_decode($response->getBody());

        return view('bukuAPI', ['books' => $books]);
    }

    public function showQRCode($id)
    {
        // Ambil data buku berdasarkan ID
        $book = Buku::findOrFail($id);

        // Generate QR code dengan informasi buku
        $qrCode = QrCode::size(300)->generate($book->judul_buku . ' - ' . $book->penulis);

        // Tampilkan QR code di view
        return view('qrCode', ['qrCode' => $qrCode, 'book' => $book]);
    }
    
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}