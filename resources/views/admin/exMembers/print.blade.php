<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" /> 
<style> 
@font-face {
    font-family: 'Rachana-Regular';
    src: url({{ storage_path('fonts\mal.ttf') }}) format("truetype");
    font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
    font-style: normal; // use the matching font-style here
}
html {
    font-size: 18px;
} 
body {
 
  margin-left: 50px;
  margin-right: 50px;
}
body, table {
  font-size:20px;
  line-height: 1.2;
 
}
.table td.fit, 
.table th.fit {
    white-space: nowrap;
    width: 1%;
}

.center{
  display: flex;
  align-items: center;
  justify-content: center;
}

.right {
   display: flex;
  justify-content: end;
}

.just{
  font-size:22px;
   line-height: 1.6;
  text-align: justify;
  text-justify: inter-word;
}

</style>
</head>
<body onload="loadPrint()">
<br>
<h4 class="center"> <u> യാത്രാബത്തയ്ക്കുള്ള അപേക്ഷ</u></h4><br>

<table class="table table-borderless table-sm">
    <tbody>
    <tr>
        <td>അപേക്ഷകന്റെ പേര് </td>
        <td>:</td>
        <td> {{ $exMember->name }}</td>
      </tr>
      <tr>
        <td>മേല്‍വിലാസം & <br> ഫോണ്‍ നമ്പര്‍</td>
        <td>:</td>
        <td> {{ $exMember->address }}</td>
      </tr>
      
      <tr>
        <td class='fit'>ബാങ്ക് അക്കൗണ്ട് നമ്പര്‍<br>
        IFSC</td>
        <td>:</td>
        <td></td>
      </tr>
      
    </tbody>
  </table>

<br>
<div class="just" >
&emsp;കേരള നിയമസഭാ  മന്ദിരോദ്‌ഘാടനത്തിന്റെ  രജത ജൂബിലി    ആഘോഷങ്ങളുടെ  ഭാഗമായി 
നിയമസഭാ മന്ദിരത്തിൽ  സംഘടിപ്പിക്കുന്ന പരിപാടിയിൽ (2023, മെയ് 22) പങ്കെടുക്കുന്നതിനായി 
{{ $exMember->place }}, {{ $exMember->district }} മുതൽ നിയമസഭാ സമുച്ചയം, തിരുവനന്തപുരം 
വരെയും തിരിച്ചും   {{ $exMember->distance_total }} കിലോമീറ്റര്‍ യാത്ര ചെയ്ത ഇനത്തില്‍ അര്‍ഹമായ യാത്രാബത്തയും അനുബന്ധ ചെലവുകളും
 അനുവദിച്ചു നല്‍കണമെന്ന് താല്പര്യപ്പെടുന്നു.
    </div>
    <br> <br>
    <div class="right" >
ഒപ്പ് :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<br>   <br>                
തീയതി : 22/05/2023 <br>                   
</div>

<hr>
<br>
<div class="center"><b>For Office Use</b></div> <br>

<table class="table table-borderless table-sm">
    <tbody>
    <tr>
        <td width="30%">Journey From</td>
        
        <td class="text-md-left">:  {{ $exMember->place }}, {{ $exMember->district }} </td>
        <td></td>
      </tr>
      <tr>
        <td>Distance</td>
        
        <td  class="text-md-left">:  {{ $exMember->distance_total }} KM</td>
      </tr>
      
      <tr>
        <td>TA (up and down)</td>
        
        <td class="text-md-left">: ₹ {{ (int) $exMember->ta_eligible }} </td>
      </tr>
      <tr>
        <td>Honorarium</td>
        
        <td class="text-md-left">: ₹ {{(int) $exMember->honorarium }}</td>
      </tr>
      <tr>
        <td>Total</td>
        
        <td class="text-md-left">: ₹ {{ (int) $exMember->amount_payable}}</td>
      </tr>
      <tr>
        <td>TA & Honorarium Sanctioned</td>
        
        <td class="text-md-left">: ₹ {{ (int) $exMember->amount_payable}}</td>
      </tr>
    </tbody>
  </table>

<br>
<br>
<div> Name and Designation of the sanctioning authority                   
<span class="right" >Finance Officer</span></div>
<hr>
<br>
Received  ₹ <b>{{ (int) $exMember->amount_payable}}</b>/-  ({{ $exMember->amount_words}}) as TA and Honorarium.<br><br>

Name and Signature of dignitary
</body>
<script>
function loadPrint() {
    window.print();
   // setTimeout(function () { window.close(); }, 500);
}

window.onafterprint = function(e){
      window.close()
    };

</script>
</html
