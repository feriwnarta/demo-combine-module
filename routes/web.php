<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Menu');
});

Route::get('/store', function () {
    return view('store');
});

Route::post("/download", function (Request $request) {
    $packageName = $request->input("package");
    $moduleName = $request->input("module-name");

    // Menjalankan perintah Artisan
    $exitCode = Artisan::call("app:composer-require", [
        'package' => $packageName,
    ]);

    // Untuk mendapatkan output dari perintah
    $output = Artisan::output();

    // Tambahkan log untuk debugging
    Log ::info("Exit Code: " . $exitCode);
    Log::info("Output: " . $output);

    $projectPath = base_path();
    shell_exec("cd $projectPath && php artisan module:enable $moduleName");

    // Memeriksa exit code dan melakukan redirect jika perlu
    if ($exitCode == 0) {
        return redirect("/store")->with("success", "Sukses install module");
    } else {
        return redirect("/store")->with("failed", $output);
    }
});

