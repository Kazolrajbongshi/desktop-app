<form action="{{url('/sms-page')}}" method="post">
    @csrf
<input type="text" name="code" placeholder="Enter verification code sent your mobile">
    <input type="submit">
</form>
