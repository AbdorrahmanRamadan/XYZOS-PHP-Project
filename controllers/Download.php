<?php
class Download
{
    public $Token;
    public $order;
    public function __construct()
    {
        $this->Token = new Token();
        $this->order= new Order();
    }
    function getDownloadLink($id){

        return DOWNLOAD_PATH.$this->order->get_download_link($id);
    }
    function getDownloadCount($userid){
        return $this->order->get_download_count($userid);
    }
    function downloadFile($userid,$link){
       $actualLink=$this->order->get_download_link($userid);
        $contentType = contet_type;
        $fileName = suggested_name;
        $filePath =file_path;
       if($link==$actualLink)
       {
           header("Content-Description: File Transfer");
           header("Content-type: {$contentType}");
           header("Content-Disposition: attachment; filename=\"{$fileName}\"");
           header("Content-Length: " . filesize($filePath));
           header('Pragma: public');
           readfile($filePath);
           $this->order->generate_new_link($userid);
           echo"after download";
       } else{
           die("Link doesn't exist or expired");
       }

    }
    function logout()
    {
        if(isset($_SESSION['userID']))
            $this->Token->remove_token($_SESSION["userID"]);
            setcookie("remember_me", "", time() - 300);
            session_destroy();
    }
}
