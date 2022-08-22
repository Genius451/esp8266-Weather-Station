# esp8266-Weather-Station
This is a small project, which connects ESP8266 to a MySQL Database. ESP8266 has connected to it the temperature sensor DHT11, which
provides uC with temperature and humidity and post it to a webpage, hosted on your laptop, on localhost, provided by XAMPP application.

# The procedure.

1) ESP8266 is connecting to our web router and is sending POST request to a specific path, which is a php file. This file will receive the request with the data and respond with a code to ESP8266.
2) In the same time, is called another file in order to update the DB.
3) After this, the main page will retrieve this information and post it to main page.
