<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Integer;

class UploadsController extends Controller
{
    protected $fileObject;
    protected $savePath;
    protected $fileName;
    protected $fileExtension;
    protected $relativePath;
    protected $allowFileType = ['jpg', 'png', 'gif'];
    protected $allowFileSize = 2048000;

    /**
     * UploadsController constructor.
     * @param Request $request requestObject
     * @param String $file fileKey
     */
    public function __construct(Request $request, $file)
    {
        $this->fileObject = $request->file($file);
        $this->savePath = $this->setSavePath();
        $this->fileName = $this->getUniqueFileName();
        $this->fileExtension = $this->fileObject->getClientOriginalExtension();
        $this->setAllowFileType([
            'jpg', 'png', 'gif',
            'mp3','mp4','wma','rm','m4a','lrc'
        ]);
        $this->setAllowFileSize(1048576000);
    }


    /**
     * 上传文件, 成功执行 $success方法, 失败执行$error方法
     * 成功$success方法默认有一个参数, 是图片的url地址
     * @return mixed
     */
    public function upload($success, $error)
    {
        // 获取上传文件的url地址
        return $this->uploadFile() ? $success("$this->relativePath/$this->fileName.$this->fileExtension") : $error();
    }



    /**
     * 获取文件上传url
     * @return string
     */
    public function getFileUrl()
    {
        return "$this->relativePath/$this->fileName.$this->fileExtension";
    }

    /**
     * 上传文件并返回结果
     * @return bool
     */
    public function uploadFile()
    {
        // 判断文件是否符合要求,true符合要求, false不符合
        if ($this->checkFile()) {
            // 获取文件名
            $fileName = "$this->savePath/$this->fileName.$this->fileExtension";
            // 如果通过检查,就上传文件
            $bool = file_put_contents($fileName, file_get_contents($this->fileObject->getRealPath()));
            return (bool) $bool;
        }
        return false;
    }





    /**
     * 判断文件是否符合要求
     * @return bool
     */
    public function checkFile()
    {
        // 0.获取文件上传对象
        $file = $this->fileObject;

        // 1.是否上传成功
        if (!$file->isValid()) {
            return false;
        }

        // 2.是否符合文件类型 getClientOriginalExtension 获得文件后缀名
        if (!in_array($this->fileExtension, $this->allowFileType)) {
            return false;
        }

        // 3.判断大小是否符合 2M
        $tmpFile = $file->getRealPath();
        if (filesize($tmpFile) >= $this->allowFileSize) {
            return false;
        }

        // 4.是否是通过http请求表单提交的文件
        if (!is_uploaded_file($tmpFile)) {
            return false;
        }

        // 5. 全部通过就返回true
        return true;
    }


    /**
     * 获取唯一文件名
     * @return string
     */
    public function getUniqueFileName()
    {
        $fileName = md5(time()) . mt_rand(1000, 9999);
        do {
            $fileName = md5(time()) . mt_rand(1000, 9999);
        } while (file_exists("$this->savePath/$fileName.$this->fileExtension"));
        return $fileName;
    }


    /**
     *
     * @return string 文件保存路径
     */
    public function setSavePath()
    {
        // 获取系统绝对路径
        $path = str_replace('\\','/',public_path('uploads') . date('/Y_m_d'));
        if (!file_exists($this->savePath)) {
            @mkdir($path);
        }
        $this->relativePath = '/uploads/' . date('Y_m_d');
        return $path;
    }


    /**
     * 设置允许的文件类型
     * @param array $type
     */
    public function setAllowFileType(array $type = [])
    {
        $this->allowFileType = $type;
    }

    /**
     * 设置允许的文件大小
     * @param Integer $size
     */
    public function setAllowFileSize(int $size)
    {
        $this->allowFileSize = $size;
    }

}
