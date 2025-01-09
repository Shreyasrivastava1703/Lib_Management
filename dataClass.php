<?php
session_start();
include("db.php");

class data extends db{
    private $bookname;
    private $bookdetail;
    private $bookpub;
    private $bookauthor;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $bookphoto;
    private $type;
    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;
    private $id;
    

   
   function __construct(){//constructor
        //echo "Working";
    }
    function check($tableName, $email, $password) {
        $q = "SELECT id FROM $tableName WHERE email='$email' AND password='$password'";
        $result = $this->connection->query($q);
    
        if($result-> rowCount() > 0){
            $user=$result->fetch();
            return $user['id'];
        }  
        return false;
    }
    

    function addnewuser($name,$email,$pass,$type){

        $this->name=$name;
        $this->email=$email;
        $this->pass=$pass;
        $this->type=$type;
        
        $q="INSERT INTO userdata(id,name,email,password,type) VALUES ('','$name','$email','$pass','$type')";
        if( $this->connection->exec($q)){
            header("Location:adminDashboard.php?msg=New Add Done");
        }
        else{
            header("Location:adminDashboard.php?msg=Register Fail");
        }
    
    }
    function addbook($bookpic, $bookname, $bookdetail, $bookauthor, $bookpub, $branch, $bookprice, $bookquantity){
        $this->bookpic=$bookpic;
        $this->bookname=$bookname;
        $this->bookauthor=$bookauthor;
        $this->bookdetail=$bookdetail;
        $this->bookpub=$bookpub;
        $this->branch=$branch;
        $this->bookprice=$bookprice;
        $this->bookquantity=$bookquantity;


        $q="INSERT INTO book(id,bookPic,bookName,bookDetail,author,publisher,branch,price,quantity,bookAva,bookRent) VALUES ('','$bookpic','$bookname','$bookdetail','$bookauthor','$bookpub','$branch','$bookprice','$bookquantity','$bookquantity',0)";
        if( $this->connection->exec($q)){
            header("Location:adminDashboard.php?msg=Done");
        }
        else{
            header("Location:adminDashboard.php?msg=Fail");
        }
    }
    function getbook(){
        $q="SELECT * FROM book";
        $data=$this->connection->query($q);
        return $data;
    }
    function getbookdetail($bookid){
        $q="SELECT * FROM book WHERE id='$bookid'";
        $data=$this->connection->query($q);
        return $data;
    }
    function userdata(){
        $q= "SELECT * FROM userdata";
        $data=$this->connection->query($q);
        return $data;
    }
    function issuereport(){
        $q= "SELECT * FROM issuebook";
        $data=$this->connection->query($q);
        return $data;
    }
    function requestbookdata(){
        $q="SELECT * FROM requestbook ";
        $data=$this->connection->query($q);
        return $data;
    }
    function userdetail($id){
        $q="SELECT * FROM userdata WHERE id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }

    function requestbook($userid,$bookid){
        $q="SELECT * FROM book where id='$bookid'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where id='$userid'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetchAll() as $row) {
            $username=$row['name'];
            $usertype=$row['type'];
        }

        foreach($recordSetss->fetchAll() as $row) {
            $bookname=$row['bookName'];
        }

        $days=10;//Maximum number of days


        $q="INSERT INTO requestbook (id,userid,bookid,userName,userType,bookName,issueDays)
        VALUES('','$userid', '$bookid', '$username', '$usertype', '$bookname', '$days')";

        if($this->connection->exec($q)) {
            header("Location:userDashboard.php?userlogid=$userid");
        }

        else {
            header("Location:userDashboard.php?msg=fail");
        }

    }
    function deleteUserData($id){
        $q="DELETE FROM userdata WHERE id='$id'";
        if($this->connection->exec($q)) {
            header("Loaction:adminDashboard.php?msg=Done");
        }
        else{
            header("Loaction:adminDashboard.php?msg=Fail");
        }
    }
    /*function deletebook($id){
        $q="DELETE from book where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:adminDashboard.php?msg=done");
        }
        else{
           header("Location:adminDshboard.php?msg=fail");
        }
    }*/
    function getbooks(){
        $q="SELECT * FROM book WHERE bookAva!=0";
        $data=$this->connection->query($q);
        return $data;

    }
    function issuebook($book, $user, $days, $getdate, $returnDate) {
        /*echo "User: " . $user . "<br>";
        echo "Book: " . $book . "<br>";
        exit;*/


        
        $q = "SELECT * FROM book WHERE id = '$book'";
        $recordSetss = $this->connection->query($q);
        $bookDetails = $recordSetss->fetch();
    
        $q = "SELECT * FROM userdata WHERE id ='$user'";
        $recordSet = $this->connection->query($q);
        $userDetails = $recordSet->fetch();
    
       //header("Location: issueBook.php?msg=done&username=" . urlencode($userDetails['name']));

        if ($userDetails) {
            $issueid = $userDetails['id'];
            $issuetype = $userDetails['type'];
            //header("Location: adminDashboard.php?msg=done&username=" . urlencode($bookDetails['bookName']));
    
            if ($bookDetails && $bookDetails['bookAva'] > 0) {
               
            
                $newbookava = $bookDetails['bookAva'] - 1;
                $newbookrent = $bookDetails['bookRent'] + 1;
                $q = "UPDATE book SET bookAva = '$newbookava', bookRent = '$newbookrent' WHERE id = '{$bookDetails['id']}'";
                $this->connection->exec($q);
    
            
                $q = "INSERT INTO issuebook (userId, issueName, issueBook, issueType, issueDays, issueDate, issueReturn, fine) 
                      VALUES ('$issueid', '{$userDetails['name']}', '{$bookDetails['bookName']}', '$issuetype', '$days', '$getdate', '$returnDate', '0')";
                if ($this->connection->exec($q)) {
                    header("Location: adminDashboard.php?msg=done");
                } else {
                    header("Location: adminDashboard.php?msg=fail");
                }
            } else {
            
                header("Location: adminDashboard.php?msg=Book unavailable");
            }
        } else {
        
            header("Location: adminDashboard.php?msg=Invalid Credentials");
        }
    }
    
    function issuebookapprove($book,$userselect,$days,$getdate,$returnDate,$redid){
        $this->book= $book;
        $this->userselect=$userselect;
        $this->days=$days;
        $this->getdate=$getdate;
        $this->returnDate=$returnDate;


        $q="SELECT * FROM book where bookName='$book'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where name='$userselect'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $issueid=$row['id'];
                $issuetype=$row['type'];
            }
            foreach($recordSetss->fetchAll() as $row) {
                $bookid=$row['id'];
                $bookname=$row['bookName'];

                    $newbookava=$row['bookAva']-1;
                     $newbookrent=$row['bookRent']+1;
            }

        
            $q="UPDATE book SET bookAva='$newbookava', bookRent='$newbookrent' where id='$bookid'";
            if($this->connection->exec($q)){

                $q="INSERT INTO issuebook (userId,issueName,issueBook,issueType,issueDays,issueDate,issueReturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

                if($this->connection->exec($q)) {

                    $q="DELETE from requestbook where id='$redid'";
                    $this->connection->exec($q);
                    header("Location:adminDashboard.php?msg=done");
                }
        
                else {
                    header("Location:adminDashboard.php?msg=fail");
                }
                }
            else{
               header("Location:adminDashboard.php?msg=fail");
            }




        }

        else {
            header("location: index.php?msg=Invalid Credentials");

        }

    }
    function getissuebook($userloginid) {
        $q = "SELECT * FROM issuebook WHERE userId='$userloginid'";
        $recordSetss = $this->connection->query($q);
    
        $data = $recordSetss->fetchAll(); 
        if (empty($data)) {
            return [];
        }
    
        $currentDate =new DateTime(); 
    
        foreach ($data as $row) {
            $issuereturn = DateTime::createFromFormat('d/m/Y', $row['issueReturn']);
            $fine = $row['fine'];
            $newfine = $fine;
    
    
            if ($issuereturn < $currentDate) {
                $daysOverdue = $currentDate->diff($issuereturn)->days; 
                $newfine = $fine + ($daysOverdue * 10); //10 units per day
                $updateQuery = "UPDATE issuebook SET fine='$newfine' WHERE userId='$userloginid'";
                $this->connection->exec($updateQuery);
            }
        }
    
    
        $q = "SELECT * FROM issuebook WHERE userId='$userloginid'";
        $result = $this->connection->query($q);
    
        return $result;
    }
    


    
}