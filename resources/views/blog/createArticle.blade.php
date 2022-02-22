@extends('layout')
@section('content')
<div class="container mt-5 m-5 p-5 ">
<h1>Create article</h1>

<form id="create-article-form">
    <div class="alert alert-danger" id="alert" role="alert" hidden>
           <ul id="listErorr">

           </ul>
      </div>
    <div class="mb-3">
    <label for="titleInput" class="form-label">Tiltle</label>
    <input type="text" class="form-control" id="tiitleInput" placeholder="Article title">
    </div>
    <div class="mb-3">
        <label for="author_id" class="form-label">Author id</label>
        <input type="number" class="form-control" id="autor_id" placeholder="Author id">
    </div>


  <div class="mb-3">
    <label for="descriptionInput" class="form-label">Description:</label>
    <textarea class="form-control" id="descriptionInput" rows="3"></textarea>
  </div>

  <div class="mb-3">
    <label for="categoryInput" class="form-label">Category:</label>
    <select class="form-select me-2" name="category" id="categoryInput">
    <option selected disabled>Select any category</option>
    @foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
    </select>
  </div>
  <div class="row">
      <div class="col-9"><div class="mb-3">
    <label for="formFile" class="form-label">Upload image for article</label>
    <input class="form-control" accept="image/*" type="file" id="imageInput">
  </div></div>
      <div class="col-3">
          <img class="image_with" src="" alt=" prewiew upload image" id="imagePrewiew" hidden>
      </div>
  </div>

  <div class="mb-3">
      <div class="d-flex justify-content-center"> <button type="submit" class="btn-lg btn-primary">Create</button></div>
</div>


</div>

</form>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">

        <strong class="me-auto">Article has created</strong>

        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
<script src="/assets/js/careateArticle.js"></script>
@endsection
