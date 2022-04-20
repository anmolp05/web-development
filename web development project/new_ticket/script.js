function createTicket() {
    const firstName = document.getElementById("firstname").value;
    const lastName = document.getElementById("lastname").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    var gender = document.querySelector('input[name="gender"]:checked').value;
    var nationality = document.querySelector('input[name="nationality"]:checked').value;
    const visitDate = document.getElementById("startDate").value;
    const proof = document.getElementById("level").value;
    const proofID = document.getElementById("proofID").value;

    var checkboxes = document.getElementsByName('ticket1');
    var ticket = [];
    for (var i=0; i<checkboxes.length; i++) {
        if (checkboxes[i].checked) {
           ticket.push(checkboxes[i].value);
        }
    }
    if(!firstName || !email || !phone || !visitDate || !proofID){
        alert("Fill all the Required Details");
        return false;
    }
    var qrdata = "Name : " + firstName +
                    " " + lastName + 
                    " Email : " + email + 
                    " Phone : " + phone +
                    " Gender : " + gender +
                    " Ticket : " + ticket +
                    " Nationality : " + nationality +
                    " Visit Date : " + visitDate +
                    " Proof : " + proof +
                    " Proof ID : " + proofID;
    var qrImgLink = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + qrdata;
    let myText = 
            `<html>
                <head>
                    <title>My Ticket</title>
                    <link rel='stylesheet' type='text/css' href='style.css'/>
                </head>
                <body>
                `;
    // myText += `
    //         <div class='firstName'>
    //         ${ firstName }
    //         </div>`;
    
    // myText += `
    // <div class='firstName'>
    // ${ lastName }
    // </div>`;
    // myText += `<div> 
    //               ${ email } 
    //               </div>`;
    myText += ` ${ firstName }<br>
                ${ lastName }<br>
                ${ email }<br>
                ${ phone }<br>
                ${ gender } <br>
                ${ ticket }<br>
                ${ nationality }<br>
                ${ visitDate } <br>
                ${ proof }      :     
                ${ proofID } <br>
                <img src="${ qrImgLink }" alt="QRCode"><br><br><br>
                <input type='button' class='btn' id='download' name='download' value='Download' onclick='window.print()' />
                </body>
                </html>`;

    let flyWindow = window.open(
    "about:blank",
    "myTicket",
    "width=800,height=800,left=200,top=200"
  );
  flyWindow.document.write(myText);

}