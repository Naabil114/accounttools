<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategoriakun;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Ulasan;
use Carbon\Carbon;

use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    public function postkomentar(Request $request)
    {
        $data = new Ulasan;
        $data->id_user = Auth::user()->id;
        $data->rating = $request->rating;
        $data->komentar = $request->komentar;
        $data->status = 'tampil';

        $data->save();
        return redirect('kritik');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('cari');
        $data = Produk::where('nama_produk', 'like', '%' . $keyword . '%')
            ->orWhere('kategori', 'like', '%' . $keyword . '%')
            ->orWhere('id_produk', 'like', '%' . $keyword . '%')
            ->get();
        return view('admin.produk', compact('data'));
    }

    public function welcome()
    {
        $data    = Produk::all();
        $netflix = Produk::where('nama_produk', 'Netflix')->get();
        $youtube = Produk::where('nama_produk', 'Youtube')->get();
        // dd($netflix);
        return view('shop.welcome', [
            'data'    => $data,
            'netflix' => $netflix,
            'youtube' => $youtube,
            // dd($netflix),
        ]);
    }
    public function shop()
    {
        $data = Kategoriakun::all();
        return view('shop.shop',[
            'data' => $data,
        ]);
    }

    public function produkdetail($id_kategori)
    {
        $data = Produk::with('kategoriakun')->where(['id_kategori' => $id_kategori])->get();
        return view('shop.netflix',[
            'data' => $data,
        ]);
    }

    public function kritik()
    {

        $data = DB::table('ulasan')
            ->join('users', 'ulasan.id_user', '=', 'users.id')
            ->select('ulasan.*', 'users.*')
            ->get();
        // dd($data);
        return view('shop.kritik', [
            'data' => $data,
        ]);
    }

    

    public function beli(Request $request)
    {
        $id_produk = $request->input('id_produk');

        // dd($id_produk);
        $produk = Produk::find($id_produk);

        // $data = DB::table('transaksi')
        //     ->join('produk', 'transaksi.id_produk', '=', 'produk.id_produk')
        //     ->select('transaksi.*', 'produk.*')
        //     ->get();
        // return view('shop.beli', [
        //     'data' => $data,
        // ]);

        // dd($produk);
        return view('shop.beli', [
            'id_produk' => $id_produk,
            'produk' => $produk,
        ]);
    }

    public function beliproses(Request $request)
    {

        // $id_produk = $request->input('id_produk');
        // // dd($id_produk);
        // $db = new Transaksi;

        // $produk = Produk::find($id_produk);
        // // dd($produk);


        // if ($produk) {
        //     $produk->stok -= 1;
        //     $produk->save();

        //     $field = [
        //         'id_transaksi'  => '712' . rand(10, 999999),
        //         'id_produk'     => $id_produk,
        //         'status'        => 'unpaid',
        //         'no_hp'         => $request->no_hp,
        //         'nama_customer' => $request->nama_customer,
        //         'total' => $produk->harga
        //     ];
        //     // dd($field);
        //     $db->create($field);

        //     return redirect('trans');
        // } else {
        //     return redirect()->back()->with('error', 'Produk tidak ditemukan');
        // }

        $id_produk = $request->input('id_produk');
        $db = new Transaksi;

        $produk = Produk::find($id_produk);

        if ($produk) {
            $produk->stok -= 1;
            $produk->save();


            $total = $produk->harga;
            if ($produk->harga > 60000) {
                $total -= 2000;
            }

            $field = [
                'id_transaksi' => '712' . rand(10, 999999),
                'id_user'  => Auth::user()->id,
                'id_produk' => $id_produk,
                'status' => 'unpaid',
                // 'no_hp' => $request->no_hp,
                // 'nama_customer' => $request->nama_customer,
                'total' => $total
            ];
            // dd($field);

            $db->create($field);

            return redirect('trans');
        } else {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }
    }
    public function dtransaksi()
    {
        // $data = DB::table('transaksi')
        //     ->join('produk', 'transaksi.id_produk', '=', 'produk.id_produk')
        //     ->select('transaksi.*', 'produk.*')
        //     ->get();

        // // dd($data)
        // return view('shop.datatransaksi', [
        //     'data' => $data,
        // ]);
        $user_id = auth()->user()->id; // Mengambil ID user yang sedang login

        $data = DB::table('transaksi')
            ->join('produk', 'transaksi.id_produk', '=', 'produk.id_produk')
            ->select('transaksi.*', 'produk.*')
            ->where('transaksi.id_user', $user_id) // Menambahkan kondisi where berdasarkan id_user
            ->get();

        return view('shop.datatransaksi', [
            'data' => $data,
        ]);
    }

    public function bayar($id_transaksi)
    {
        $find_data = Transaksi::with('user')->find($id_transaksi);
        // dd($find_data->user->nama);


        // dd($find_data);
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id'        => $find_data->id_transaksi,
                'gross_amount'    => $find_data->total,
            ),
            'customer_details' => array(
                'first_name'   => 'Mr',
                'last_name'    => $find_data->user->nama,
                'phone'        => $find_data->user->tlp,
            ),
        );
        // dd($find_data);
        // dd($params);


        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);die;
        return view('shop.bayar', [
            'name'  => 'Detail Transaksi',
            'title' => 'Detail Transaksi',
            'token' => $snapToken,
            'data'  => $find_data,
        ]);
    }

    public function callback(Request $request)
    {



        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->status_code == '200') {
                $transaksi = Transaksi::where('id_transaksi', $request->order_id)->first();
                $transaksi->update([
                    'status' => 'paid'
                ]);
            }
        }
    }

    public function selesai()
    {
        $data = DB::table('transaksi')
            ->join('produk', 'transaksi.id_produk', '=', 'produk.id_produk')
            ->select('transaksi.*', 'produk.*')
            ->get();
        return view('shop.selesai', [
            'data' => $data,
        ]);
    }

    public function updateStatus(Request $request, $id_transaksi)
    {
        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->first();

        if ($transaksi) {
            $transaksi->update(['status' => 'selesai']);

            return redirect('kritik');
        } else {
            return redirect('kritik');
        }
    }

    public function updateStatusBatal(Request $request, $id_transaksi)
    {

        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->first();

        if ($transaksi) {
            if ($transaksi->status !== 'dibatalkan') {
                $transaksi->update(['status' => 'dibatalkan']);

                $detailTransaksi = Transaksi::where('id_transaksi', $transaksi->id_transaksi)->first();
                if ($detailTransaksi) {
                    $produk = Produk::find($detailTransaksi->id_produk);
                    if ($produk) {
                        $produk->stok += 1;
                        $produk->save();
                    }
                }

                return redirect()->back()->with('success', 'Status transaksi berhasil diperbarui dan stok produk telah ditambahkan.');
            } else {
                return redirect()->back()->with('info', 'Transaksi sudah dalam status dibatalkan.');
            }
        } else {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }
    }

    public function login()
    {
        return view('akses.login');
    }

    public function signup()
    {
        return view('akses.signup');
    }

    public function signupproses(Request $request)
    {
        $data = new User;
        $data->nik          = $request->nik;
        $data->nama         = $request->nama;
        $data->email        = $request->email;
        $data->password     = bcrypt($request->password);
        $data->alamat       = $request->alamat . " " . $request->alamat2;
        $data->tlp          = $request->tlp;
        $data->role         = 'pelanggan';
        $data->tgl_gabung   = Carbon::now();
        $data->is_active    = 1;

        // dd($request);die;

        if ($request->hasFile('foto') == "") {
            $filename = "default.png";
            $data->foto = $filename;
        } else {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->foto = $filename;
        }
        $data->save();
        // Alert::toast('Data berhasil disimpan', 'success');
        return redirect('/');
    }
    // * logika login
    public function loginproses(Request $request)
    {
        $credentials = $request->only('email', 'password', 'role');
        if (Auth::attempt($credentials) && Auth::user()->role == 'admin') {
            // notify()->success('Laravel Notify is awesome!');q
            Alert::success('Anda berhasil login', '');
            return redirect('dashboard')->with('login', 'Anda berhasil login');
        } elseif (Auth::attempt($credentials) && Auth::user()->role == 'pelanggan') {
            // notify()->success('Laravel Notify is awesome!');
            Alert::toast('Anda berhasil login', '');
            return redirect('welcome');
        } else {
            Alert::error('Error', 'Email / Password Anda Salah');
            return redirect('/')->with('error_message', 'Wrong email or password');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function akun()
    {
        $data = User::where('role', 'admin')->get();
        // dd($data);
        return view('admin.akun', [
            'data'  => $data,
            'title' => 'Akun',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createakun()
    {
        return view('admin.inputakun', [
            'title' => 'Input Akun',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeakun(Request $request)
    {
        $data = new User;
        $data->nik         = $request->nik;
        $data->nama        = $request->nama;
        $data->email       = $request->email;
        $data->password    = bcrypt($request->password);
        $data->alamat      = $request->alamat;
        $data->tlp         = $request->tlp;
        $data->role        = $request->role;
        $data->tgl_gabung  = Carbon::now();
        $data->is_active   = 1;

        // dd($request);die;

        if ($request->hasFile('foto') == "") {
            $filename = "default.png";
            $data->foto = $filename;
        } else {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->foto = $filename;
        }

        // dd($data);
        $data->save();
        // Alert::toast('Data berhasil disimpan', 'success');
        return redirect('akun');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editakun(string $id)
    {
        $data = User::find($id);
        return view(
            'admin.editAkun',
            [
                'data' => $data,
                'title' => 'Edit Akun'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateakun(Request $request, string $id)
    {
        $data = User::findOrFail($id);

        if ($request->file('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->foto = $filename;
        } else {
            $filename = $request->foto;
        }

        $field = [
            'nik'           => $request->nik,
            'nama'          => $request->nama,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'alamat'        => $request->alamat,
            'tlp'           => $request->tlp,
            'tgl_gabung'    => Carbon::now(),
            'role'          => $request->role,
            'is_active'     => 1,
            'foto'          => $filename
        ];
        // dd($field);

        $data::where('id', $id)->update($field);
        // Alert::toast('Data berhasil diupdate', 'success');
        return redirect('akun');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyakun( $id)
    {
        $user = user::find($id)->delete();
        return redirect('akun');
    }

    public function dashboard()
    {
        $dataProduct = produk::count();
        // dd($dataProduct);
        $data = Transaksi::with('user', 'produk')->get();
        // dd($data);
        $dataTransaksi = transaksi::count();
        // dd($dataTransaksi);

        // $kategori = Kategoriakun::get();
        // dd($kategori);

        $kategori = Produk::with('kategoriakun')
                                 ->groupBy('id_kategori')
                                 ->selectRaw('id_kategori, count(*) as total_produk')
                                 ->get();
                                // dd($produkDenganKategori);

        $youtube    = Produk::where('nama_produk', 'Youtube')->count();
        //  dd($youtube);
        $disnep     = Produk::where('nama_produk', 'Disney +')->count();
        $netflix    = produk::where('nama_produk', 'Netflix')->count();
        $primevideo = produk::where('nama_produk', 'Prime Video')->count();
        $spotify    = produk::where('nama_produk', 'Spotify')->count();
        return view('admin.dashboard', [

            'title'         => 'Dashboard',
            'dataProduct'   => $dataProduct,
            'dataTransaksi' => $dataTransaksi,
            'data'          => $data,
            'youtube'       => $youtube,
            'disnep'        => $disnep,
            'netflix'       => $netflix,
            'primevideo'    => $primevideo,
            'spotify'       => $spotify,
            'kategori'      => $kategori

        ]);
    }

    public function produk()
    {
        $data = produk::with('kategoriakun')->get();
        // dd($data->kategoriakun);


        return view('admin.produk', [
            'data' => $data,
            'title' => 'Produk',
        ]);
    }

    public function createproduk()
    {
        $kategori = Kategoriakun::all();
        return view('admin.inputproduk', [
            'title' => 'Input Produk',
            'kategori' => $kategori
        ]);
    }

    public function storeproduk(Request $request)
    {
        $data = new produk;
        $data->id_produk     = $request->id_produk;
        $data->email         = $request->email;
        $data->password      = $request->password;
        $data->nama_produk   = $request->nama_produk;
        $data->id_kategori   = $request->id_kategori;
        $data->stok          = $request->stok;
        $data->kategori      = $request->kategori;
        $data->deskripsi     = $request->deskripsi;
        $data->harga         = $request->harga;
        $data->diskon = $request->diskon;
        $data->harga_akhir = $request->harga_akhir;
        if ($request->diskon > 0) {
            $diskon_desimal = $request->diskon / 100;
            $data->harga_akhir = $data->harga * (1 - $diskon_desimal);
        } else {
            $data->harga_akhir = $data->harga;
        }
        // dd($data->harga_akhir);

        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/produk'), $filename);
            $data->foto = $filename;
        }
        Alert::success('Data Berhasil Disimpan', '');
        $data->save();
        return redirect('produk');
    }

    public function editproduk($id)
    {
        $data = Produk::where('id_produk', $id)->first();
        $k = Kategoriakun::all();
        // dd($kategoriakun);
        // dd($k);
        return view('admin.editproduk', [
            'data' => $data,
            'k' => $k,
            'title' => 'Edit Produk',
        ]);
    }

    public function updateproduk(Request $request, string $id)
    {
        $data = Produk::where('id_produk', $id)->first();

        if ($request->file('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/produk'), $filename);
            $data->foto = $filename;
        } else {
            $filename = $request->foto;
        }

        if ($request->diskon > 0) {
            $diskon_desimal = $request->diskon / 100;
            $request->harga_akhir = $request->harga * (1 - $diskon_desimal);
        } else {
            $request->harga_akhir = $request->harga;
        }

        // dd($request->harga_akhir);

        $field = [
            'id_produk'      => $request->id_produk,
            'nama_produk'    => $request->nama_produk,
            'email'          => $request->email,
            'password'       => $request->password,
            'id_kategori'       => $request->id_kategori,
            'harga'          => $request->harga,
            'stok'           => $request->stok,
            'kategori'       => $request->kategori,
            'deskripsi'      => $request->deskripsi,
            'diskon'         => $request->diskon,
            'foto'           => $filename,
            'harga_akhir'    => $request->harga_akhir,
        ];


        $data::where('id_produk', $id)->update($field);
        // Alert::toast('Data berhasil diupdate', 'success');
        return redirect('produk');
    }

    public function destroyproduk(string $id)
    {
        $produk = Produk::where('id_produk', $id)->delete();
        // dd($produk);
        return redirect('produk');
    }

    public function transaksi()
    {
        $data = Transaksi::with('produk', 'user')->get();

        // dd($data)
        return view('admin.transaksi', [
            'data' => $data,
        ]);
    }

    public function laporan()
    {
        $data = DB::table('transaksi')
            ->join('produk', 'transaksi.id_produk', '=', 'produk.id_produk')
            ->select(
                'produk.nama_produk',
                'produk.kategori',
                DB::raw('COUNT(transaksi.id_transaksi) as terjual'),
                DB::raw('SUM(transaksi.total) as total')
            )
            ->where('transaksi.status', 'paid')
            ->groupBy('produk.nama_produk', 'produk.kategori')
            ->get();

        // dd($data);

        return view('admin.laporan', [
            'data' => $data,
        ]);
    }


    public function kategori()
    {
        $data = Kategoriakun::all();
        return view('admin.kategori', [
            'data' => $data,
        ]);
    }

    public function createkategori()
    {
        return view('admin.inputkategori');
    }

    public function storekategori(Request $request)
    {
        $data = new Kategoriakun;
        
        $data->nama        = $request->nama;
        

        // dd($request);die;

        if ($request->hasFile('foto') == "") {
            $filename = "default.png";
            $data->foto = $filename;
        } else {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/kategori'), $filename);
            $data->foto = $filename;
        }

        // dd($data);
        $data->save();
        // Alert::toast('Data berhasil disimpan', 'success');
        return redirect('kategori');
    }

    public function editkategori($id_kategori)
    {
        $data = Kategoriakun::where('id_kategori', $id_kategori)->first();

        // dd($data);
        return view('admin.editkategori', [
            'data' => $data,
        ]);
    }

    public function updatekategori(Request $request, $id_kategori)
    {
        $data = Kategoriakun::where('id_kategori', $id_kategori)->first();

        if ($request->file('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/kategori'), $filename);
            $data->foto = $filename;
        } else {
            $filename = $request->foto;
        }

       

        // dd($request->harga_akhir);

        $field = [
            'nama'    => $request->nama,
            
            'foto'           => $filename,
        ];


        $data::where('id_kategori', $id_kategori)->update($field);
        // Alert::toast('Data berhasil diupdate', 'success');
        return redirect('kategori');
    }
    public function destroykategori(string $id_kategori)
    {
        $data = Kategoriakun::where('id_kategori', $id_kategori)->delete();
        // dd($produk);
        return redirect('kategori');
    }

    public function akunpelanggan() 
    {
        $data = User::where('role','pelanggan')->get();
        return view('admin.akunpelanggan',[
            'data' => $data,
        ]);

    }

    public function createakunpelanggan()
    {
        return view('admin.inputakunpelanggan', [
            'title' => 'Input Akun',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeakunpelanggan(Request $request)
    {
        $data = new User;
        $data->nik         = $request->nik;
        $data->nama        = $request->nama;
        $data->email       = $request->email;
        $data->password    = bcrypt($request->password);
        $data->alamat      = $request->alamat;
        $data->tlp         = $request->tlp;
        $data->role        = $request->role;
        $data->tgl_gabung  = Carbon::now();
        $data->is_active   = 1;

        // dd($request);die;

        if ($request->hasFile('foto') == "") {
            $filename = "default.png";
            $data->foto = $filename;
        } else {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->foto = $filename;
        }

        // dd($data);
        $data->save();
        // Alert::toast('Data berhasil disimpan', 'success');
        return redirect('akunpelanggan');
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function editakunpelanggan(string $id)
    {
        $data = User::find($id);
        return view(
            'admin.editakunpelanggan',
            [
                'data' => $data,
                'title' => 'Edit Akun'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateakunpelanggan(Request $request, string $id)
    {
        $data = User::findOrFail($id);

        if ($request->file('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user'), $filename);
            $data->foto = $filename;
        } else {
            $filename = $request->foto;
        }

        $field = [
            'nik'           => $request->nik,
            'nama'          => $request->nama,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'alamat'        => $request->alamat,
            'tlp'           => $request->tlp,
            'tgl_gabung'    => Carbon::now(),
            'role'          => $request->role,
            'is_active'     => 1,
            'foto'          => $filename
        ];
        // dd($field);

        $data::where('id', $id)->update($field);
        // Alert::toast('Data berhasil diupdate', 'success');
        return redirect('akunpelanggan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyakunpelanggan(string $id)
    {
        $user = user::find($id)->delete();
        return redirect('akunpelanggan');
    }

}
