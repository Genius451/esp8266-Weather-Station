<!DOCTYPE HTML PUBLIC>
<html>
<head>
    <title>ESP8266 Weather Station</title>
    <link rel="icon" type="image/x-icon" href="ficon.png">
    <script src="https://kit.fontawesome.com/95739970ef.js" crossorigin="anonymous"></script>
    <script src="script/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style/pageStyle.css">       
</head>
<body>

<h1 class="value">ESP8266 Weather Station</h1>

   <div class="valueHolder">
        <table class="tableVal">
            <tr>
                <td>
                    <div class="temperatureHolder"> 
                        <p class="value"><i class="fa-solid fa-temperature-full"></i>Temperature </p>
                    </div>
                </td>
                
                <td>
                    <div class="humidityHolder"> 
                        <p class="value"> <i class="fa-solid fa-faucet"></i>Humidity </p> 
                    </div>
                </td>

            </tr>

            <tr>
                <td>
                    <div class="temperatureHolder">
                        <p class="value" id="temperature"> - </p>
                    </div>
                </td>

                
                <td>
                    <div class="humidityHolder"> 
                        <p class="value" id="humidity"> - </p> 
                    </div>
                </td>

            </tr>

            <tr>
                <td colspan="2">
                     <div class="dateTimeHolder">
                         <p class="value"> <i class="fa-solid fa-calendar-days"></i> Date&time </p> 
                    </div>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                     <div class="dateTimeHolder">
                         <p class="value" id="date"> - </p> 
                    </div>
                </td>
            </tr>
        </table>
   </div>
</body>
</html>

