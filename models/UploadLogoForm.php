<?php
namespace app\models;

use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadLogoForm extends UploadForm
{
    public $urlname;

    function __construct($u) {
        $this->urlname = $u;
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file'],
            [['urlname'], 'string'],
        ];
    }
}