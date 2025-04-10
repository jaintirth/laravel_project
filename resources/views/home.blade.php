<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    @auth
    <form action="/logout" method="POST">
        @csrf
        <p>Congrats you are logged in</p>
        <button>Logout</button>
    </form>

    <div style="border : 2px solid black">
        <h2>Create a New Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text"name='title'placeholder='post title'>
            <textarea name="body" placeholder="body content ...."></textarea>
            <button>Save Post</button>

        </form>
    </div>
    <div style="border : 2px solid black"> 
        <h2>All Posts</h2>
        @foreach ($posts as $post)
            <div style="background-color:skyblue;padding:10px;margin:10px">
                <h3>{{$post['title']}}</h3>
                {{$post['body']}};
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('Delete')
                    <button>Delete</button>
                </form>

            </div>
        @endforeach
    </div>

    @else
    <div style="border : 2px solid black">
        <h2>Register</h2>
        <form action="/register" method='POST'>
            @csrf
            <input type="text" placeholder='name' name="name">
            <input type="email" placeholder='email' name="email">
            <input type="password" placeholder="password" name="password">
            <button>Register</button>
        </form>
    </div>
    <br>
    <br>
    <div style="border : 2px solid black">
        <h2>Login</h2>
        <form action="/login" method='POST'>
            @csrf
            <input type="text" placeholder='name' name="loginname">
            <input type="password" placeholder="password" name="loginpassword">
            <button>Login</button>
        </form>
    </div>
    @endauth
</body>
</html>