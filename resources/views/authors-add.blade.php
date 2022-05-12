<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Add Authors</title>

    </head>
    <body>


    <h2>Add an Author</h2>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $e)
                <li><strong>{{ $e }}</strong></li>
            @endforeach
        </ul>
    </div>
    @endif
    <div>
    <form method="POST" action= "/authors/store" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="authorid" class="col-sm-3 col-form-label">Author</label>
            <div class="col-sm-9">
                <input name="author" type="text" required class="form-control" id="authorid" placeholder="Author">

              </div>
        </div>

        <div class="form-group row">
            <label for="lifetimeid"  class="col-sm-3 col-form-label">Lifetime</label>
                <div class="col-sm-9">
                     <input name="lifetime" required type="text" class="form-control" id="lifetimeid" placeholder="Lifetime">

                        </div>
        </div>

        <div class="form-group row">
            <label for="nationalityid"  class="col-sm-3 col-form-label">Lifetime</label>
                <div class="col-sm-9">
                    <input name="nationality" required type="text" class="form-control" id="nationalityid" placeholder="Nationality">

                        </div>
        </div>

        <div class="form-group row">
            <label for="urlid"  class="col-sm-3 col-form-label">URL</label>
                 <div class="col-sm-9">
                    <input name="url" required type="text" class="form-control" id="urlid" placeholder="URL">

                        </div>
        </div>
        <br>

         <div class="form-group row">
        <div class="offset-sm-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Submit Author</button>
        </div>
    </div>
    </form>


    <br>
    <br>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

  </body>
</html>
