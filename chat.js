
	//Global Varaibles
	var colorName = {Server:"#FF0000"};
	var username = "Undefined"; 
	//get socket information
 var socket = io('http://chatpavipath.azurewebsites.net:80');

 function addListeners(){
   document.getElementById('enterUserName').addEventListener('keypress',checkEnter(event,check));
 }



 function checkEnter(event,func) {
  if(event && event.keyCode == 13) {
   func();
 }
}

function check(){
  var choice = $('#enterUserName').val();
  if (choice.length > 1 && choice.length < 16) {
   username = choice;
   document.getElementById('loginPage').style.display = "none";
   contactServer();
 }else if(choice.length <= 1){
   $('#nameERR').text("Min 2 Letters");
 }else if(choice.length >= 16){
  $('#nameERR').text("Max 15 Letters");
}else{
  $('#nameERR').text("Try Again");
}
}

function send(){
  var msg = $('#sendMSG').val();
  if (msg.length < 1){
   alert("No message to send");
 }else{
    		//send message via socket
    		socket.emit('message', username ,msg);
    		$('#sendMSG').val('');
    		$('#sendMSG').focus();
    		return false;
    	}
    }



	//Dipslay Message
	function dispMsg(nme, msg){
     	//if new user
     	if(!colorName[nme]) {
        colorName[nme] =  "#"+((1<<24)*Math.random()|0).toString(16);
      }

      var holder = document.createElement("p");
      var name = document.createElement("a");
      name.style.color = colorName[nme];
      name.style.width = "10%";
      if (nme == username){
        name.innerHTML = "YOU";
      }else{
        name.innerHTML = nme;
      }
      holder.innerHTML = "<a style='color: "+colorName[nme]+"'>"+nme+"</a> : "+ msg;

      $("#dispMsgs").prepend(holder);
    }

    //on message recieve
    socket.on('message', function(name,msg){
    	dispMsg(name,msg);
    });

    //on roominfo recived
    socket.on('roomInfo', function(data){
      console.log(data);
      $('#numUsers').text(data['data']['numUsers']);
      $('#numMsgs').text(data['data']['numMsgs']);
    });

    // on message history recieved
    socket.on('messageHistory', function(history){
      messageHistory = history['data'];
      for(var i =0; i < messageHistory.length; i++){
        dispMsg(messageHistory[i]['user'],messageHistory[i]['message']);
      }
    });

    function contactServer(){	
      socket.emit('fresh',username);
    }