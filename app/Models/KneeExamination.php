<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostureExamination;

class KneeExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_examinacion_postura',
        'genu',
        'morfotipo_torsional',
        'tipologia_rotulas',
    ];

    public function postureExamination() {
        return $this->belongsTo(PostureExamination::class, 'id_examinacion_postura');
    }

    public function anadirExaminacionRodilla($request) {
        $examination = new KneeExamination();

        $examination->id_examinacion_postura = $request->input('id_examinacion_postura');
        $examination->genu = $request->input('genu');
        $examination->morfotipo_torsional = $request->input('morfotipo_torsional');
        $examination->tipologia_rotulas = $request->input('tipologia_rotulas');

        $examination->save();
    }

    public function quitarExaminacionRodilla($request) {
        $examination = $request->ExaminacionRodilla;
        $examinationElem = KneeExamination::find($id);
        $examinationElem->delete();
    }
}
