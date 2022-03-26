<?php
namespace Modules\Media\Models;

use App\BaseModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Helpers\FileHelper;

class MediaFile extends BaseModel
{
    use SoftDeletes;
    protected $table = 'media_files';

    public static function findMediaByName($name)
    {
        return MediaFile::where("file_name", $name)->firstOrFail();
    }

    public function cacheKey()
    {
        return sprintf("%s/%s", $this->getTable(), $this->getKey());
    }

    public function getEditPath(){
        $storage = Storage::disk('uploads');
        $ex_file = explode('/',$this->file_path);
        $fileName = array_pop($ex_file);
        $filePath = implode('/',$ex_file);
        $old_path = "$filePath/old/$fileName";
        if ($storage->exists($old_path)){
            return asset("uploads/$old_path");
        } else {
            return asset("uploads/$this->file_path");
        }
    }

    public function editImage($image_data){
        $img = str_replace('data:image/jpeg;base64,', '', $image_data);
        $fileData = base64_decode($img);

        $storage = Storage::disk('uploads');
        // Check Old file
        $ex_file = explode('/',$this->file_path);
        $fileName = array_pop($ex_file);
        $oldPath = implode('/',$ex_file).'/old/';
        if (!$storage->exists($oldPath)){
            $storage->makeDirectory($oldPath, 0775, true); //creates directory
        }

        // Move file to old
        if (!$storage->exists($oldPath.$fileName)){
            $storage->copy($this->file_path, $oldPath.$fileName);
        }

        // Put file
        $storage->put($this->file_path, $fileData);

        // Clear thumb image
        $size_mores = FileHelper::list_size();
        if(!empty($size_mores)){
            foreach ($size_mores as $size){
                $file_size = substr($this->file_path, 0, strrpos($this->file_path, '.')) . '-' . $size . '.' . $this->file_extension;
                if($storage->exists($file_size)){
                    $storage->delete($file_size);
                }
            }
        }

        $result = [
            'src'     => get_file_url($this->id,'large'),
            'old'     =>  asset("uploads/".$oldPath.$fileName),
            'message' => __('Update Successful'),
            'status'=>0
        ];
        return $result;
    }
}