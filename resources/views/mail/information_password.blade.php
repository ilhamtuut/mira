<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Information</title>
    <style type="text/css">
		body,td,div,p,a,input {font-family: arial, sans-serif;}
	</style>
</head>
<body style="margin: 0; padding: 0;">
	<table align="center" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #eee;" bgcolor="#031728">
 		<tr>
  			<td align="center" style="padding: 20px 0 30px 0; border-bottom: 5px solid #eee;">
 				<img src="{{asset('images/logo/mira.png')}}" alt="logo" style="display: block; height: 100px;"/>
			</td>
 		</tr>
 		<tr>
  			<td bgcolor="#ffffff" style="padding: 30px 20px 30px 20px; color: #000; font-size: 12px; line-height: 20px; border-bottom: 5px solid #eee;">
				Welcome Mr/Mrs. {{ucfirst($user->name)}}, <br>
				Your registration is success, this is your data : <br>
				Username : {{ucfirst($user->username)}} <br>
				Login Password : {{$pass->password}}<br>
				<br>Note : Please login with your data for make a transaction. <br>
				<br>Best regards! <br> {{ config('app.name') }} Team
  			</td>
 		</tr>
 		<tr>
  			<td style="font-family: Arial, sans-serif; font-size: 12px;">
  				<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
				  <td>
		           <p style="text-align: center;">{{ config('app.name') }}. &copy; {{date('Y')}} All rights reserved.</p>
		          </td>
				</tr>
				</table>
  			</td>
 		</tr>
	</table>
</body>
</html>