<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="w-4/5 mx-auto">
    <div class="text-center pt-20">
        <h1 class="text-3xl text-gray-700">
            edit post
        </h1>
        <hr class="border border-1 border-gray-300 mt-10">
    </div>

    <div class="m-auto pt-20">
        <form action="{{route('post.update', $posts->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input
                type="text"
                name="title"
                placeholder="{{$posts->title}}"
                class="bg-transparent block border-b-2 w-full h-20 text-2xl outline-none">

            <textarea
                name="body"
                placeholder="{{$posts->body}}"
                class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

            <select name="category_id[]" id="category_id[]" multiple>
                @foreach($categories as $category)
                    <option value={{$category->id}}>{{$category->title}}</option>
                @endforeach
            </select>

            <BR><BR><BR>

            <button
                type="submit"
                class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Submit Post
            </button>

            {{ $errors }}
        </form>
    </div>
</body>
</html>
