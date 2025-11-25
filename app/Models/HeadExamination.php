<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostureExamination;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;

class HeadExamination extends Model
{
    use HasFactory;

    protected $fillable= [
        'id_examinacion_postura',
        'plano',
        'inclinacion',
        'mirada',
		'keypoints',
		'imagen'
    ];

	protected $casts = [
        'keypoints' => 'array',
    ];

    public function postureExamination() {
        return $this->belongsTo(PostureExamination::class, 'id_examinacion_postura');
    }

    public static function añadirExaminacionCabeza($request) {
        $examination = new HeadExamination();

        $examination->id_examinacion_postura = $request->input('id_examinacion_postura');
        $examination->plano = $request->input('plano');
        $examination->inclinacion = $request->input('inclinacion');
        $examination->mirada = $request->input('mirada');
		$examination->keypoints = $request->input('keypoints');

		$imagen = $request->file('imagen');
		$extension = $imagen->getClientOriginalExtension();
		$nombre_archivo = 'examinacion_postura_'.Str::slug($request->input('id_examinacion_postura')).'_cabeza.'.$extension;
		$result = $imagen->storeOnCloudinaryAs('examinaciones/postura/cabeza/imagenes',$nombre_archivo);
		$examination->imagen = $result->getSecurePath();

		$examination->save();

        return $examination->id;
    }
}
