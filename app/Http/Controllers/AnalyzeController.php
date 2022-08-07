<?php

namespace App\Http\Controllers;

use App\Models\Analyze;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Http;

class AnalyzeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) return view('auth.login');
        // if (!Auth::user()->is_moderator) abort(403, "Access denied");
        return view('analyzes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function store(Request $request)
    {
        if (!Auth::check()) abort(401, "Authentication required");

        $data = $request->validate([
            'patient_id' => 'required|integer',
            'photo' => 'required|image'
        ]);

        $local_file = "";
        if (($file = $request->File("photo")) != null) {
            $local_file = $file->store('public/input_images');
            $data["source_photo"] = Storage::url($local_file);
        }

        $data["user_id"] = Auth::id();

        $response = Http::get('http://127.0.0.1:8088/get', [
            'file_path' => Storage::path($local_file)
        ]);
        if ($response->failed()) {
            throw new Exception($response);
        }

        $imageName = Str::random(26).'.'.'jpg';
        Storage::disk('public')->put($imageName, base64_decode($response["predict_photo"]));
        $data["predict_photo"] = Storage::url($imageName);
        $data["caries_count"] = $response["caries_count"];
        $data["count"] = $response["teeth_count"];

        $analyze = Analyze::create($data);

        $to  = $analyze->patient->parent_email;
        $subject = "SmartTeeth. Анализ полости рта";

        $message = '<p>Уважаемый(ая) ' . $analyze->patient->parent_name . '!</p> <p>Ваш ребенок ' . $analyze->patient->name . ' прошёл(ла) автоматизированную диагностику полости рта. Нейронная сеть показала следующий результат:</p>';
        $message .= '<ul><li>Количество распознанных зубов: ' . $analyze->count . '</li><li>Количество зубов, на которых обнаружен кариес: ' . $analyze->caries_count . '</li></ul>';
        $message .= '<p>Подробности вы можете узнать у лечащего врача: ' . $analyze->user->name . '.</p>';

        $headers  = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: SmartTeeth <smartteeth@nizamovtimur.ru>\r\n";
        $headers .= "Reply-To: smartteeth@nizamovtimur.ru\r\n";
        try {
            mail($to, $subject, $message, $headers);
        }
        catch (Exception $e) {

        }

        return redirect()->route('analyzes.show', ['analyze' => $analyze]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Analyze  $analyze
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Analyze $analyze)
    {
        if (!Auth::check()) abort(401, "Authentication required.");
        if (Auth::id() != $analyze->user_id) abort(403, "Access denied");
        return view('analyzes.show', compact('analyze'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Analyze $analyze
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Analyze $analyze)
    {
        if (!Auth::check()) abort(401, "Authentication required.");
        if (Auth::id() != $analyze->user_id) abort(403, "Access denied");
        $analyze->delete();
        return redirect()->route('home')->with('success', 'Анализ успешно удалён!');
    }
}
