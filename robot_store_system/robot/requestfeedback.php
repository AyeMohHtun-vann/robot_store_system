<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Feedback</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  body
  {
    background-color: #f5d6c6;
  }
  .radioLeft
  {
    font-size: 15px;
  }
  p
  {
    color: #0033cc;
    font-size: 20px;
  }
  .modal-content
  {
    background-color:  #f5d6c6;
  }
  .modal-title
  {
    color: #0033cc;
  }
  </style>
</head>
<body>

<div class="container">
  
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Feedback Form
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title">Customer Feedback</h3>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" action="./admin/customersurvey/receiveInput.php">


    <p> Which Product are you using? </p>

<input type="radio" name="answer1" value="Medical Robot">Medical Robot</label>
                                <label class="radioLeft"><input type="radio" name="answer1" value="Domestic Robot">Domestic Robot
                               

                                  <label class="radioLeft"><input type="radio" name="answer1" value="Agricultural Robot">Agricultural Robot

                                  <label class="radioLeft"><input type="radio" name="answer1" value="Military Robot">Military Robot
                                  <label class="radioLeft"><input type="radio" name="answer1" value="Companion Robot">Companion Robot
                                  <label class="radioLeft"><input type="radio" name="answer1" value="Industrial Robot">Industrail Robot
                                  <label class="radioLeft"><input type="radio" name="answer1" value="Other Categories">Other categories of Robot</label>
                                  


    <p>For how long have you been using our product / service?</p>

<input type="radio" name="answer2" value="Less than a month">Less than a month
                        <label class="radioLeft"><input type="radio" name="answer2" value="1-12 months" >1-12 months
                                <label class="radioLeft"><input type="radio" name="answer2" value="1-3 years" >1-3 years
                          <label class="radioLeft"><input type="radio" name="answer2" value="Over 3 years" >Over 3 years

                                  <label class="radioLeft"><input type="radio" name="answer2" value="Haven't used it yet" >Haven't used it yet




    <p>How satisfied are you with the product / service?</p>
<div><input type="radio" name="answer3" value="Very Satistified"><label class="radioLeft">Very Satistified</label></div>
                             <div>   <input type="radio" name="answer3" value="Satistified"><label class="radioLeft">Satistified</label></div>
                                 <div><input type="radio" name="answer3" value="Netural"> <label class="radioLeft">Netural</label></div>
                                 <div> <input type="radio" name="answer3" value="Unsatisfied"><label class="radioLeft">Unsatisfied</label></div>
                                  <div><input type="radio" name="answer3" value="Very unsatisfied"><label class="radioLeft">Very unsatisfied</label></div>
    
    <p>Which impressed you most about the product/ service ?</p>
<label class="radioLeft"><input type="radio" name="answer4" value="Quality">Quality
                                  <label class="radioLeft"><input type="radio" name="answer4" value="Price">Price
                                  <label class="radioLeft"><input type="radio" name="answer4" value="Shopping Experience">Shopping Experience
                                  <label class="radioLeft"><input type="radio" name="answer4" value="First Use Experience">First Use Experience
                                  <label class="radioLeft"><input type="radio" name="answer4" value="Usability">Usability
                                  <label class="radioLeft"><input type="radio" name="answer4" value="Customer Surveice">Customer Surveice
    

    <p>What disappointed you most about the product / service ?</p>
<label class="radioLeft"><input type="radio" name="answer5" value="Quality">Quality</label>
                                  <label class="radioLeft"><input type="radio" name="answer5" value="Price">Price</label>
                                  <label class="radioLeft"><input type="radio" name="answer5" value="Shopping Experience">Shopping Experience</label>
                                  <label class="radioLeft"><input type="radio" name="answer5" value="First Use Experience">First Use Experience</label>
                                  <label class="radioLeft"><input type="radio" name="answer5" value="Usability">Usability</label>
                                  <label class="radioLeft"><input type="radio" name="answer5" value="Customer Surveice">Customer Surveice</label>

    <p>Would you use our product / service in the future?</p><input type="radio" name="answer6" value="Definitely">Definitely
                                  <label class="radioLeft"><input type="radio" name="answer6" value="Probably">Probably
                                  <label class="radioLeft"><input type="radio" name="answer6" value="Not Sure">Not Sure
                                  <label class="radioLeft"><input type="radio" name="answer6" value="Probably Not">Probably Not
                                  <label class="radioLeft"><input type="radio" name="answer6" value="Definitely Not">Definitely Not
                                  
    <p>Please Rate the product?</p>
 <label class="radioLeft"><input type="radio" name="answer7" value="Very Satisfied">Very Satisfied
                                  <label class="radioLeft"><input type="radio" name="answer7" value="Probably">Satisfied
                                  <label class="radioLeft"><input type="radio" name="answer7" value="Not Sure">Neutral
                                  <label class="radioLeft"><input type="radio" name="answer7" value="Probably Not">Unsatisfied
                                  <label class="radioLeft"><input type="radio" name="answer7" value="Definitely Not">Very Unsatisfied
    
    <p>Compared to similar products offered by other companies, how do you consider our product?</p>
                                  <label class="radioLeft"><input type="radio" name="answer8" value="Much Better">Much Better
                                  <label class="radioLeft"><input type="radio" name="answer8" value="Somewhat Better">Somewhat Better
                                  <label class="radioLeft"><input type="radio" name="answer8" value="About the same">About the same
                                  <label class="radioLeft"><input type="radio" name="answer8" value="Much Worse">Much Worse
                                  <label class="radioLeft"><input type="radio" name="answer8" value="Somewhat Worse">Somewhat Worse
                                  <label class="radioLeft"><input type="radio" name="answer8" value="Don't know">Don't know
                          
    <p>Any Comments</p><textarea rows = "5" cols = "50" name = "des1"></textarea>
    


<input type="text" name="name" placeholder="Name"> <br>
<input type="email" placeholder="email" name="email"> <br>
    
    <input type="submit" value="submit">

    </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

</body>
</html>

