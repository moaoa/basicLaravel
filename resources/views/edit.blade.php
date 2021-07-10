<h1>Update User</h1>
<form action="/users/{{ $user['id'] }}" method="POST">
    @csrf
    @method('put')
    <input name="name" type="text" value="{{ $user['name'] }}">
    <input name="email" type="email" value="{{ $user['email'] }}">
    <input name="address" type="text" value="{{ $user['address'] }}">
    <button type="submit">update</button>
</form>