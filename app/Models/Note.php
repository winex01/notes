<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;


    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'notes';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setAttachmentAttribute($value)
    {
        $attribute_name = "attachment";
        $disk = "public";
        $destination_path = "uploads";

        // Extract the original filename
        $originalFileName = $value->getClientOriginalName();

        // Separate the filename and the extension
        $fileNameWithoutExt = pathinfo($originalFileName, PATHINFO_FILENAME);
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

        // Generate a unique string (e.g., current timestamp with microseconds)
        $uniqueString = now()->format('YmdHis') . uniqid();

        // Concatenate the original filename (without extension) with the unique string, then add the extension
        $uniqueFileName = $fileNameWithoutExt . '_' . $uniqueString . '.' . $fileExtension;

        // Upload the file with the unique filename
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $uniqueFileName);

        // return $this->attributes[$attribute_name]; // uncomment if this is a translatable field
    }

    public function getDescriptionAttribute($value)
    {
        return clean($value);
    }

}
