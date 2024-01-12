<x-mail::message>
<div >
<p>   To: {{ config('app.name')}}</p>
 <p>  From: {{ $user->email}}</p>
 <p>  Subject: {{ $user->subject}}</p>
<br><br>
</div>
<p>  Name: {{ $user->name}}</p>
<p>  Phone: {{ $user->phone}}</p>
<div >
    {{$user->message}}
</div>
 
Thanks,<br>
</x-mail::message>
