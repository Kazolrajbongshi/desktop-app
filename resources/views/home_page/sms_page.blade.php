<form action="{{url('/sms-page')}}" method="post">
    @csrf
<input type="text" name="code">
    <input type="submit">
</form>
