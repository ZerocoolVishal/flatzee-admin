<?php
/**
 * Created by PhpStorm.
 * User: vishal
 * Date: 13/12/18
 * Time: 6:01 PM
 */

namespace app\models;


use yii\base\Model;
use yii\helpers\FileHelper;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @param $id
     * @return bool
     * @throws \yii\base\Exception
     */
    public function upload($id)
    {
        if ($this->validate()) {

            $uploadDir = "uploads/property-image/$id/";
            FileHelper::createDirectory($uploadDir);
            $this->imageFile->saveAs($uploadDir . $this->imageFile->baseName.time(). "." . $this->imageFile->extension);

            $img = new Images();
            $img->property_id = $id;
            $img->url = $uploadDir . $this->imageFile->baseName.time(). "." . $this->imageFile->extension;

            if($img->validate() && $img->save()) {
                return true;
            }

            return false;
        } else {
            return false;
        }
    }

}