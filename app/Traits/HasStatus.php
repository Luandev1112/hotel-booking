<?php


namespace App\Traits;


trait HasStatus
{
    public function getStatusBadgeAttribute(){
        switch ($this->status){
            case "publish": return "success";
            case "draft":  return "secondary";
        }
    }
    public function getStatusTextAttribute(){
        switch ($this->status){
            case "publish": return __("Publish");
            case "draft":  return __("Draft");
        }
    }
}
