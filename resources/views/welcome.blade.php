<x-layout>

    @foreach ($posts as $post)
        <div>
            <div>
                <a href="/post/my-first-post">First Post</a>
                <p>Lorem Ipsum Post Hi Hello my Friends</p>
            </div>
            <div>
                <a href="/post/my-second-post">Second Post</a>
                <p>Lorem Ipsum Post Hi Hello my Friends</p>
            </div>
            <div>
                <a href="/post/my-third-post">Third Post</a>
                <p>Lorem Ipsum Post Hi Hello my Friends</p>
            </div>

            <p>data:</p>
            <p>title: {{ $post->title }}</p>
        </div>
    @endforeach
</x-layout>
