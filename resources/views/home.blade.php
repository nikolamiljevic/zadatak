@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="header">
                <h1>Create a post</h1>
            <form action="http://localhost/eyesee/public/api/post/create" method="POST" id="form">
                    <fieldset >
                        <div class="form-group">
                        <label for="disabledTextInput">Title</label>
                        <input type="text" id="title" name="title" class="form-control title" placeholder="title">
                        </div>
                        <div class="form-group">
                        <label for="disabledSelect">Content</label>

                        <textarea class="form-control" name="body" class="body" cols="30" rows="10">
                        </textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="user_id" class="user_id" value="{{Auth::user()->id}}">
                        </div>
                        <button class="btn btn-success" type="submit">Add post</button>
                    </fieldset>
                </form>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card">   
            </div>

        </div>
    </div>
</div>
@endsection
<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>

<script>
$(document).ready(function()
{
    $.ajax('api/posts', 
    {
        success: function (data, status, xhr)
        {
           console.log(data);
           $.each(data, function (index, value) 
           {
               $.each(value,function(index,post)
               {
                console.log(post.title);
                $('.card')
                .append(
                    `<div class="card-header">
                     <b>`+ post.title + `</b> 
                     <div style="float:right">`+post.created_at+`</div>
                    </div>
                    <div class="card-body">
                     `  +post.body+`
                    </div>
                     <a href="posts/`+post.id+`"> 
                    <button class="btn btn-dark dugme">show post</button>
                     </a> 
                    <br>
                    `)
               });

            });
        }
    });
  
});
</script>
