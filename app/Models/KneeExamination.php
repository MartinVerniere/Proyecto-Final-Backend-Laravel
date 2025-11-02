<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostureExamination;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;

class KneeExamination extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_examinacion_postura',
        'genu',
        'morfotipo_torsional',
        'tipologia_rotulas',
		'keypoints',
		'imagen'
    ];

	protected $casts = [
        'keypoints' => 'array',
    ];

    public function postureExamination() {
        return $this->belongsTo(PostureExamination::class, 'id_examinacion_postura');
    }

    public static function añadirExaminacionRodilla($request) {
        $examination = new KneeExamination();

        $examination->id_examinacion_postura = $request->input('id_examinacion_postura');
        $examination->genu = $request->input('genu');
        $examination->morfotipo_torsional = $request->input('morfotipo_torsional');
        $examination->tipologia_rotulas = $request->input('tipologia_rotulas');
		$examination->keypoints = $request->input('keypoints');

		$imagen = $request->file('imagen');
		$extension = $imagen->getClientOriginalExtension();
		$nombre_archivo = 'examinacion_postura_'.Str::slug($request->input('id_examinacion_postura')).'_rodilla.'.$extension;
		$response = Cloudinary::upload(
            $imagen->getRealPath(),
            [
                'folder' => 'examinaciones/postura/rodilla/imagenes',
                'public_id' => pathinfo($nombre_archivo, PATHINFO_FILENAME),
                'overwrite' => true
            ]
        );
		$examination->imagen = $response->getSecurePath();

        $examination->save();

        return $examination->id;
    }

    public static function quitarExaminacionRodilla($request) {
        $examination = $request->ExaminacionRodilla;
        $examinationElem = KneeExamination::find($id);
        $examinationElem->delete();
    }
}
