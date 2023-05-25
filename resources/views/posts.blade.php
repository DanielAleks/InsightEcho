@extends ('layout')

<!doctype html>

<link rel="stylesheet" href="/app.css">

<script>
    $price = 3
</script>

<body>
    <div style="background: rgb(35, 42, 93); height: 100vh; width: 100vw; padding: 1rem">

    {{-- <div style="display: flex; justify-content: center; align-items: center">
        <div
            style="position: absolute; top: 5rem; border-radius: 10px; background: lightblue; width: 60vw; height: 60vh;"> --}}





            <div style="margin-left: 10rem">
                <div>
                    <div style="position: absolute; right: 25rem; bottom: 5rem;">
                    <button style=" padding: 1rem; ">Add Task</button>
                    <div style="display: flex; flex-direction: column">
                        <input style="margin-bottom: 1rem; margin-top: 1rem" type="text" value="Title">
                        <input style="margin-bottom: 1rem" type="text" value="Notes">
                        <input style="margin-bottom: 1rem" type="text" value="Priority">
                        <input style="margin-bottom: 1rem" type="text" value="Color">

                    </div>
                </div>


                   
                    <p style="margin-top: 2rem; font-size: 30px; font-weight: 700">Daily Tasks</p>

                    {{-- <div @if (addTask === true)
        
    @endif> --}}
                </div>
            </div>

            @foreach ($posts as $post)
            <div style=" margin-left: 10rem">
                <p style="margin-top: 3rem; font-size: 20px; border-bottom: 1px solid white; width: 10rem;">Task:
                    {{ $post->title }}</p>
                {{-- <div>{{ $post->id }}</div> --}}
                <p>Notes: {{ $post->body }}</p>
                <button>Edit</button>
                <button style="color: red">Delete</button>
            </div>
            @endforeach
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
