
<style type="text/css">
$green: rgb(89, 188, 105);
$black: rgb(87, 90, 91);
$light-gray: rgb(162, 181, 185);

* {
  margin: 0;
}

body {
  background-color: #fff;
  color: $black;
  font-family: "Open Sans", Helvetica, Arial, sans-serif;
}

.modal {
  position: relative;
  background-color:#fff;
  box-sizing: border-box;
  width: 90%;
  max-width: 460px;
  margin: 0 auto;
  margin-top: 100px;
  border-radius: 4px;
  padding: 105px 38px 20px 38px;
  text-align: center;
  box-shadow: 0px 1px 5px 0px rgba(0,0,0,0.25);
}

h1 {
  font-size: 37px;
}

.points {
  color: $light-gray;
  font-size: 18px;
}

hr {
  border: none;
  height: 1px;
  background-color: rgb(221, 221, 221);
  margin: 20px auto;
}

.progress {
  margin-top: 20px;
  margin-bottom: 27px;
  
  rect {
    fill: $green;
  }
}

#close-modal {
  position: absolute;
  top: 12px;
  right: 12px;
  width: 11px;
  height: 11px;
  stroke: $black;
  cursor: pointer;
}

#success-icon {
  position: absolute;
  width:  120px;
  height: 120px;
  left: 50%;
  margin-left: -55px;
  top: -5%;
  background-color: $green;
  border-radius: 50%;
  box-sizing: border-box;
  border: solid 5px #48a835;
  box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.3);
  
  div {
    position: absolute;
    top: 34%;
    left: 26%;
    transform: rotate(-45deg);
    border-bottom: solid .8em white;
    border-left: solid .8em white;
    height: 15%;
    width: 33%;
  }
}
</style>
<div class="modal">
  <div>
    <img id="success-icon" src="images/images.png">
  </div>
  <svg id="close-modal" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 10 10">
    <line x1="1" y1="-1" x2="9" y2="11" stroke-width="2.5" />
    <line x1="9" y1="-1" x2="1" y2="11" stroke-width="2.5" />
  </svg>
  <h1 style="color:#0fad00" ><strong>Success!</strong></h1>
  <p class="message">Your Reference Transaction Id is #12345678</p>
  <svg class="progress" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 100 4.5" >
    <rect height="4.5" width="100" rx="2" ry="2" />
  </svg>
   
  <hr>
 
</div>
