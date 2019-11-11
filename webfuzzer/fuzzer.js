var host = "127.0.0.1";

var webdriver = require('selenium-webdriver'),
    By = webdriver.By,
    until = webdriver.until;

var firefox = require('selenium-webdriver/firefox');

var options = new firefox.Options();
options.addArguments("-headless");

var driver = new webdriver.Builder()
    .forBrowser('firefox')
    .setFirefoxOptions(options)
    .build();

// read in wordlist & fuzz
const fs = require('fs')
const content = fs.readFileSync("IntrudersXSS.txt", "utf8")
if (content) {
  lines = content.split("\n");
  for (var i = 0, len = lines.length; i < len; i++) {
      let payload = lines[i];
      var url = "http://"+host+":9090/index.php?search=" + payload;
      driver.get(url);
      driver.getTitle().then(function() {
          console.log("Testing: " + payload)
      }).catch(function(e) {
          console.log("FOUND XSS: " + payload);
          process.exit()
      });
  }
}

driver.quit();
