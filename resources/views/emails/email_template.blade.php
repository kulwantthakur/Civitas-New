@component('mail::message')
	<b>New Form Request</b><br>
	Request Source Page: {{ $message['source'] }}<br>
	Request Title: {{ $message['title'] }}<br>
	User Name: {{ $message['user'] }}<br>
	Contact Email: {{ $message['email'] }}<br>
@endcomponent