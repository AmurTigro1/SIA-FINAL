<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class PortfolioController extends Controller
{
    public function index() {
        $portfolio = Portfolio::orderBy('id')->get();

        return inertia('Portfolio', ['portfolio' => $portfolio]);


    }

    public function create()
    {
        return inertia("Create");
    }


    public function store(Request $request)
    {
        $request->validate([
            'imageUrl' => 'required',
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'rating' => 'required',

        ]);

        Portfolio::create($request->all());

        return redirect('/portfolio');
    }

    public function show() {
        $portfolio = portfolio::orderBy('name')->get();

       

        $pdf = PDF::loadView('pdf', compact('portfolio'));


        return $pdf->download('portfolio.pdf');
    }


    public function pdf() {
        $portfolio = Portfolio::orderBy('id')->get();

        $pdf = Pdf::loadView('pdf', compact('portfolio'));

        return $pdf->download('portfolio.pdf');
    }

    public function generateCSV() {
        $portfolio = Portfolio::orderBy('id')->get();

        $filename = '../storage/manhwa.csv';

        $file = fopen($filename, 'w+');

        foreach($portfolio as $data) {
            fputcsv($file, [
                $data->id,
                $data->name,
                $data->description,
                $data->status,
                $data->ratings
            ]);
        }
        fclose($file);

        return response()->download($filename);
    }

}
