<!DOCTYPE html>
<html>
  <head>
      <style> 
          .countdown {
            margin: 0 auto;
            max-width: 350px;
            background: #000;
            font-family: Impact, Charcoal, sans-serif;
            text-align: center;
          }
          .countdown .header {
            color: #c61d1d;
            text-align: center;
            font-weight: normal;
            margin: 5px 0 10px 0;
          }
          .countdown .square {
            display: inline-block;
            padding: 10px;
            margin: 5px;
          }
          .countdown .digits {
            font-size: 24px;
            background: #fff;
            color: #000;
            padding: 20px 10px;
            border-radius: 5px;
          }
          .countdown .text {
            margin-top: 10px;
            color: #ddd;
          }
      </style>
    <title>
      ทดสอบนับเวลาถอยหลัง
    </title>
  </head>
  <body>
    <div class="countdown">
      <h3 class="header">กรุณาทำรายการ</h3>
      <h3 class="header">ภายในระยะเวลาที่กำหนด</h3>
      <div class="square">
        <div class="digits" id="cd-min">00</div>
        <div class="text">นาที</div>
      </div>
      <div class="square">
        <div class="digits" id="cd-sec">00</div>
        <div class="text">วินาที</div>
      </div>

      <div class="">
          <p class="text" id="demo"></p>
      </div>
      <br>
    </div>

    <script>
      var counter = {};
        window.addEventListener("load", function () {
          // COUNTDOWN IN SECONDS
          // EXAMPLE - 5 MINS = 5 X 60 = 300 SECS
          counter.end = 2;

          // Get the containers
          counter.min = document.getElementById("cd-min");
          counter.sec = document.getElementById("cd-sec");

          // Start if not past end date 
          if (counter.end > 0) {
            counter.ticker = setInterval(function(){
              // Stop if passed end time
              counter.end--;

              // Calculate remaining time
              var secs = counter.end;
              var mins  = Math.floor(secs / 60); // 1 min = 60 secs
              secs -= mins * 60;

              if (counter.end <= 0) {
                clearInterval(counter.ticker);
                document.getElementById("demo").innerHTML = "หมดเวลา";
                window.location.href = "{{ url('/') }}";
              }

              // Update HTML
              counter.min.innerHTML = mins;
              counter.sec.innerHTML = secs;
            }, 1000);
          }
        });
    </script> 
     
  </body>

</html>
