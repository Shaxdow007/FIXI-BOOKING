<?php

namespace Tests\Feature;

use App\Models\nom_categorie;
use App\Models\nom_operation;
use App\Models\Operation;
use App\Models\User;
use App\Models\Voiture;
use Tests\TestCase;

class OperationPdfExcelTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_operation_pdf_download(): void
    {
        $user = User::factory()->create(['status' => 1, 'ville' => 'marrakech']);
        // Create a voiture
        $voiture = Voiture::create([

            'marque' => 'Toyota',
            'modele' => 'Corolla',
            'numero_immatriculation' => '123-أ-45',
            'user_id' => $user->id,
        ]);

        // Create some related data for nom_categorie
        $categorie1 = nom_categorie::create(['nom_categorie' => "Services d'un garage mécanique"]);

        // Create nom_operation linked to categories
        $operation1 = nom_operation::create([
            'nom_operation' => 'Réparation de moteur',
            'nom_categorie_id' => $categorie1->id, // Link to "Services d'un Garage Mécanique"
        ]);

        // Create an operation linked to the voiture
        $operation = Operation::create([
            'categorie' => $categorie1->id,
            'nom' => $operation1,
            'description' => 'This is a test operation',
            'date_operation' => '2023-11-01',
            'photo' => null,
            'voiture_id' => $voiture->id,
            'garage_id' => null,
        ]);
        $response = $this->actingAs($user)->get(route('operations.pdf'));
        $response->assertStatus(200);
        file_put_contents('test_output.pdf', $response->getContent());
        // the pdf file you ll find beside tailwind.config and .env .....
    }
    public function test_operation_excel_download(): void
    {
        $user = User::factory()->create(['status' => 1, 'ville' => 'marrakech']);
        // Create a voiture
        $voiture = Voiture::create([

            'marque' => 'Toyota',
            'modele' => 'Corolla',
            'numero_immatriculation' => '123-أ-45',
            'user_id' => $user->id,
        ]);

        // Create some related data for nom_categorie
        $categorie1 = nom_categorie::create(['nom_categorie' => "Services d'un garage mécanique"]);

        // Create nom_operation linked to categories
        $operation1 = nom_operation::create([
            'nom_operation' => 'Réparation de moteur',
            'nom_categorie_id' => $categorie1->id, // Link to "Services d'un Garage Mécanique"
        ]);

        // Create an operation linked to the voiture
        $operation = Operation::create([
            'categorie' => $categorie1->id,
            'nom' => $operation1,
            'description' => 'This is a test operation',
            'date_operation' => '2023-11-01',
            'photo' => null,
            'voiture_id' => $voiture->id,
            'garage_id' => null,
        ]);
        $response = $this->actingAs($user)->get(route('operations.export'));
        $response->assertStatus(200);
        file_put_contents('test_output.xlsx', $response->getContent());
        // the pdf file you ll find beside tailwind.config and .env .....
    }
}
