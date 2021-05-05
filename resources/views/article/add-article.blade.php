@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Ajouter Article </title>
</head>

<body>
    <section style="padding-top:60px ;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Ajouter un article
                        </div>
                        <div class="card-body">
                            @if(Session::has('article-ajoute'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('article-ajoute')}}
                            </div>
                            @endif
                            <form method="POST" action="{{route('article.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="file">Choisir une photo de profile</label>
                                    <input type="file" name="file" class="form-control" onChange="previewFile(this)" />
                                    <img id="previewImg" style="max-width:130px; margin-top:20px;" />
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function previewFile(input) {

            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
@endsection