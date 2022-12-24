<?php
  header('Content-Type: text/html; charset=utf-8');

 $host = "localhost";
 $user ="root";
 $password ="";
 $bdd ="manifsc";
$conn = mysqli_connect($host,$user,$password,$bdd);
mysqli_select_db ($conn,$bdd) or die('Error ' . $bdd . ' : ' . mysqli_error($conn));
if(!$conn) {

    die('Please check connexion'.mysqli_error());
}
mysqli_query($conn,"SET NAMES UTF8");

?>
<?php

if (isset($_POST['submit'])){
    
$titre=$_POST['titre'];
$acronym=$_POST['acronym'];
$domaine=$_POST['domaine'];
$type=$_POST['type'];
$forme= $_POST['Forme'];
$Date = $_POST['Date'];
$Lieu = $_POST['Lieu'];
$presentation = $_POST['presentation'];
$sql = "INSERT INTO demandspons (`titre`, `acronym`, `domaine`, `type`, `Forme`, `Date`, `Lieu`,`presentation`) 
VALUES ('$titre','$acronym','$domaine','$type','$forme',
'$Date','$Lieu','$presentation')";
$sq =mysqli_query($conn,$sql);

if(!$sq)
{
echo "<div class='alert alert-danger' role='alert'>".mysqli_error($conn)."</div>";
} else {

    echo "<div class='alert alert-info' role='alert'> done </div>";
}
}


?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.csss">
<title> Ajouter une Demande </title>
<!-- multistep form -->
<form id="msform" action="newdemand.php" method="POST">
<!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Informations Générales</li>
    <li>Présentaion</li>
    <li> Details de Personnelles</li>
    <li>Contact</li>
    <li>Financement</li>
    <li>Dossiers</li>

  </ul>
<!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Informations Générales</h2>
    <input type="text" name="titre" placeholder="Titre" />
    <input type="text" name="acronym" placeholder="Acronym" />
    <input type="text" name="domaine" placeholder="Domaine" />
    <select id="type" name="type">
      <option value="" disabled selected>Nationale/Internationale</option>
        <option value="Nationale">Nationale</option>
        <option value="Internationale">Internationale</option>
      </select>      <select id="Forme" name="Forme" required="required">
      <option value="" disabled selected>Forme de participation souhaitée</option>
        <option value="Partenariat">Partenariat  Co-organisation </option>
        <option value="sponsoring">Contribution financière (sponsoring)</option>
      </select>
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>

  <fieldset>
    <h2 class="fs-title"> Présentaion</h2>
    <input type="text" name="Date" placeholder="Date" data-validation="date" data-validation-format="dd/mm/yyyy"/>
    <input type="text" name="Lieu" placeholder="Lieu" />
<textarea name="presentation" id="" cols="30" rows="10"
placeholder="Présentaion"
></textarea>
   <input type="button" name="previous" class="previous action-button" value="Previous" />

    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>

  <fieldset>
    <h2 class="fs-title"> Details de Personnelles</h2>
   

    <input type="text" name="Respondable" placeholder="Respondable" />
    <input type="text" name="presico" placeholder="Président du comité d'organisation" />
   
    <input type="text" name="presics" placeholder="Président du comité scientifique" />

    <input  type="number" min="1" max="9" step="1" placeholder=" Nombre des communicants nationaux" name="nbrcmntn"  />
    <input  type="number" min="1" max="9" step="1" name="nbrpartic" placeholder="Nombre des participants" />
    <input  type="number" min="1" max="9" step="1" name="nbrcmnte" placeholder="Nombre des communicants étrangers" />


    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />


  </fieldset>
  <fieldset>
    <h2 class="fs-title">Contact</h2>
    <input type="text" name="Etablissement" placeholder="Etablissement" />
    <input type="text" name="Laboratoire" placeholder="Laboratoire" />
    <input type="text" name="faculty" placeholder="Faculté" />
    <input type="Tel" name="Telephone" placeholder="Telephone" />
    <input type="email" name="Mail" placeholder="Mail" />
    <input type="text" name="siteweb" placeholder="Site Web" />


    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Financement Estimé</h2>
    <output for="range" class="output"> 0,00 </output>
    <label for="range">
    <input type="range" name="Financement"  min="1" id="range" max="5000000"/>
    </label>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Dossiers</h2>
    
    <ol>
    <li> 
    <div class="col-12">
    <p>Demande signée par le président du comité d’organisation adressée au monsieur le directeur général de l’ATRST</p>
    <div class="col-12">
  <input type="file" name="file1" />
 </div>
   </div>
</li>
<li> 
    <div class="col-12">
    <p>Composition des comités scientifique et d’organisation</p>
    <div class="col-12">
  <input type="file" name="file2"/>
 </div>
   </div>
</li>

<li> 
<div class="col-12">
<p> Programme définitif ou prévisionnel de la manifestation</p>
<div class="col-12">

  <input type="file"  name="file3" />
 </div> </div>
</li>
<li>
<p>Circulaires, dépliants ou tout autre document détaillant l’intérêt et le contenu de la manifestation.</p>
<div class="col-12">
  <input type="file"  name="file4"/>
 </div> </div>
</li>
<li> 

<p>Fiche technique contenant les prévisions financières de la manifestation et la nature et le coût de la subvention demandée.</p>

<div class="col-12">
  <input type="file"  name="file5"/>
 </div> </div>
</li>

</ol>
    

    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset>
</form>




<style>
/*font*/
@import url(https://fonts.googleapis.com/css?family=Montserrat);

/*reset*/
* {margin: 0; padding: 0;}

html {
	height: 100%;
	/*Image only BG fallback*/
	
	/*background = gradient + image pattern combo*/
	background-color: #ffffff; 
		
}

body {
	font-family: montserrat, arial, verdana;
}
li {
    font-size:12px;

}
.value {
  border-bottom: 4px dashed #bdc3c7;
  text-align: center;
  font-weight: bold;
  font-size: 5em;
  width: 300px; 
  height: 100px;
  line-height: 60px;
  margin: 40px auto;
  letter-spacing: -.07em;
  text-shadow: white 2px 2px 2px;
  color: #34495e;

}
.dzzd {
position:relative;
  text-align: center;
  font-weight: bold;
  font-size: 5em;
  width: 300px; 
  height: 100px;
  line-height: 60px;
  margin: 40px auto;
  letter-spacing: -.07em;
  text-shadow: white 2px 2px 2px;
  color: #34495e;

}
input[type="range"] {
    margin-top:120px !important;
    margin-bottom:35px !important;
  display: block;
  -webkit-appearance: none;
  background-color: #bdc3c7;
  width: 300px;
  height: 2px !important;
  border-radius: 5px;
  margin: 0 auto;
  outline: 0;
}
input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none;
  background-color: #e74c3c;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  border: 2px solid white;
  cursor: pointer;
  transition: .3s ease-in-out;
}​
  input[type="range"]::-webkit-slider-thumb:hover {
    background-color: white;
    border: 2px solid #e74c3c;
  }
  input[type="range"]::-webkit-slider-thumb:active {
    transform: scale(1.6);
  }
/*form styles*/
#msform {
	width: 700px;
	margin: 50px auto;
	text-align: center;
	position: relative;
}
#msform fieldset {
	background: white;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	box-sizing: border-box;
	width: 80%;
	margin: 0 10%;
	
	/*stacking fieldsets above each other*/
	position: relative;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
	display: none;
}
/*inputs*/
#msform input, #msform textarea {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}
#msform input[type="number"] {
	padding: 7px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}
select {	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;}
/*buttons*/
#msform .action-button {
	width: 100px;
	background: #49aaf2;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 6px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #22a7f0;
}
/*headings*/
.fs-title {
	font-size: 15px;
	text-transform: uppercase;
	color: #2C3E50;
    margin-bottom: 35px;
    
}
.fs-subtitle {
	font-weight: normal;
	font-size: 13px;
	color: #666;
	margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}
#progressbar li {
	list-style-type: none;
	color: black;
	text-transform: uppercase;
	font-size: 9px;
	width: 16.66%;
	float: left;
	position: relative;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 20px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: gray;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}

#progressbar li.active:before,  #progressbar li.active:after{
	background: #49aaf2;
	color: white;
}

/*progressbar*/

.jq-meter {
  margin: 10px 0px;
  border: 1px solid transparent;
  box-shadow: inset 0 1px 3px rgba(0,0,0,.075);
  background-color: #fCfCfC;
  border-radius: 4px;
  position: relative;
}

.jq-meter .bar {
  width: 0;
  height: 22px;
  background-color: #f9f9f9;
  transition: all ease .5s;
  border-radius: 4px;
}

.jq-meter .bar + span {
  display: none;  
  position: absolute;
  width: 100%;
  text-align: center;
  color: #fff;
  top: 50%;
  left: 0%;
  transform: translate(0%, -50%);
  transition: all ease .5s;
}

.jq-meter.strong .bar + span {
  display: block;
  width: 100%;
  transition: all ease .5s;
}

.jq-meter.medium .bar + span {
  display: block;
  width: 66%;
  transition: all ease .5s;
}

.jq-meter.weak .bar + span {
  display: block;
  width: 33%;
  transition: all ease .5s;
}

.jq-meter.weak .bar {
  width: 33%;
  background-color: #c9302c;
  transition: all ease .5s;
  border-radius: 4px;
}

.jq-meter.medium .bar {
  width: 66%;
  background-color: #ec971f;
  transition: all ease .5s;
  border-radius: 4px;
}

.jq-meter.strong .bar {
  width: 100%;
  background-color: #398439;
  transition: all ease .5s;
  border-radius: 4px;
}


</style>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>


//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
  $("#msform").submit();
  })



$('#range').on("input", function() {
    $('.output').val(this.value +",00  DZD" );
    }).trigger("change");
</script>

<style>


#msform input[type="file"] {
	padding: 10px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 10px;
}
.output {
padding:35px;
text-align: center;
width: 100%;
font-size: 2em;
font-family: 'Advent Pro', sans-serif;
color:  #34495e;
margin-bottom: 150px;
}
</style>