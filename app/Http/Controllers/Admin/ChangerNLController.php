<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ChangerNLController extends Controller
{


	public function index()
	{

		return view('admin.config.ChangerNL');
	}

	public function changerNom(Request $request)
	{
		$NouveauN = $request->get('NouveauN');
		$AncienN = $request->get('AncienN');
		$path_to_file = '../.env';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace("APP_NAME=\"$AncienN\"", "APP_NAME=\"$NouveauN\"", $file_contents);
		file_put_contents($path_to_file, $file_contents);
		return back();
	}



	public function changerLogo(Request $request)
	{
		$this->validate($request, ['logo' => 'required|image|mimes:jpeg,jpg,png']);
		if (file_exists(public_path("img\logo.png"))) {
			rename(public_path("img\logo.png"), public_path("img\\" . rand() . ".png"));
		}
		if (file_exists(public_path("img\logo.jpg"))) {
			rename(public_path("img\logo.jpg"), public_path("img\\" . rand() . ".jpg"));
		}
		if (file_exists(public_path("img\logo.jpeg"))) {
			rename(public_path("img\logo.jpeg"), public_path("img\\" . rand() . ".jpeg"));
		}

		$image = $request->file('logo');
		$new_name = 'logo.' . $image->getClientOriginalExtension();
		$image->move(public_path("img"), $new_name);

		$path_to_file = '../resources/views/layouts/base.blade.php';
		$path_to_file2 = '../resources/views/layouts/baseAgent.blade.php';
		$file_contents = file_get_contents($path_to_file);
		$file_contents = str_replace(array("logo.png", "logo.gif", "logo.jpg", "logo.jpeg"), "logo." . $image->getClientOriginalExtension(), $file_contents);
		file_put_contents($path_to_file, $file_contents);

		return back();
	}
}
