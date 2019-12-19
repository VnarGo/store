<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .carousel-indicators {
        background-color: black;
    }

    #image{
        height: 100px;
        width: 100px;
    }

</style>

<div class="container">
<hr>
@if( !empty($filename))
    <img src="{{$path}}{{$filename}}">
@endif
<hr>

    <form class="form-group" action="/test" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="input">Napravi Novi Folder</label>
        <input class="form-control" type="text" name="putanja" required>
        <select class="form-control"  name="image[]" multiple required>
            <option type="file"></option>

        </select>
        <button class="form-control btn btn-danger" type="submit">Save</button>

    </form>



</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

