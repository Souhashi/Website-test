$(document).ready(function(){
  $(".pbox").click(function(){
    
    $(".exparea").slideDown("slow");
  });
  $(".exparea").click(function(){
    $(".exparea").slideUp("slow");
    document.getElementById("ph").innerHTML="";
        document.getElementById("pe").innerHTML="";
  });
  $("#aform").submit(function(e){
    e.preventDefault();
  });
  $(".errmessage").click(function(){
    $(".errmessage").slideUp("slow");
  });
});

function getErrbox(text){
  $(".errmessage").children("#p1").text(text);
    $(".errmessage").slideDown("slow");
    $(".errmessage").delay(2000).slideUp("slow");
}

function foo() {
  var emreg = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
  var name = $("#fname").val();
  if (name.trim() === ""){
    getErrbox("Please enter a name");
    $("#fname").focus();
    return false;
  }
  if (name !== ""){
    if(!(/^[A-Za-z]+$/.test(name))){
     getErrbox("Please enter a valid name");
      $("#fname").focus();
      return false;
    }
  }

 
  var surname = $("#lname").val();
  if (surname !== ""){
    if(!(/^[A-Za-z]+$/.test(surname))){
      getErrbox("Please enter a valid surname");
      $("#lname").focus();
      return false;
    }
  }
  var email = $("#em").val();
  if (email.trim() === ""){
    getErrbox("Please enter an email");
    $("#em").focus();
    return false;
  }
  if (email !== ""){
    if(!(emreg.test(email))){
      getErrbox("Email is not valid");
      $("#em").focus();
      return false;
    }
  }

  var reason = $("#reason").val();
  var subject = $("#subject").val();
  if (subject.trim() === ""){
    getErrbox("Please enter an email");
    $("#subject").focus();
    return false;
  }
  if (subject !== ""){
    if(!(/[A-Za-z0-9 _.,!\"\'\/$]+/.test(subject))){
      getErrbox("Subject text is not valid");
      $("#subject").focus();
      return false;
    }
  }
  
  console.log(name);
 
  $.ajax({
    url:"mailerjs.php", 
    type: "POST", 
    data: {name: name, surname: surname, email:email, reason: reason, subject: subject},
    headers : {
      'CsrfToken': $('meta[name="csrf-token"]').attr('content')},
    success:function(result){
     getErrbox(result['error']);
     $("#aform")[0].reset();
   }
 });
 return true;
}

 
