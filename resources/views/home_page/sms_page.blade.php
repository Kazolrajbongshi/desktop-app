<form action="{{url('/sms-page')}}" method="post">
    @csrf
 Give the OTP that has been sent to your mobile number<br>
<input type="text" name="code" class="form-control" placeholder="Enter verification code sent your mobile">
    <input type="submit">
</form>
