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


                   
                    <p style="margin-top: 2rem; font-size: 30px; font-weight: 700">Product Info</p>

                    <!-- {{-- <div @if (addTask === true) @endif> --}} -->
                </div>
            </div>

            <div style="position: absolute; top: 5rem">
            @foreach ($info as $item)
            <div style=" margin-left: 10rem; background: black">
                <p style="margin-top: 3rem; font-size: 20px; border-bottom: 1px solid white; width: 10rem;">Task:
                    {{ $item->title }}</p>
                <p>ID: {{ $item->id }}</p> 
                <p>suppliers: {{ $item->suppliers }}</p>
                <p>Selling Price: {{ $item->sellingPrice }}</p>
                <p>Costs: {{ $item->costs }}</p>
                <p>Links: {{ $item->links }}</p>


<!-- CRUD is done, with all fields (should have option to add to the column) -->
<!-- Other sections: ProductInfo, ProductResearch, routes: info/, research/ -->
                <form method="POST" action="{{ url('/'.$item->id) }}">
              @method('PATCH')
              @csrf
              <!-- <input type="hidden" name="title" value="{{ $item->title }}"> -->
              <input name="title" placeholder="Title" class="form-control" value="{{ $item->title }}"/>
              <input name="suppliers" placeholder="suppliers" class="form-control" value="{{ $item->suppliers }}"/>
              <input name="sellingPrice" type="number" placeholder="selling price" class="form-control" value="{{ $item->sellingPrice }}"/>
              <input name="costs" placeholder="costs" class="form-control" value="{{ $item->costs }}"/>
              <input name="links" placeholder="links" class="form-control" value="{{ $item->links }}"/>

              <button input="submit">Update</button>
            </form>




        <!-- TRY DELETE FIRST -->
            <form method="POST" action="{{ url('/'.$item->id) }}">
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