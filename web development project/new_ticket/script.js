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
                    
                    <link rel='stylesheet' type='text/css' href='styleticket.css'/>
                    <style>
                    html {
                        height: 100%;
                    }
                    </style>
                    <!-- Chrome, Firefox OS and Opera -->
                    <meta name="theme-color" content="#2b9098" />
                    <!-- Windows Phone -->
                    <meta name="msapplication-navbutton-color" content="#2b9098">
                    <!-- IOS safari -->
                    <meta name="apple-mobile-web-app-status-bar-style" content="#2b9098">
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
    myText += ` <div class="parent">
    <br>
    <div class="child">
    <header>
    <img src="ministry.png" class="min">
    <h2><b>E-Ticket for Taj Mahal</b></h2>
    <h6>Ticket is Valid for one time use only</h6>
    </header>
    <hr><br>
    <div class="name">
    <div class="item"><b>Visitor's Name :</b> ${ firstName } ${ lastName } </div>
    <div class="item"><b>Entry Fee :</b> Rs. 20 </div>
    <div class="item"><b>Visitor Type :</b> ${ nationality }</div>
    <div class="item"><b>Other Facilities :</b> ${ ticket }</div>
    <div class="item"><b>email :</b> ${ email }</div>
    <div class="item">
        <img src="${ qrImgLink }" alt="QRCode" align="right" class = "qr">
    </div>
    </div>
    <br><hr><br>
    <h4>Validity</h4>
    <br>
    <div class="name">
    <div class="item"><b>Date : ${ visitDate }</b></div>
    <div class="item"><b>Time : 12:00 PM-6:00 PM</b></div>
    </div>
    <br><hr><br>
    <h4>Ticket Type : Adult</h4>
    <br>
    <div class="name">
    <div class="item"><b>Identity Type : ${ proof }</b></div>
    <div class="item"><b>Identity No : ${ proofID }</b></div>
    </div>
    <br><hr><br>
    <div class="ending">
    <h3>Important Information</h3>
    <br><br>
    <ol type="1">
        <li>The e-ticket is not transferable.</li>
        <li>Entry Fee is not refundable.</li>
        <li> E-ticket cancellations are not permitted.</li>
        <li><b>The Monument is open for visitors between sunrise and sunset.</b></li>
        <li>Visitor shall be required to show photo identity proof in original at the entry to the monument.</li>
        <li> Edibles are not allowed inside the monument.</li>
        <li>Inflammable/dangerous/explosive articles are not allowed.</li>
        <li> The entry to the monument will be closed 30 minutes prior to the closing time of the monument. </li>
    </ol>
    <img align="right" src="end.jpg" class="end"> <br><br>
    
    <input type='button' class='btn' id='download' name='download' value='Download' onclick='window.print()' />
    </div>
    </div>
    </div>
    
    </body>
                </html>`;

    let flyWindow = window.open(
    "about:blank",
    "myTicket",
    "width=800,height=800,left=200,top=200"
  );
  flyWindow.document.write(myText);

}