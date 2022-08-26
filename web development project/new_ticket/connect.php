<?
    $firstname = $_POST['firstname']
    $lastname = $_POST['lastname']
    $email= $_POST['email']
    $phone = $_POST['phone']
    $gender = $_POST['gender']
    $ticket1 = $_POST['ticket1']
    $nationality = $_POST['nationality']
    $startDate = $_POST['startDate']
    $proofid = $_POST['proofid']
    $proofno = $_POST['proofno']

    // Database connection
    $conn = new mysqli('localhost','root','','ticket_data');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(firstName, lastname, email, phone, gender, ticket, nationality, startDate, proofid, proofno)
        values(?,?,?,?,?,?,?,?,?,?");
        $stmt->bind_param("sssissssss", );
        $stmt->execute();
        echo();
        $stmt->close();
        $conn->close();
    }
?>