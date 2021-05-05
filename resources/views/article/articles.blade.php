@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tous les Articles</title>


</head>

<body>
    <section style="padding-top:60px ;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Tous les articles
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom :</th>
                                        <th>Photo :</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                    <tr>
                                        <td>{{$article->nom}}</td>
                                        <td><img src="{{asset('images')}}/{{$article->image}}" style="max-width:60px;" /> </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
@endsection