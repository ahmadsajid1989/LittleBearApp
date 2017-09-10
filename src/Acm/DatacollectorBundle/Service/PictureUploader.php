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
use Gedmo\Exception\UploadableCantWriteException;

class PictureUploader
{
    /**
     * @var string
     */
    private $targetDir;



    /**
     * PicUploader constructor.
     *
     * @param $targetDir
     *
     */
    public function __construct($targetDir)
    {
        $this->targetDir    = $targetDir;
    }

    /**
     * @param Human $human
     * @param UploadedFile $file
     *
     * @return array | string
     */
    public function uploadFile(Human $human, UploadedFile $file)
    {
        $fileData = array();

        $fileName = $human->getUniqueId().'.'.$file->guessExtension();
        if(!$this->isValidMimeType($file)) {
            return $fileData['code'] = ErrorCodes::INVALID_IMAGE;
        }

        try{
            $file->move($this->targetDir, $fileName);
            $fileData['code'] = ErrorCodes::PROFILE_PIC_UPLOAD_SUCCESS;
        } catch (UploadableCantWriteException $e) {
            $fileData['code'] = ErrorCodes::PROFILE_PIC_UPLOAD_FAILURE;
        }

        $fileData['fileName'] = $fileName;

        return $fileData;
    }

    /**
     * @param UploadedFile $file
     * @return bool
     */
    private function isValidMimeType(UploadedFile $file)
    {
        $mimeTypeArray = ["image/jpeg", "image/png"];
        $fileMimeType = $file->getClientMimeType();
        return in_array($fileMimeType, $mimeTypeArray);
    }

}