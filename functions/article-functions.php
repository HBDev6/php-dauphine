<?php

    function addArticleDB($pdo, $imagepath){

        $dateNow = new DateTime();
        // var_dump($_SESSION);
        $author=$_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname'].' {'.$_SESSION['user']['pseudo'].'}';
        // var_dump($userName);
        $title = $_POST['title'];

        $content = $_POST['content'];
        
        try{
            $req = $pdo->prepare(
                'INSERT INTO articles(title, imagepath, content, author, date)
                VALUES(:title, :imagepath, :content, :author, NOW())');
            $req->execute([
                'title' => $title,
                'imagepath' => $imagepath,
                'content' => $content,
                'author' => $author
            ]);
        } catch (PDOException $exception){
            // var_dump($exception);
            echo($exception);
            if(($exception->getcode())==='23000'){
                $errors[] = 'title already used';
            }
        }
        return($errors);
    }   

    function uploadArticleImage(){
        $errors=[];
        $fileName='';
            //test file size
            
            if($_FILES['imagepath']['size'] === 0){
                $errors[]='empty upload';
                // return $errors;
            }else if($_FILES['imagepath']['size']<=1000000){

                //test authorised extension
                $allowedExtension = ['jpg', 'jpeg', 'gif','png'];
                $fileInfo = pathinfo($_FILES['imagepath']['name']);
                $extension_upload = $fileInfo['extension'];
                if(in_array($extension_upload, $allowedExtension)){
                    //file validation
                    $fileName = uniqid().'.'.explode('/', $_FILES['imagepath']['type'])[1];
                    move_uploaded_file($_FILES['imagepath']['tmp_name'],'assets/uploads/library/'.$fileName);
                    echo('file uploaded !');
                }else{
                    $errors[]='file not valid';
                }
            }else{
                $errors[]='file too big';
            }
            return ['errors'=>$errors, 'fileName'=>$fileName];
    }

?>