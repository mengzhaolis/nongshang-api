<?php
/**
 * PhpStorm.
 * User: bing
 * Date: 2018/10/27
 * Time: 下午7:40
 */

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use OSS\Core\OssException;
use OSS\OssClient;

class Oss
{
    protected $accessKeyId;
    protected $accessKeySecret;
    protected $bucket;
    protected $region;

    public function __construct()
    {
        $this->accessKeyId = config('oss.accessKeyId');
        $this->accessKeySecret = config('oss.accessKeySecret');
        $this->bucket = config('oss.bucket');
        $this->region = config('oss.region');
    }

    /**
     * 文件上传
     *
     * @param UploadedFile $file
     * @return array
     * @throws OssException
     * @throws OssException
     */
    public function uploadFile(UploadedFile $file)
    {
        $ossClient = $this->getOssClient();
        // var_dump($ossClient);die;
        $extension = $file->getClientOriginalExtension();
        $typePattern = '/^jpg|jpeg|png|gif$/';
        if (!preg_match($typePattern, $extension)) {
            throw new OssException('上传文件类型不支持');
        }
        $key = str_random();
        $fileName = $this->getUploadFileName($key, $extension);
        try
        {
            $ossClient->multiuploadFile($this->bucket, $fileName, $file->getRealPath());
        }
        catch (OssException $e)
        {
            Log::error($e->getErrorMessage());
            throw new OssException($e->getErrorMessage());
            throw new OssException('OSS 上传文件失败');
        }
        return ['src'=>$this->makeUrl($fileName),'name'=>$fileName];
    }

    /**
     * 上传二进制文件
     *
     * @param $imgData
     * @return array
     * @throws OssException
     */
    public function uploadImage($imgData)
    {
        $ossClient = $this->getOssClient();
        $key = str_random();
        $fileName = $this->getUploadFileName($key,'png');
        try {
            $ossClient->putObject($this->bucket, $fileName, $imgData);
        } catch (OssException $e) {
            Log::error($e->getErrorMessage());
            throw new OssException( 'oss_upload_fail');
        }
        return ['src'=>$this->makeUrl($fileName),'name'=>$fileName];
    }

    /**
     * 删除单个Object
     *
     * @param $object
     * @return null
     * @throws OssException
     */
    public function deleteObject($object)
    {
        return $this->getOssClient()->deleteObject($this->bucket,$object);
    }

    /**
     * 删除多个Object
     *
     * @param $objects
     * @throws OssException
     */
    public function deleteObjects($objects)
    {
        $this->getOssClient()->deleteObjects($this->bucket,$objects);
    }

    /**
     * 获取OSS对象
     *
     * @return OssClient
     * @throws OssException
     */
    private function getOssClient()
    {
        $endPoint = "$this->region.aliyuncs.com";
        return new OssClient($this->accessKeyId, $this->accessKeySecret, $endPoint);
    }

    /**
     * 合成预览地址
     *
     * @param $filename
     * @return string
     */
    public function makeUrl($filename)
    {
        return "http://$this->bucket.$this->region.aliyuncs.com/" . $filename;
    }

    /**
     * 构造上传地址
     *
     * @param $key
     * @param $ext
     * @return string
     */
    private function getUploadFileName($key, $ext = '')
    {
        $date = date('Y-m-d');
        return "$date/$key.$ext";
    }

}