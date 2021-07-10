<h2>users page</h2>

<table border="1">
    @foreach($items as $item)
        <tr>
            <td>ID: {{ $item['id'] }}</td>
            <td>NAME: {{ $item['name'] }}</td>
            <td>EMAIL: {{ $item['email'] }} </td>
            <td>
                <form action="/users/{{ $item['id'] }}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="delete">
                </form>
            </td>
            <td><a href="/users/edit/{{ $item['id'] }}">edit</a></td>
        </tr>
    @endforeach

    <span>
    {{
        $items->links();
    }}
    </span>
</table>


<style>
    .w-5{
        display: none;
    }
</style>