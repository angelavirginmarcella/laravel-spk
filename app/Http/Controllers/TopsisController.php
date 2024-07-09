<?php

namespace App\Http\Controllers;

use App\Models\DataAlternatif;
use Illuminate\Http\Request;

class TopsisController extends Controller
{
    public function index()
    {
        $alternatifs = DataAlternatif::all();

        // Bobot setiap kriteria
        $weights = [
            'C1' => 5,
            'C2' => 3,
            'C3' => 3,
            'C4' => 2,
            'C5' => 2,
        ];

        // Hitung normalisasi
        $normalized = [];
        foreach (['C1', 'C2', 'C3', 'C4', 'C5'] as $criteria) {
            $sum = sqrt($alternatifs->sum(function($item) use ($criteria) {
                return pow($item[$criteria], 2);
            }));

            foreach ($alternatifs as $alt) {
                $normalized[$alt->id][$criteria] = $alt[$criteria] / $sum;
            }
        }

        // Hitung normalisasi terbobot
        $weightedNormalized = [];
        foreach ($normalized as $id => $values) {
            foreach ($values as $criteria => $value) {
                $weightedNormalized[$id][$criteria] = $value * $weights[$criteria];
            }
        }

        // Menentukan solusi ideal positif (A+) dan negatif (A-)
        $idealPositive = [];
        $idealNegative = [];

        foreach (['C1', 'C2', 'C3', 'C4', 'C5'] as $criteria) {
            if (in_array($criteria, ['C4', 'C5'])) { // C4 dan C5 adalah cost
                $idealPositive[$criteria] = min(array_column($weightedNormalized, $criteria));
                $idealNegative[$criteria] = max(array_column($weightedNormalized, $criteria));
            } else { // C1, C2, C3 adalah benefit
                $idealPositive[$criteria] = max(array_column($weightedNormalized, $criteria));
                $idealNegative[$criteria] = min(array_column($weightedNormalized, $criteria));
            }
        }

        // Menghitung jarak solusi ideal positif (D+) dan negatif (D-)
        $separationMeasures = [];
        foreach ($weightedNormalized as $id => $values) {
            $dPositive = 0;
            $dNegative = 0;
            foreach (['C1', 'C2', 'C3', 'C4', 'C5'] as $criteria) {
                $dPositive += pow($values[$criteria] - $idealPositive[$criteria], 2);
                $dNegative += pow($values[$criteria] - $idealNegative[$criteria], 2);
            }
            $separationMeasures[$id]['dPositive'] = sqrt($dPositive);
            $separationMeasures[$id]['dNegative'] = sqrt($dNegative);
        }

        // Menghitung nilai preferensi (V)
        $preferenceValues = [];
        foreach ($separationMeasures as $id => $measures) {
            $v = $measures['dNegative'] / ($measures['dPositive'] + $measures['dNegative']);
            $preferenceValues[$id] = $v;
        }

        // Menyusun hasil peringkat berdasarkan nilai V
        arsort($preferenceValues);
        $rankedResults = [];
        $rank = 1;
        foreach ($preferenceValues as $id => $v) {
            $rankedResults[$id] = [
                'rank' => $rank,
                'nama' => $alternatifs->find($id)->nama,
                'preferenceValue' => $v,
                'dPositive' => $separationMeasures[$id]['dPositive'],
                'dNegative' => $separationMeasures[$id]['dNegative'],
            ];
            $rank++;
        }

        // Mengirim data ke view index
        return view('topsis.index', compact('alternatifs', 'normalized', 'weightedNormalized', 'idealPositive', 'idealNegative', 'separationMeasures', 'rankedResults'));
    }
}
