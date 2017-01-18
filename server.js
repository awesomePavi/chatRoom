//express builds app
var app = require('express')();
//http communications
var http = require('http').Server(app);
//websockets, on establised http listener
var io = require('socket.io')(http);

//response for get response for applet
app.get('/', function(req, res){
  res.sendFile(__dirname + '/chat.html');
});

//handle all  connections, and what happens
io.on('connection', function(socket){
	// when a connected machine sends a message
  socket.on('message', function(name,msg){
  	//send message to all connected machines
    io.emit('message', name,msg);
  });
});

//listen on microsft azure ports
http.listen((process.env.PORT || 8080), function(){
});