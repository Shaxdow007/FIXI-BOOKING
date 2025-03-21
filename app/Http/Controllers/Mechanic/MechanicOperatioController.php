<?php

namespace App\Http\Controllers\Mechanic;

use App\Http\Controllers\Controller;
use App\Models\garage;
use App\Models\nom_categorie;
use App\Models\nom_operation;
use App\Models\nom_sous_operation;
use App\Models\Operation;
use App\Models\SousOperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MechanicOperatioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        // Get the search query
        $search = $request->input('search');
        // Fetch the authenticated mechanic's operations and include necessary relationships
        $operations = Operation::whereHas('garage', function ($query) use ($user) {
            $query->where('id', $user->garage_id);
        })
            ->with('voiture')
            ->when($search, function ($query, $search) {
                // Filter by numero_immatriculation
                $query->whereHas('voiture', function ($query) use ($search) {
                    $query->where('numero_immatriculation', 'like', '%' . $search . '%');
                });
            })
            ->get();
        $ope = nom_operation::all();
        $categories = nom_categorie::all();
        return view('mechanic.operations.index', compact('operations', 'categories', 'ope', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $garages = garage::all();
        $categories = nom_categorie::all();
        return view('mechanic.operations.create', compact('garages', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $garage = Auth::user()->garage_id;
        $voiture = Session::get('voiture_id');
        $request->validate([
            'photo' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:5120'], // Allow only JPG, PNG, and PDF, max size 2MB
        ]);
        if ($request->hasFile('photo')) {
            // Source image path (temporary uploaded file)
            $sourcePath = $request->file('photo')->getRealPath();
            // Define the output path (store in public storage for access)
            $extension = strtolower($request->file('photo')->getClientOriginalExtension());
            $uniqueName = uniqid() . '_' . time() . '.' . $extension;
            $outputPath = storage_path('app/public/user/operations/' . $uniqueName);
            // Load the image based on its type
            $image = null;
            if (in_array($extension, ['jpg', 'jpeg'])) {
                $image = imagecreatefromjpeg($sourcePath);
                imagejpeg($image, $outputPath, 25); // Compress JPEG/JPG
            } elseif ($extension === 'png') {
                $image = imagecreatefrompng($sourcePath);
                imagepng($image, $outputPath, 6);
            }
            imagedestroy($image);
            $compressedImagePath = '/user/operations/' . $uniqueName;
            $request->session()->put('temp_photo_garage_operation', $compressedImagePath);
        }
        $data = $request->validate([
            'categorie' => [
                'required',
            ],
            'nom' => ['nullable'],
            'autre_operation' => ['nullable', 'string', 'max:255'],
            'description' => ['max:255'],
            'photo' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:5120'], // Allow only JPG, PNG, and PDF, max size 2MB                'date_debut' => ['required', 'date'],
            'date_operation' => ['required', 'date'],
            'kilometrage' => ['nullable', 'integer', 'min:0'],
        ]);
        // Check if "Autre" is selected and handle it
        if ($request->nom === 'autre') {
            $data['nom'] = 'Autre'; // Set 'nom' as 'Autre'
            $data['autre_operation'] = $request->autre_operation; // Store the custom operation name
        } else {
            $data['autre_operation'] = null; // Clear custom name for predefined operations
        }
        // Use temp_photo_garage_operation if no new file is uploaded
        if (!$request->hasFile('photo') && $request->input('temp_photo_garage_operation')) {
            $data['photo'] = $request->input('temp_photo_garage_operation');
        } elseif ($request->hasFile('photo')) {
            $data['photo'] = $compressedImagePath;
        }
        $data['voiture_id'] = $voiture;
        $data['garage_id'] = $garage;
        $data['create_by'] = 'garage';
        $operation = Operation::create($data);
        // add sous operation 
        if ($request->filled('sousOperations')) {
            foreach ($request->input('sousOperations') as $idSous) {
                $name = nom_sous_operation::find($idSous);
                SousOperation::create(
                    [
                        'nom' => $name->id,
                        'operation_id' => $operation->id
                    ]
                );
            }
        }
        $request->session()->forget('temp_photo_garage_operation');
        // Flash message to the session
        session()->flash('success', 'Operation ajoutée');
        session()->flash('subtitle', 'Votre Operation a été ajoutée avec succès à la liste.');
        return redirect()->route('mechanic.voitures.show', $voiture);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        // Find the operation that belongs to the mechanic's garage
        $operation = Operation::whereHas('garage', function ($query) use ($user) {
            $query->where('id', $user->garage_id);
        })
            ->with(['voiture', 'garage'])
            ->find($id);
        if ($operation) {
            $ope = nom_operation::all();
            $categories = nom_categorie::all();
            $sousOperation = nom_sous_operation::all();
            return view('mechanic.operations.show', compact('operation', 'categories', 'ope', 'sousOperation'));
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return back();
    }
}