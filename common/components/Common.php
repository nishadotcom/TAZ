<?php

namespace common\components;

use Yii;
use yii\helpers\Html;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\Url;
use yii\db\Query;
use common\models\User;
use yii\web\UploadedFile;
use yii\web\BadRequestHttpException;

class Common extends Component {

    /**
     * To get Mysql Date Time format
     */
    public static function mysqlDate($date = FALSE) {
        if ($date) {
            return date('Y-m-d', strtotime($date));
        }
        return date('Y-m-d');
    }

    /**
     * To get Mysql Date Time format
     */
    public static function displayDateTime1($dateTime) {
        if ($dateTime) {
            return date('d-m-Y H:i:s', strtotime($dateTime));
        }
    }

    /**
     * To get Mysql Date Time format
     */
    public static function customDate($date) {
        if ($date) {
            return date('d-m-Y', strtotime($date));
        } else {
            return '';
        }
    }

    /**
     * To get default Date
     */
    public static function displayDate2($date) {
        if ($date == '0000-00-00') {
            return '';
        }

        return date('d-m-Y', strtotime($date));
    }


    /**
     * To get Mysql Date Time format
     */
    public static function mysqlDateTime($date = FALSE) {
        if ($date) {
            return date('Y-m-d H:i:s', strtotime($date));
        }
        return date('Y-m-d H:i:s');
    }

    /**
     * To format date time
     */
    public static function formatDateTime($createdOn) {
        if ($createdOn != "0000-00-00 00:00:00") {
            echo $createdOn;
        } else {
            echo '';
        }
    }

    /*
     * To unlink the file if exists 
     */
    public static function unlinkExistedFile($path, $fileName = FALSE) {
        if (file_exists($path . $fileName)) {
            if (is_file($path . $fileName)) {
                unlink($path . $fileName);
            }
        }
    }

    public static function printR($str) {
        print '<pre>';
        print_r($str);
        print '</pre>';
    }

    public static function getFileName($fileName) {
        $ext = Yii::$app->Common->getExtension($fileName);
        return date('Ymdhis') . '-' . Yii::$app->Common->removeSpecialCharacter($fileName, $ext);
        //return date('Ymdhis').'-'.$fileName;
    }

    /**
     * To remove special charaters in a content and replace with hyphens
     * */
    public static function removeSpecialCharacter($string, $ext) {
        $string = str_replace('.' . $ext, '', $string); // Replaces all spaces with hyphens.
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string); // Removes special chars.
        $string = preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.

        return $string . '.' . $ext;
    }

    /* Common Uplaod  */

    public static function commonUpload($model, $path, $attribute) {
        $file = UploadedFile::getInstance($model, $attribute);
       if ($file) {
            $file->name = \Yii::$app->Common->getFileName($file->name);
            $model->$attribute = $file->name;
            // $ext = end((explode(".", $file->name)));
            //$ext = Yii::$app->Common->getExtension($file->name);
            $filePath = $path;
            $path = $filePath . $file->name;

            if ($file->saveAs($path)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getExtension($fileName) {
        $file = explode('.', $fileName);
        return end($file);
    }
    /**
     * To redirect using javascript
     */
    public static function redirect($url) {
        echo '<script>window.location.href="' . $url . '";</script>';
        exit;
    }

    /**
     * To create secret URL and check xxx
     */
    public static function createSecretUrl($varId) {
        return hash_hmac('sha1', $varId . Yii::$app->user->id, Yii::$app->params['urlSecretKey']) . '-' . $varId;
    }

    /**
     * To check the secret url on view page
     * http://stackoverflow.com/questions/5387755/how-to-generate-unique-order-id-just-to-show-touser-with-actual-order-id
     */
    public static function checkSecretUrlVerification($varIdCheck) {
        if (!strstr($varIdCheck, '-'))
            throw new BadRequestHttpException('The requested page does not exist.');

        list($hash, $originalId) = explode('-', $varIdCheck);

        if (hash_hmac('sha1', $originalId . Yii::$app->user->id, Yii::$app->params['urlSecretKey']) === $hash) {
            return $originalId;
        } else {
            throw new BadRequestHttpException('The requested page does not exist.');
        }
    }

    /**
     * To encript password
     */
    public static function getEncriptedPwd($str) {
        return md5($str);
    }

    /**
     * To get range
     */
    public static function getRange($from, $end) {
        $range = range($from, $end);
        //print_r($range);
        //return $range;
        foreach ($range as $values) {
            $retVal[$values] = $values;
        }
        return $retVal;
    }
     /*
     * To check whether image is available in given path
     * returns default image if no photo is available
     */
    public static function getImageWithLink($path, $fileName=FALSE, $id=FALSE){
        $noPhoto = Yii::$app->homeUrl.$path.'no_image_thumb.gif';  
        $fullFilePath = Yii::$app->homeUrl.$path.$fileName;
           
        $result = '';        
        if (file_exists($path . $fileName)) {
            if (is_file($path . $fileName)) { 
                $result = '<a  class="fancybox" data-fancybox-group="gallery" target="_blank" href="'. $fullFilePath. '" title = "">'. Html::img($fullFilePath, ['class' => 'existing', 'target' => '_blank',]) . '</a>';
            }else{ 
                $result = Html::img($noPhoto, ['class' => 'existing', 'target' => '_blank',]);
            }
        }else{
            $result = Html::img($noPhoto, ['class' => 'existing', 'target' => '_blank',]);    
            //return $noPhoto;
        }
        if($id){
            return '<div class="col-md-4"><span class="browse">'.$result.'</span><p>'.Html::a("", ["/profile/photo-gallery-delete/".Yii::$app->Common->createSecretUrl($id)], ["class" => "glyphicon glyphicon-trash delete", "title" => "Delete Photo"]).'</a></p></div>';
        }else{
            return '<span class="browse">'.$result.'</span>';
        }
    }

	/**
	* This methbod handles to generate unique random code with given string
	**/
	public static function generateRandomStr($uniqueStr='', $length=4){
		$randomString 	= Yii::$app->getSecurity()->generateRandomString($length);
		$constructStr 	= $uniqueStr.date('dmyHis').$randomString;
		return $constructStr;
	}

    /**
    * Generate SEO
    **/
    public static function getSeo($str){
        return strtolower(preg_replace("![^a-z0-9]+!i", "-", $str));
    }

    public static function updateLastLogin($userid){

    }

} // End of class
?>

