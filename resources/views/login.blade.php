<h3>this is the user page</h3>

<form action="/users" method="POST">
@csrf
    <input 
        name="name"
        type="text"
        placeholder="enter name"
    >
    <br>
    <input 
        name="email"
        type="text"
        placeholder="enter email"
    >
    <br>
    <input 
        name="address"
        type="text"
        placeholder="enter address"
    >
    <br>
    <button type="submit">
    submit
    </button>
</form>
