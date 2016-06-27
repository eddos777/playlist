<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "videos".
 *
 * @property integer $id
 * @property string $name
 * @property string $uri
 * @property string $domain
 */
class Video extends \yii\db\ActiveRecord
{
    public $video;

    public $filename;

    public $string;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'uri', 'domain'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'uri' => 'Uri',
            'domain' => 'Domain',
        ];
    }
    public function beforeSave($insert)
    {
        if ($this->isNewRecord){
            //generate & upload
            $this->string = substr(uniqid('domain'),0,12);
            var_dump(UploadedFile::getInstance($this,"url"));
            exit;
            $this->video = UploadedFile::getInstance($this,"url");
            $this->filename = '/web/videos/' . $this->string . '.' . $this->video->extension;
            $this->video->saveAs($this->filename);
            //save
            $this->domain = '/' . $this->filename;
        }else{
            $this->domain = UploadedFile::getInstance($this,'url');
            if($this->domain){
                $this->domain->saveAs(substr($this->domain,1));
            }
        }
        return parent::beforeSave($insert);
    }
}
