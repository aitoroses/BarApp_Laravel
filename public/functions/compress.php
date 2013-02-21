<?php
/* 
Owner Name: Suraj Thapaliya 
Email: surajthapaliya at gmail.com 


The script is used for image compression such as photo gallery and the script automatically compress the image base on the given dimension. it will automatically calculate the landscape image or portrait image 

before use this code you must have to enable your gd library 

If this script is useful to anyone please send me the mail    

*/
//$imgfile="photo/myson.jpg"; // The Source of your image file 
function imageCompression($imgfile,$thumbsize,$savePath) { 
    if($savePath==NULL) { 
        header('Content-type: image/jpeg'); 
        /* To display the image in browser 
        
        */ 
        
    } 
    list($width,$height)=getimagesize($imgfile); 
    /* The width and the height of the image also the getimagesize retrieve other information as well   */ 
    echo $width; 
    echo $height; 
    $imgratio=$width/$height;  
    /* 
    To compress the image we will calculate the ration  
    For eg. if the image width=700 and the height = 921 then the ration is 0.77... 
    if means the image must be compression from its height and the width is based on its height 
    so the newheight = thumbsize and the newwidth is thumbsize*0.77... 
    */ 
    
    if($imgratio>1) { 
        $newwidth=$thumbsize; 
        $newheight=$thumbsize/$imgratio; 
    } else { 
        $newheight=$thumbsize;        
        $newwidth=$thumbsize*$imgratio; 
    } 
    
    $thumb=imagecreatetruecolor($newwidth,$newheight); // Making a new true color image 
    $source=imagecreatefromjpeg($imgfile); // Now it will create a new image from the source 
    imagecopyresampled($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);  // Copy and resize the image 
    imagejpeg($thumb,$savePath,100); 
    /* 
    Out put of image  
    if the $savePath is null then it will display the image in the browser 
    */ 
    imagedestroy($thumb); 
    /* 
        Destroy the image 
    */ 
    
} 
//imageCompression($imgfile,150,"a.jpg");

function thumbImage($srcPath, $dstPath){
    imageCompression($srcPath,100,$dstPath);
}
?>
