@extends ('layout')


<!-- resources/views/app.blade.php -->

 <!doctype html>

<link rel="stylesheet" href="/app.css">

<script>
    $price = 3
</script>

<body>
    <div style="background: rgb(35, 42, 93); height: 100vh; width: 100vw; padding: 1rem">
            <div style="margin-left: 10rem">
                <div  style="position: fixed; z-index: 10000; right: 0rem; bottom: 5rem; background: lightblue">
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
                    <p style="margin-top: 2rem; font-size: 30px; font-weight: 700">Product Posts</p>
                </div>
            </div>

            <div style="position: absolute; top: 5rem">
            @foreach ($posts as $post)
            <div style=" margin-left: 10rem; background: black">
                <p style="margin-top: 3rem; font-size: 20px; border-bottom: 1px solid white; width: 10rem;">Task:
                    {{ $post->title }}</p>
                <p>ID: {{ $post->id }}</p> 
                <p>Setting: {{ $post->setting }}</p>
                <p>Avg Video Length: {{ $post->avg_video_length }}</p>
                <p>Hook: {{ $post->hook }}</p>
                <p>Transitions: {{ $post->transitions }}</p>
                <p>Lighting: {{ $post->lighting }}</p>
                <p>Music: {{ $post->music }}</p>


                <form method="POST" action="{{ url('/'.$post->id) }}">
              @method('PATCH')
              @csrf
              <input name="title" placeholder="Title" class="form-control" value="{{ $post->title }}"/>
              <input name="setting" placeholder="Setting" class="form-control" value="{{ $post->setting }}"/>
              <input name="avg_video_length" type="number" placeholder="Average Video Length" class="form-control" value="{{ $post->avg_video_length }}"/>
              <input name="hook" placeholder="Hook" class="form-control" value="{{ $post->hook }}"/>
              <input name="transitions" placeholder="Transitions" class="form-control" value="{{ $post->transitions }}"/>
              <input name="lighting" placeholder="Lighting" class="form-control" value="{{ $post->lighting }}"/>
              <input name="music" placeholder="music" class="form-control" value="{{ $post->music }}"/>

              <button input="submit">Update</button>
            </form>




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
