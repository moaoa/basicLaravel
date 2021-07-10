const http = require("http");

const options = {
  "method": "POST",
  "hostname": "localhost",
  "port": "8000",
  "path": "/api/add",
  "headers": {
    "user-agent": "vscode-restclient",
    "content-type": "application/json"
  }
};

const req = http.request(options, function (res) {
  const chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function () {
    const body = Buffer.concat(chunks);
    console.log(body.toString());
  });
});

req.write(JSON.stringify({name: 'moaad', email: 'moaad@gamile.com', address: 'tripoli'}));
req.end();
