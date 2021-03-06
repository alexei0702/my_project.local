<?php
namespace app\models;


use yii\web\UploadedFile;

class Images extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
//    public $name;
    //public $link="J:/XAMPP/projects/my_project.local/www/uploads/";

    public function rules()
    {
        return [[['name'],'required'],
            [['link'],'default','value'=>""],
            [['link'], 'file', 'extensions' => ['png', 'jpg', 'gif','jpeg']],
        
        ];
    }

    public function create()
    {
        if ($this->validate()) {
            $this->link->saveAs($_SERVER['DOCUMENT_ROOT'].'/basic/upload/' .time()."_". $this->link->baseName . '.' . $this->link->extension);
            $this->link=time()."_".$this->link->baseName . '.' . $this->link->extension;
            /*chmod($_SERVER['DOCUMENT_ROOT'].'/basic/upload/' .time()."_". $this->link->baseName . '.' . $this->link->extension,0755);*/
            return true;
        } else {
            return false;
        }
    }  

    public function updateImage ()
    {
        if ($this->validate()) {
            if(is_string($this->link)){
                return true;
            }
            else{
            $this->link->saveAs($_SERVER['DOCUMENT_ROOT'].'/basic/upload/' .time()."_". $this->link->baseName . '.' . $this->link->extension);
            $this->link=time()."_".$this->link->baseName . '.' . $this->link->extension;
            /*chmod($_SERVER['DOCUMENT_ROOT'].'/basic/upload/' .time()."_". $this->link->baseName . '.' . $this->link->extension,0755);*/
            return true;
        }
        } else {
            return false;
        }
    }    

}
?>