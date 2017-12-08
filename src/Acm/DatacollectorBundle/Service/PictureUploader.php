<?php
/**
 * Created by PhpStorm.
 * User: Ahmad Sajid
 * Date: 8/15/2017
 * Time: 1:13 PM
 */

namespace Acm\DatacollectorBundle\Service;


use Acm\DatacollectorBundle\Entity\Human;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gaufrette\Filesystem;

/**
 * Class PictureUploader
 * @package Acm\DatacollectorBundle\Service
 */
class PictureUploader
{
    /**
     * @var array
     */
    private static $allowedMimeTypes = array(
        'image/jpeg',
        'image/png',
        'image/gif'
    );

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * PictureUploader constructor.
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function upload(UploadedFile $file)
    {
        // Check if the file's mime type is in the list of allowed mime types.
        if (!in_array($file->getClientMimeType(), self::$allowedMimeTypes)) {
            throw new \InvalidArgumentException(sprintf('Files of type %s are not allowed.', $file->getClientMimeType()));
        }

        if ($file->getSize() > 556126){
            throw new \InvalidArgumentException(sprintf('Files size %s is exceeded max limit.', $file->getSize()));
        }

        // Generate a unique filename based on the date and add file extension of the uploaded file
        $filename = sprintf('%s/%s/%s/%s.%s', date('Y'), date('m'), date('d'), uniqid(), $file->getClientOriginalExtension());

        $adapter = $this->filesystem->getAdapter();
       // $adapter->setMetadata($filename, array('contentType' => $file->getClientMimeType()));
        $adapter->write($filename, file_get_contents($file->getPathname()));

        return $filename;
    }
}