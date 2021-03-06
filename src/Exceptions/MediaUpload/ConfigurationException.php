<?php
declare(strict_types=1);

namespace Udhuong\LaravelUploadFile\Exceptions\MediaUpload;

use Udhuong\LaravelUploadFile\Exceptions\MediaUploadException;

class ConfigurationException extends MediaUploadException
{
    public static function cannotSetAdapter(string $class): self
    {
        return new static("Could not set adapter of class `{$class}`. Must implement `\Udhuong\LaravelUploadFile\SourceAdapters\SourceAdapterInterface`.");
    }

    public static function noSourceProvided(): self
    {
        return new static('No source provided for upload.');
    }

    public static function unrecognizedSource($source): self
    {
        if (is_object($source)) {
            $source = get_class($source);
        } elseif (is_resource($source)) {
            $source = get_resource_type($source);
        }

        return new static("Could not recognize source, `{$source}` provided.");
    }

    public static function diskNotFound(string $disk): self
    {
        return new static("Cannot find disk named `{$disk}`.");
    }
}
