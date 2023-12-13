<ul>
    @forelse ($books as $book)
        <li>
            <a href="">{{ $book->name }}</a>
        </li>
    @empty
    <li style="color: red; padding:5px;">Product Not Found </li>
    @endforelse
</ul>
