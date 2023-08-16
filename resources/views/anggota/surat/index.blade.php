@extends('layouts.app')

@section('content')
<main id="main">
    <select class="form-select" aria-label="Default select example" id="select">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    
      <div class="" id="results"></div>
</main>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $("#select").on("change", function() {
        if(this.value == 1) {
            $("#results").html("one");
        }
        if(this.value == 2) {
            $("#results").html("two");
        }
        if(this.value == 3) {
            $("#results").html("three");
        }
    });
</script>
@endsection