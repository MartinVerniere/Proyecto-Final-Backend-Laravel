<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostureExamination;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;

class PivotExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_examinacion_postura',
        'cervical_C4_C5',
        'dorsal_D8',
        'lumbar_L3',
        'raquis',
		'keypoints',
		'imagen'
    ];

	protected $casts = [
        'keypoints' => 'array',
    ];

    public function postureExamination() {
        return $this->belongsTo(PostureExamination::class, 'id_examinacion_postura');
    }

    public static function añadirExaminacionPivot($request) {
        $examination = new PivotExamination;

        $examination->id_examinacion_postura = $request->input('id_examinacion_postura');
        $examination->cervical_C4_C5 = $request->input('cervical_C4_C5');
        $examination->dorsal_D8 = $request->input('dorsal_D8');
        $examination->lumbar_L3 = $request->input('lumbar_L3');
        $examination->raquis = $request->input('raquis');
		$examination->keypoints = $request->input('keypoints');

		$imagen = $request->file('imagen');
		$extension = $imagen->getClientOriginalExtension();
		$nombre_archivo = 'examinacion_postura_'.Str::slug($request->input('id_examinacion_postura')).'_pivot.'.$extension;
		$result = $imagen->storeOnCloudinaryAs('examinaciones/postura/pivot/imagenes',$nombre_archivo);
		$examination->imagen = $result->getSecurePath();

        $examination->save();

        return $examination->id;
    }

    public static function eliminarExaminacionPivot($request) {
        $examination = $request->ExaminacionPivot;
        $examination = PivotExamination::find($id);
        $examination->delete();
    }
}
