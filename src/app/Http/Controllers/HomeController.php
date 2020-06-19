<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Show the application dashbord
   *
   * @return Illuminate\Http\Response
   */
  public function index() {
    return view('home');
  }

  public function upload(Request $request) {
    $this->validate($request, [
      'file' => [
        'required',
        'file',
        'image',
        'mimes:jpeg,png',
      ],
      'name' => 'required|min:5|max:100',
    ]);

    if ($request->file('file')->isValid([])) {
      $path = $request->file->store('public');
      return view('home')->with('filename', basename($path));
      # code...
    }else {
      # code...
      return redirect()->back()->withInput()->withErrors();
    }
  }
}
