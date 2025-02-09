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
    
    private $connection;

    public function __construct() {
        parent::setConnection();
        $this->connection=$this->getConnection();//either we can make this or we can directly call setconnection after making new object or here in thie code we can call getconnection

    }
    function check($tableName, $email, $password) {
        $q = "SELECT id FROM $tableName WHERE email='$email' AND password='$password'";
        $result = $this->connection->query($q);
    
        if($result->num_rows> 0){
            $user=$result->fetch_assoc();
            return $user['id'];
        }  
        return false;
    }
    

    function addnewuser($name, $email, $pass, $type) {
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
        $this->type = $type;
    
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
    
        $q = "INSERT INTO userdata (id, name, email, password, type) VALUES ('', ?, ?, ?, ?)";
    
        $stmt = $this->connection->prepare($q);// whyyy
    
        $stmt->bind_param("ssss", $name, $email, $hashedPassword, $type);// whyy
    
        if ($stmt->execute()) {
            header("Location: adminDashboard.php?msg=done");
        } else {
            header("Location: adminDashboard.php?msg=fail");
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
        if( $this->connection->query($q)){
            header("Location:adminDashboard.php?msg=done");
        }
        else{
            header("Location:adminDashboard.php?msg=fail");
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
        return $data->fetch_all(MYSQLI_ASSOC);
    }
    function userdata(){
        $q= "SELECT * FROM userdata";
        $data=$this->connection->query($q);
        return $data->fetch_all(MYSQLI_ASSOC);
    }
    function userdetail($userId){
        $q="SELECT * FROM userdata WHERE id='$userId'";
        $data=$this->connection->query($q);
        return $data->fetch_assoc();

    }
    function issuereport(){
        $q= "SELECT * FROM issuebook";
        $data=$this->connection->query($q);
        return $data->fetch_all();
    }
    function requestbookdata(){
        $q="SELECT * FROM requestbook ";
        $data=$this->connection->query($q);
        return $data->fetch_all(MYSQLI_ASSOC);
    }
    function issuebookapprove($bookid, $userid, $days, $getdate, $returnDate, $redid) {
        $this->bookid = $bookid;
        $this->userid = $userid;
        $this->days = $days;
        $this->getdate = $getdate;
        $this->returnDate = $returnDate;
    
        $q = "SELECT * FROM book WHERE id='$bookid'";
        $recordSetss = $this->connection->query($q);
    
        $q = "SELECT * FROM userdata WHERE id='$userid'";
        $recordSet = $this->connection->query($q);
    
        if ($recordSet->num_rows > 0 && $recordSetss->num_rows > 0) {
            $row = $recordSet->fetch_assoc();
            $userselect = $row['name'];
            $issuetype = $row['type'];
    
            $row = $recordSetss->fetch_assoc();
            $bookname = $row['bookName'];
            $newbookava = $row['bookAva'] - 1;
            $newbookrent = $row['bookRent'] + 1;
    
            $q = "UPDATE book SET bookAva='$newbookava', bookRent='$newbookrent' WHERE id='$bookid'";
            if ($this->connection->query($q)) {

                $q = "INSERT INTO issuebook (userId, issueName, issueBook, issueType, issueDays, issueDate, issueReturn, fine) 
                      VALUES ('$userid', '$userselect', '$bookname', '$issuetype', '$days', '$getdate', '$returnDate', '0')";
                if ($this->connection->query($q)) {
                    $q = "DELETE FROM requestbook WHERE id='$redid'";
                    $this->connection->query($q);
                    header("Location: adminDashboard.php?msg=done");
                    exit();
                } else {
                    header("Location: adminDashboard.php?msg=fail");
                    exit();
                }
            } else {
                header("Location: adminDashboard.php?msg=fail");
                exit();
            }
        } else {
            header("location: index.php?msg=Invalid Credentials");
            exit();
        }
    }

    function requestbook($userid,$bookid){
        $q="SELECT * FROM book where id='$bookid'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where id='$userid'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetch_all() as $row) {
            $username=$row['name'];
            $usertype=$row['type'];
        }

        foreach($recordSetss->fetch_all() as $row) {
            $bookname=$row['bookName'];
        }

        $days=10;//Maximum number of days


        $q="INSERT INTO requestbook (id,userid,bookid,userName,userType,bookName,issueDays)
        VALUES('','$userid', '$bookid', '$username', '$usertype', '$bookname', '$days')";

        if($this->connection->query($q)) {
            header("Location:userDashboard.php?userlogid=$userid");
        }

        else {
            header("Location:userDashboard.php?msg=fail");
        }

    }
    function deleteUserData($id){
        $q="DELETE FROM userdata WHERE id='$id'";
        if($this->connection->query($q)) {
            header("Location:adminDashboard.php?msg=done");
        }
        else{
            header("Location:adminDashboard.php?msg=fail");
        }
    }
    function getbooks(){
        $q="SELECT * FROM book WHERE bookAva!=0";
        $data=$this->connection->query($q);
        return $data->fetch_all();

    }
    function issuebook($book, $user, $days, $getdate, $returnDate) {
        $q = "SELECT * FROM book WHERE id = '$book'";
        $bookResult = $this->connection->query($q);
        $bookDetails = $bookResult->fetch_assoc();
    
        $q = "SELECT * FROM userdata WHERE id = '$user'";
        $userResult = $this->connection->query($q);
        $userDetails = $userResult->fetch_assoc(); 
    
        if ($userDetails && $bookDetails) {
            if ($bookDetails['bookAva'] > 0) {
                $newbookava = $bookDetails['bookAva'] - 1;
                $newbookrent = $bookDetails['bookRent'] + 1;
    
                $q = "UPDATE book SET bookAva = '$newbookava', bookRent = '$newbookrent' WHERE id = '$book'";
                $this->connection->query($q);
    
                $q = "INSERT INTO issuebook (userId, issueName, issueBook, issueType, issueDays, issueDate, issueReturn, fine) 
                      VALUES ('{$userDetails['id']}', '{$userDetails['name']}', '{$bookDetails['bookName']}', '{$userDetails['type']}', '$days', '$getdate', '$returnDate', '0')";
                
                if ($this->connection->query($q)) {
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
    
    
   
    function getissuebook($userloginid) {
        $q = "SELECT * FROM issuebook WHERE userId='$userloginid'";
        $recordSetss = $this->connection->query($q);
    
        $data = $recordSetss->fetch_all(MYSQLI_ASSOC); 
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
                $this->connection->query($updateQuery);
            }
        }
    
    
        $q = "SELECT * FROM issuebook WHERE userId='$userloginid'";
        $result = $this->connection->query($q);
    
        return $result->fetch_all();
    }
    


    
}