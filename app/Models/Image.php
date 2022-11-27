<?php

namespace App\Models;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Image extends Model
{
    /**
     * The validation string for images.
     */
    public const VALIDATION_STRING = 'image|max:2048';

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'storage_path',
    ];

    /**
     * The polymorphic imageable relation.
     *
     * @return MorphTo
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Store a new image and relate it to the given model.
     *
     * @param UploadedFile $image The uploaded image to store.
     * @param Model $model The model to associate the image to.
     * 
     * @return void
     */
    public static function storeAndAssociate(UploadedFile $image, Model $model): void
    {
        $imageModel = static::make([
            'storage_path' => $image->store('images'),
        ]);

        $imageModel->imageable()->associate($model);
        $imageModel->save();
    }

    /**
     * Return the URL pointing to the image.
     *
     * @return string
     */
    public function getDisplayUrl(): string
    {
        return config('app.url') . '/images/' . $this->id;
    }

    /**
     * Get the image for frontend display.
     *
     * @return BinaryFileResponse
     */
    public function getImage(): BinaryFileResponse
    {
        return response()->file(storage_path('app/') . $this->storage_path);
    }

    /**
     * Delete this image from the filesystem.
     * 
     * @return void
     */
    public function removeFromStorage(): void
    {
        Storage::disk('local')->delete($this->storage_path);
    }
}
