"use strict";
const express = require('express');
const http = require('http');
const fs = require('fs');

const app = express();
const port = 8000;
http.createServer(app).listen(port);

app.get('/',function(req, res) {
	let response = 'My first Node.js App';
	console.log('wow ok am here');
	console.log(response);
	res.send(response);
});