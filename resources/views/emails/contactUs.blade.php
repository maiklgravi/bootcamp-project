<!DOCTYPE html>
<html lang="en">
<body>
<p>User requested attention:</p>
<p>User email :{{$email}}</p>
<p>Name: {{$name}}</p>
<p>Departament: {{$department}}</p>
<p>District: {{implode(',', $districts ?? [])}} </p>
<p>Message</p>
<p>{{$messageText}}</p>

