
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create New Link</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="row mt-5">
  <div class="col-2"></div>
  <div class="col-8">

    @yield('form')
    @yield('method')
    @csrf
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="url">URL</label>
        <input type="text"  name="original_url" value="{{ old('original_url',$url->original_url) }}" class="form-control @error('original_url') is-invalid @enderror" id="inputEmail4" placeholder="https://....">
        @error('original_url')
          <div class="alert alert-danger">{{ $message }}</div>
        @endif
        </div>
      <div class="form-group col-md-12">
        <label for="description">Description</label>
        <textarea name="description" type="text" class="form-control @error('description') is-invalid @enderror" id="inputPassword4" placeholder="Descripe your URL..." >{{ old('description',$url->description) }}</textarea>
        @error('description')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
    <a class="btn btn-success" href="{{ route('dashboard.index') }}">Cancle</a>
  </form>
  </div>
  <div class="col-2"></div>
</div>

