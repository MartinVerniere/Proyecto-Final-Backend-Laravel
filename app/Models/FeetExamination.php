<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostureExamination;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;

class FeetExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_examinacion_postura',
        'eje_posterior',
        'eje_anterior',
        'tipologia',
        'dedos_en_garra',
		'keypoints',
		'imagen'
    ];

	protected $casts = [
        'keypoints' => 'array',
    ];

    public function postureExamination() {
        return $this->belongsTo(PostureExamination::class, 'id_examinacion_postura');
    }

    public static function añadirExaminacionPies($request) {
        $examination = new FeetExamination();

        $examination->id_examinacion_postura = $request->input('id_examinacion_postura');
        $examination->eje_posterior = $request->input('eje_posterior');
        $examination->eje_anterior = $request->input('eje_anterior');        
        $examination->tipologia = $request->input('tipologia');
        $examination->dedos_en_garra = $request->input('dedos_en_garra');
		$examination->keypoints = $request->input('keypoints');

		$imagen = $request->file('imagen');
		$extension = $imagen->getClientOriginalExtension();
		$nombre_archivo = 'examinacion_postura_'.Str::slug($request->input('id_examinacion_postura')).'_pies.'.$extension;
		$result = $imagen->storeOnCloudinaryAs('examinaciones/postura/pies/imagenes',$nombre_archivo);
		$examination->imagen = $result->getSecurePath();

        $examination->save();

        return $examination->id;
    }

    public static function quitarExaminacionPies($request) {
        $examination = $request->ExaminacionPies;
        $examinationElem = FeetExamination::find($id);
        $examinationElem->delete();
    }
}
