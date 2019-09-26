<?php 
session_start();
if (empty($_SESSION['Csrf-token'])) {
    $_SESSION['Csrf-token'] = bin2hex(random_bytes(32));
}
?>
<html>
    <head> <meta charset="UTF-8">
            <meta name="csrf-token" content="<?= $_SESSION['Csrf-token'] ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script src="https://kit.fontawesome.com/fbecc64c67.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
            <script type='text/javascript' src='index.js'></script>
            
            <title>Elixxirio</title>
           <style>
                body, html {
                    height: 100%;
                    margin: 0;
                   
                }
                body { padding-top: 40px; }
                @media screen and (max-width: 768px) {
                body { padding-top: 0px; }
}
                .parallaxheader{
                    position: relative;
                    overflow:hidden;
                    background-attachment: fixed;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover; 
                   
                   
                }
                .overlay {
                    position: relative;
                    overflow:hidden;
                    background-color: #131d138f;
                    min-height: 400px;
                    z-index:1;
                    width:100%;
                }
                .img1{
                    background-image: url('berries-black-blurred-background-975231 (1).jpg');
                    min-height: 400px;
                    
                }
                .img2{
                    background-image: url('apple-blur-branch-257840 (1).jpg');
                    min-height: 100px;
                }
                .header {
                   
                    position:absolute;
                   
                    width:100%;
                    text-align:center;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%,-50%);
                    -ms-transform: translate(-50%,-50%);
                    font-size:3vh;
                    font-family: Arial, Helvetica, sans-serif;
                    z-index: 2;
                    vertical-align: top;
                }
                .topnav {
                    overflow: hidden;
                    position: fixed;
                    top: 0;
                    width: 100%;
                    float:right;
                    z-index: 10;
                    }
                .topnav a {
                    float: right;
                    display: block;
                    color: #f2f2f2;
                    text-align:center;
                    padding: 20px;
                    text-decoration: none;
                    font-size: 2vw;
                    font-family: Arial, Helvetica, sans-serif;
                }   
                .footer{
                    bottom:0;
                    width:100%;
                    height:70px;
                    background-color:black;
                    min-height: 1px;
                    display:flex;
                    color:#fff;
                    align-items: center;
                    justify-content:center;
                }
                .intro{
                    background-color:#131d13;
                    text-align:center;
                    padding:50px;
                    color: #fff;
                    overflow:auto;
                    
                }
                .intro h1{
                    text-align:center;
                    font-size:3vh;
                    font-family: Arial, Helvetica, sans-serif;
                    color: #fff;
                }
                .c {
                    vertical-align: top;
                    
                    text-align: left;
                    font-size:5vh;
                    color: #fff;
                }
                h1 span{
                    
                   padding:50px;
                   font-size: 10vh;
                   
                }
                h1 {
                    padding-top: 20px;
                    font-size: 5vw;
                    color: #fff;
                }
                .productsarea{
                    background-color:#131d13;
                    text-align:center;
                    padding:50px;
                    color:#fff;
                    font-family: Arial, Helvetica, sans-serif;
                    overflow:auto;

                }
                .exparea{
                    background-color:#131d13;
                    text-align:left;
                    padding:50px;
                    color:#fff;
                    font-family: Arial, Helvetica, sans-serif;
                    display:none;
                }
                .column1{
                    background-color:#131d13;
                    
                    width:25%;
                    float:left;
                    padding:5px;
                    display:flex;
                }
                .pbox{
                    padding:16px;
                    background-color: #283d28;
                    text-align: center;
                    color:#fff;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 50px;
                   
                }
                .pbox:hover{
                    background-color:#3d5f3d;
                }
                .pbox i{
                    font-size:50px;
                }
                * {
  box-sizing: border-box;
}
                .gridcontainer{
                    
                    overflow:hidden;
                    margin:0px;
                }
                
                .carouselcontainer{
                    overflow: hidden;
                    min-height: 1px;
                    display:flex;
                }
                .textcontainer{
                    float:left;
                    width:50%;
                }
                .contactformcontainer{
    
    
    width: 50%;
    height: 730px;
    max-height: 730px;
    overflow:hidden;
    background-color: #f2f2f2;
   
}
.form{
    display:block;
    height: 730px;
    max-height: 730px;
    color:#fff;
    background-color: #131d13;
    padding: 50px 20px 20px 20px;
    font-family: Arial, Helvetica, sans-serif;
    
}
input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    font-family: Arial, Helvetica, sans-serif;
    color: #000000;
    
  }
  
  input[type=submit] {
    background-color: rgb(59, 100, 61);
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float:right;
  }
  
  input[type=submit]:hover {
    background-color:  #446944;
  }
  .column{
      width:50%;
      float:left;
      overflow:hidden'
  }
  .explore {
      text-align:center;
      
     
  }
  .explore a {
      text-decoration:none;
      color: white;
  }
  .contactinfo{
      display: inline-block;
      background-color: #131d13;
      height:730px;
      font-size:3vw;
      font-family: Arial, Helvetica, sans-serif;
      color:#fff;
      text-align:left;
      }
    .cf{
        padding:20px 20px 50px 50px;
        text-align:left;
        top: 50%;
        left: 0;
                    
    }
    .errmessage{
        display:none;
        text-align:center;
        color:#fff;
    }
    .iconline i{
        float:left;
        padding-right:20px;
        padding-top: 50px;
    }
  
  @media screen and (max-width: 600px) {
      .column{
          width:100%;
          display:block;
      }
      .column1{
          width:100%;
          display:block;
      }
      #cf1{
          height:50%;
      }
      h1 {
          padding-top:20px;
                    font-size: 10vw;
                    color: #fff;
                }
      
      
  }
           </style>
           <body>
               <nav class ="navbar navbar-inverse navbar-fixed-top">
                   <div class ="container-fluid">
                       <div class = "navbar-header">
                           <button type="button" class = "navbar-toggle" data-toggle="collapse"
                           data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>   
                           </button>
                           <a class="navbar-brand" href="index.php#eintro">Elixxirio</a>
                       </div>
                       <div class = "collapse navbar-collapse" id="myNavbar">
                           <ul class="nav navbar-nav navbar-right">
                                <li><a href="index.php#eintro">About</a></li>
                               <li><a href="index.php#products">Our Products</a></li>
                               <li><a href="index.php#methods">Our Methods</a></li>
                               
                               <li><a href="index.php#contactsection">Contact us</a></li>
                           </ul>
                       </div>
                   </div>
                   <div class= "errmessage">
                  <p id = "p1"></p>
                  
                </div>
               </nav>
                
                <section id="eintro">
                
                      <div class="parallaxheader img1">
                    <div class="overlay"></div>
                        <div class="header">
                            <h1><span>Elixxirio</span></h1>
                        </div>
                    </div>
                    
                    <div class ="intro">
                    <div class="column1"></div>
                    <div class="column">
                        <h1>Who are we?</h1>
                       <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. 
                    Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, 
                    risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.</p>

</div>
<div class="column1"></div>
                    </div>
                </section>
                <section id="products">
        <div class="parallaxheader img2">
                <div class="overlay"></div>
            <div class="header">
                <h1><span>Our Products</span></h1>
            </div>
        </div>
        
        <div class="productsarea">
        <div class="column1"></div>
        <div class="column">
               <h3>We offer a range of products</h3> 
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. 
                    Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, 
                    risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. 
                    Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, 
                    risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.</p>
</div>
<div class="column1"></div>
            </div>
            <div class="carouselcontainer">
                        <div class="column1"></div>
                <div id="myCarousel" class="carousel slide lazy-load" data-ride="carousel">
                <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="bowl-can-cloth-531996.jpg" alt="Extract">
      <div class="carousel-caption">
        <h3>Extract</h3>
        <p>Done in this way</p>
      </div>
    </div>

    <div class="item">
      <img src="aroma-care-close-up-725998.jpg" alt="Chicago">
      <div class="carousel-caption">
        <h3>Extract</h3>
        <p>Done in this way</p>
      </div>
    </div>

    <div class="item">
      <img src="bottle-color-container-1414693.jpg" alt="Chicago">
      <div class="carousel-caption">
        <h3>Extract</h3>
        <p>Done in this way</p>
      </div>
    </div>

    <div class="item">
      <img src="aromatherapy-aromatic-bottle-932577.jpg" alt="New York">
      <div class="carousel-caption">
        <h3>Extract</h3>
        <p>Done in this way</p>
      </div>
    </div>
    <div class="item">
      <img src="cup-drink-flowers-1638280.jpg" alt="New York">
      <div class="carousel-caption">
        <h3>Extract</h3>
        <p>Done in this way</p>
      </div>
    </div>
  </div>
  

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
                </div>
                <script>
                    $(function() {
                        $('.carousel.lazy-load').bind('slide.bs.carousel', function (e) {
                            var image = $(e.relatedTarget).find('img[data-src]');
                            image.attr('src', image.data('src'));
                            image.removeAttr('data-src');
                        });
                    });
                    </script>
                <div class="column1"></div>
                </div>
           
                 <div class="productsarea">
                 <div class = "explore"><a href = "productsv3.html"><h3>Explore our range</h3></a> </div>
               
               
            </div>
                </section>
                <section id="methods">
            <div class="parallaxheader img1">
                    <div class="overlay"></div>
                    <div class="header">
                    <h1><span>Our Methods </span></h1>
                    </div>
                </div>
            <div class="productsarea">
            <div class="column1"></div>
            <div class="column">
                    <h3>We offer a range of products</h3> 
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. 
                         Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, 
                         risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. 
                         Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, 
                         risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.</p>
                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. 
                                Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, 
                                risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. 
                                Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, 
                                risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. 
                                        Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, 
                                        risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pretium urna. 
                                        Vivamus venenatis velit nec neque ultricies, eget elementum magna tristique. Quisque vehicula, 
                                        risus eget aliquam placerat, purus leo tincidunt eros, eget luctus quam orci in velit. Praesent scelerisque tortor sed accumsan convallis.</p>
                </div>
                                        <div class="column1"></div>              
                 </div>
                 
                </section>
                <section id="contactsection">
                    <div class="c parallaxheader img2">
                        <div class="overlay"></div>
                        <div class= "header">
                                <h1><span>Contact</span></h1>
                                <h1><span>Us</span></h1>
                        </div>
                       
                    </div>
                    
                    <div class="contactinfo column" id="cf1">
                        <div class="cf">
                        <h1>We'd love</h1> 
                        <h1>to hear from you.</h1>
                        <div class="iconline">
                        <i class='fab fa-facebook-square' style='font-size:48px;color:#fff'></i>
                        <i class='fab fa-instagram' style='font-size:48px;color:#fff'></i>
                    </div>
                    </div>
                    </div>
                    
                            <div class ="contactformcontainer column" id ="cfc">
                                    <div class="form">
                                    
                                    <form id='aform' onsubmit="return foo()">
                                      <label for="fname">First Name</label>
                                      <input type="text" id="fname" name="fname" placeholder="Your name.." maxlength="255">
                                      <label for="lname">Last Name</label>
                                      <input type="text" id="lname" name="name" placeholder="Your last name.." maxlength="255">
                                     
                                      <label for="email">Email</label>
                                      <input type="text" id="em" name="em" placeholder="Your email" maxlength="255">
                                      <label for ="reason">Why are you reaching out?</label>
                                      <select id="reason" name="reason">
                                        <option>I'm interested in your products</option>
                                        <option>I have a question</option>
                                        <option>I have feedback for your products</option>
                                        <option>Other</option>
                                      </select>
                                      <label for="subject">Subject</label>
                                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" cols="30" rows="8"></textarea>
                                
                                    <input type="submit" value="Submit">
                                    </form>
                                  </div>
                   
                    </div>
                </section>
                    <div class="footer">
                         <p>Made by Corvid - Trouble with the website? Contact:Email</p>   
                         </div>
           </body>
</html>