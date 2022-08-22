#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#include "DHT.h"  


#define SERVER_IP "http://<YOUR IVP4 IP>/web/db_functionality/process.php"
#define STASSID "WiFi NAME"
#define STAPSK  "WiFi PASSWORD"



#define DHTTYPE DHT11   // DHT 11
#define dht_dpin 0      // Pin D3
DHT dht(dht_dpin, DHTTYPE); 

void setup() {

  Serial.begin(115200);
  dht.begin();

  WiFi.begin(STASSID, STAPSK);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected! IP address: ");
  Serial.println(WiFi.localIP());

}

void loop() {
  // wait for WiFi connection
  DynamicJsonDocument doc(100);
  int h = dht.readHumidity();
  int t = dht.readTemperature(); 

  doc["temperature"] = t;
  doc["humidity"] = h;

  char toSend[128];
  //serializeJson(doc, toSend);
  serializeJson(doc,toSend);
  Serial.println("");
  
  if ((WiFi.status() == WL_CONNECTED)) {

    WiFiClient client;
    HTTPClient http;

    Serial.print("[HTTP] begin...\n");
    // configure traged server and url
    http.begin(client, SERVER_IP); //HTTP
    http.addHeader("Content-Type", "application/json");

    Serial.print("[HTTP] POST...\n");
    // start connection and send HTTP header and body
    int httpCode = http.POST(toSend);

    // httpCode will be negative on error
    if (httpCode > 0) {
      // HTTP header has been send and Server response header has been handled
      Serial.printf("[HTTP] POST... code: %d\n", httpCode);

      // file found at server
      if (httpCode == HTTP_CODE_OK) {
        const String& payload = http.getString();
        Serial.println("received payload:\n<<");
        Serial.println(payload);
        Serial.println(">>");
      }
    } else {
      Serial.printf("[HTTP] POST... failed, error: %s\n", http.errorToString(httpCode).c_str());
    }

    http.end();
  }

 
  delay(8000);

}
