<?php
namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        // Ambil data barang dari database
        $menus = Barang::all();

        // Kirim data ke view
        return view('view.homepage', compact('menus'));
    }
}