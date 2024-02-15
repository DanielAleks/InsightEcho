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


                   
                    <p style="margin-top: 2rem; font-size: 30px; font-weight: 700">Product Research</p>

                    <!-- {{-- <div @if (addTask === true) @endif> --}} -->
                </div>
            </div>

            <div style="position: absolute; top: 5rem">
            @foreach ($research as $res)
            <div style=" margin-left: 10rem; background: black">
                <p style="margin-top: 3rem; font-size: 20px; border-bottom: 1px solid white; width: 10rem;">Task:
                    {{ $res->title }}</p>
                <p>targetMarket: {{ $res->targetMarket }}</p> 
                <p>avatar: {{ $res->avatar }}</p>
                <p>currentState: {{ $res->currentState }}</p>
                <p>dreamState: {{ $res->dreamState }}</p>
                <p>roadBlocks: {{ $res->roadBlocks }}</p>
                <p>solution: {{ $res->solution }}</p>
                <p>product: {{ $res->product }}</p>

<!-- CRUD is done, with all fields (should have option to add to the column) -->
<!-- Other sections: ProductInfo, ProductResearch, routes: info/, research/ -->
            <form method="POST" action="{{ url('/research/'.$res->id) }}">
              @method('PATCH')
              @csrf
              <!-- <input type="hidden" name="title" value="{{ $res->title }}"> -->
              <input name="title" placeholder="Title" class="form-control" value="{{ $res->title }}"/>
              <input name="targetMarket" placeholder="Setting" class="form-control" value="{{ $res->targetMarket }}"/>
              <input name="avatar" type="number" placeholder="Avatar" class="form-control" value="{{ $res->avatar }}"/>
              <input name="currentState" placeholder="currentState" class="form-control" value="{{ $res->currentState }}"/>
              <input name="dreamState" placeholder="dreamState" class="form-control" value="{{ $res->dreamState }}"/>
              <input name="roadBlocks" placeholder="roadBlocks" class="form-control" value="{{ $res->roadBlocks }}"/>
              <input name="solution" placeholder="solution" class="form-control" value="{{ $res->solution }}"/>
              <input name="product" placeholder="product" class="form-control" value="{{ $res->product }}"/>

              <button input="submit">Update</button>
            </form>




        <!-- TRY DELETE FIRST -->
            <form method="POST" action="{{ url('/research/'.$res->id) }}">
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

