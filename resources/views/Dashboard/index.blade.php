<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('styles/style.css') }} ">
  <style>
    *{
      color: white;
    }
  </style>
</head>
<body>

  <div class="row">
    <div class="col mx-auto">
    <div class="d-grid gap-2 d-md-block">
      <a href="{{ route('dashboard.create') }}" class="btn btn-primary px-3" >New</a>
    </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table">
      <thead class="text-center">
        <tr>
          <th>Short Link</th>
          <th>Original Link</th>
          <th>Clicks Number</th>
          <th>Description</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
      @foreach($data as $link)
      <tbody class="text-center">
        <tr>
          <td>
             
            <a class="btn btn-primary" target="_blank" href="{{ config('app.url')  .'/'.  $link->id }}">open</a>
            
            <button class="btn btn-success" type="button" onclick="Copy(' {{config('app.url') .'/'.  $link->id }} ')">
              Copy
            </button>
          </td>
          <td>{{ $link->original_url }}</td>
          <td >{{ $link->clicks_no }}</td>
          <td>{{ $link->description }}</td>
          <td>
          
            <a class="btn btn-success" href="{{ route('dashboard.edit', $link->id) }}">Edit</a>
            <form method="POST" action="{{ route('dashboard.delete',$link->id) }}">
              @csrf()
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      </tbody>
        @endforeach
    </table>
  </div>

  <script>
    function Copy(url) {
      navigator.clipboard.writeText(url);
      alert("Url copied");
    } 
  </script>
</body>
</html>



{{-- @foreach($categories as $category)
      <tr>
        <td>
          @if($category->image)

            <img src="{{asset('uploads/' .  $category->image) }}" height="40px"> 
            <img src="{{  Storage::disk('uploads')->url($category->image) }}" height="40px">
          @else
            <img src="{{asset('images/default.jpg') }}" height="40px">
          @endif
        </td>
        <td> {{ $category->id }} </td>
        <td> {{ $category->name }} </td>
        <td> {{ $category->parent_name }} </td>
        <td> {{ $category->created_at }} </td>
        <td>
          <a href="{{ route('dashboard.categories.edit',$category->id) }}"class="btn btn-sm btn-outline-success">Edit</a>
        </td>
        <td>
          <form action="{{ route('dashboard.categories.destroy',$category->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach --}}