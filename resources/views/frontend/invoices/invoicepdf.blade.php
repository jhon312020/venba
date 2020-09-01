<!DOCTYPE HTML>
<html lang = "en">
	<head>
  	<meta charset = "UTF-8" />
  	<style>
			.orders {
  			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  			border-collapse: collapse;
  			width: 100%;
			}
			.orders td, .orders th {
  			border: 1px solid #ddd;
  			padding: 8px;
			}
			.orders tr:nth-child(even) {
				background-color: #f2f2f2;
			}
			.orders tr:hover {
				background-color: #ddd;
			}
			.orders th {
  			padding-top: 12px;
  			padding-bottom: 12px;
  			text-align: left;
  			background-color: #4CAF50;
  			color: white;
			}
			.rate {
  			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  			border-collapse: collapse;
  			width: 100%;
			}
			.rate td, .rate th {
  			border: 1px solid #ddd;
  			padding: 8px;
  			text-align: right;
			}
		</style>
	</head>
	<body>
  	<table style="width: 100%;">
    	<tr>
      	<td style="vertical-align: top;">
        	<h2> {{ __('INVOICE QUOTATION') }} <br/></h2>
      	</td>
      	<td>
      	 	@php
            $image = public_path('frontend/images/logo.jpg');
            $imageData = base64_encode(file_get_contents($image));
            $src = 'data:jpg;base64,'.$imageData;
          @endphp
        <img src="{{$src}}" style="width: 226px; height: 55px;"  >  
      	</td>
      	<td style="text-align: left;font-size:11px;font-weight: bold;width:180px; " >
        	<strong>Registered Office</strong><br/>
          	27, 1st floor,<br/>
          	Shafee Mohammad road<br/>
          	Nungambakkam, Chennai 600 006.<br/><br/>
          	+91 (44) 28290898 <br/>
          	reachme@venbahomeautomation.in
        </td>
    	</tr>
  </table>
  <br>
  <table   class="orders">
  	<tr>
  		<th>S.NO</th>
  		<th>Product Name</th>
  		<th>Quantity</th>
  		<th>Price</th>
  	</tr>
  	@php
  		$i =1;
  	@endphp
  		@foreach($cart as $item)
  		<tr>
  		<td>{{$i}}</td>
  		<td>{{$item['name']}}</td>
  		<td>{{$item['quantity']}}</td>
  		<td>{{$item['price']}}</td>
  	</tr>
  	@php
  	$i++;
  	@endphp
  		@endforeach
  	
  </table>
  	<table style="width: 100%;" class="rate">
  	  <tr>
        <td style="border:none;" width="81%" ><span class="float-right ">Total</span></td>
        <td class="bold_text">
          <span class="float-right ">              
            {{Session::get('producttotal')}}</span></td>
      </tr>
      <tr>
        <td style="border:none;" width="81%" ><span class="float-right ">IGST</span></td>
        <td class="bold_text">
          <span class="float-right ">              
            {{Session::get('igst')}}</span></td>
      </tr>
      <tr>
        <td style="border:none;" width="81%" ><span class="float-right ">SGST</span></td>
        <td class="bold_text">
          <span class="float-right ">              
            {{Session::get('sgst')}}</span></td>
      </tr>
      <tr>
        <td style="border:none;" width="81%" ><span class="float-right ">Transit</span></td>
        <td class="bold_text">
          <span class="float-right ">              
            {{Session::get('transit')}}</span></td>
      </tr>
      <tr>
        <td style="border:none;" width="81%" ><span class="float-right ">Grand Total</span></td>
        <td class="bold_text">
          <span class="float-right ">              
            Rs.{{Session::get('total')}}</span></td>
      </tr>
 		</table>	
	</body>
</html>