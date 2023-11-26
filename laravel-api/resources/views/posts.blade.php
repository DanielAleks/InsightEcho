@extends ('layout')

<!doctype html>

<link rel="stylesheet" href="/app.css">

<script>
    $price = 3
</script>

<body>
    <div style="background: rgb(35, 42, 93); height: 100vh; width: 100vw; padding: 1rem">
            <div style="margin-left: 10rem">
                <div  style="position: absolute; right: 25rem; bottom: 5rem;">
                  <form method="POST">
    @csrf
    <div class="form-group">

    <p for="title">Title</p>
      <input class="form-control" name="title" />

      <p for="description">Task Description</p>
      <input class="form-control" name="body" />
    </div>
    <div class="form-group">
      <button type="submit" style="margin-top: 1rem">Create Task</button>
    </div>
  </form>
  </div>


                   
                    <p style="margin-top: 2rem; font-size: 30px; font-weight: 700">Daily Tasks</p>

                    <!-- {{-- <div @if (addTask === true) @endif> --}} -->
                </div>
            </div>

            <div style="position: absolute; top: 5rem">
            @foreach ($posts as $post)
            <div style=" margin-left: 10rem; background: black">
                <p style="margin-top: 3rem; font-size: 20px; border-bottom: 1px solid white; width: 10rem;">Task:
                    {{ $post->title }}</p>
                <p>{{ $post->id }}</p> 
                <p>Notes: {{ $post->body }}</p>


                <form method="POST" action="{{ url('/'.$post->id) }}">
              @method('PATCH')
              @csrf
              <!-- <input type="hidden" name="title" value="{{ $post->title }}"> -->
              <input name="title" placeholder="Title" class="form-control" value="{{ $post->title }}"/>
              <button input="submit">Update</button>
            </form>




        <!-- TRY DELETE FIRST -->
            <form method="POST" action="{{ url('/'.$post->id) }}">
              @method('DELETE')
              @csrf
              <button style="background: pink" input="submit">Delete</button>
            </form>


            </div>
            @endforeach
                    </div>
        </div>
    </div>

</body>

<style lang="css">
p {
    color: white
}
</style>

{{-- shorthand @ --}}
{{-- @foreach ($posts as $post)
    <div>{{ $post->title }}</div>
@endforeach --}}
