//express builds app
var app = require('express')();
//http communications
var http = require('http').Server(app);
//websockets, on establised http listener
var io = require('socket.io')(http);

var users = [];
var messagelogs = [];

//response for get response for applet
app.get('/', function(req, res){
  res.sendFile(__dirname + '/chat.html');
});

//handle all  connections, and what happens
io.on('connection', function(socket){

  socket.on('fresh', function(name){
    socket.emit('message','Server',"WelcomeBro");
    socket.emit('messageHistory', {data:messagelogs});
    
     //send message to all connected machines
    
    io.emit('message', name, "Has Joined The Chat");
     var tmp = {user:name, message: "Has Joined The Chat"};
     messagelogs.push(tmp);
    users.push(name);

    tmp = {numUsers:users.length, numMsgs:messagelogs.length};
     io.emit('roomInfo', {data:tmp});
  });

   // when a connected machine sends a message
  socket.on('message', function(name,msg){
  	 //send message to all connected machines
    io.emit('message', name,msg);
    
    var tmp = {user:name, message: msg};
    messagelogs.push(tmp);

    tmp = {numUsers:users.length, numMsgs:messagelogs.length};
    io.emit('roomInfo', {data:tmp});
  });
});

//listen on microsft azure ports
http.listen((process.env.PORT || 8080), function(){
});