<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SesiSpk;
use App\Models\Kriteria;
use App\Models\BobotKriteria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuestionnairePage extends Component
{
    public $value1 = 3;
    public $value2 = 3;
    public $value3 = 3;
    public $value4 = 3;
    public $value5 = 3;
    public $value6 = 3;

    public function submit()
    {
        \DB::beginTransaction();
        try {
            $session = SesiSpk::create([
                'id_user' => Auth::id(),
            ]);
            $kriterias = Kriteria::orderBy('urutan')->get();

            $values = [
                $this->value1,
                $this->value2,
                $this->value3,
                $this->value4,
                $this->value5,
                $this->value6,
            ];

            foreach ($kriterias as $i => $kriteria) {
                BobotKriteria::create([
                    'id_sesi' => $session->id,
                    'id_kriteria' => $kriteria->id,
                    'nilai_bobot' => $values[$i] / 5,
                ]);
            }

            \DB::commit();
            session()->put('weights', [
                $this->value1 / 5,
                $this->value2 / 5,
                $this->value3 / 5,
                $this->value4 / 5,
                $this->value5 / 5,
                $this->value6 / 5,
            ]);
            Log::info('Redirecting to result');
            return redirect()->route('spk.result')->with('spk-session', $session->id);
        } catch (\Exception $e) {
            \DB::rollBack();
            Log::error('Error in submit(): ' . $e->getMessage());   
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.questionnaire')->layout('components.layouts.dss');
    }
}
