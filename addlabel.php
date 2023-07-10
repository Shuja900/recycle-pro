<?php
include('Db.php');
for($i=0; $i < count($_FILES['image']['name']); $i++){
 $fltmp= $_FILES['image']['tmp_name'][$i];
        if($fltmp=='')
        {
        $message = '<div class="alert alert-success">Your Data Has Been Enter successfully </div>';
        header("location:https://www.recyclepro.co.uk/wr-m6/label.php?success=true&message='.$message");
        }
        else
        {
        
        if(!empty($_FILES["image"]["name"][$i])){ 
        // File upload path 
        $fileName = basename($_FILES["image"]["name"][$i]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('pdf'); 
        if(in_array($fileType, $allowTypes)){ 
            // Include autoloader file 
            include 'vendor/autoload.php'; 
             
            // Initialize and load PDF Parser library 
            $parser = new \Smalot\PdfParser\Parser(); 
             
            // Source PDF file to extract text 
            $file = $_FILES["image"]["tmp_name"][$i]; 
             
            // Parse pdf file using Parser library 
            $pdf = $parser->parseFile($file); 
             
            // Extract text from PDF 
            $text = $pdf->getText(); 
             
            // Add line break 
            $pdfText = nl2br($text); 
        }else{ 
            $statusMsg = '<p>Sorry, only PDF file is allowed to upload.</p>'; 
        } 
    }else{ 
        $statusMsg = '<p>Please select a PDF file to extract text.</p>'; 
    } 
 
 
// Display text content 

 $stl=mysqli_query($con,"insert into pdflabel(label,pdf) values('$fileName','$pdfText')");
 $fname= $_FILES['image']['name'][$i];
        $targetDir = "uploads/";
        $targetFilePath = $targetDir . $fname;
        move_uploaded_file($fltmp, $targetFilePath);
        $sql=mysqli_query($con,"insert into label(label) values('$fname')");
 
    }
}


?>