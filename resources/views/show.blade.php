<html>
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    />
    <title>
        Laravel App
    </title>
    <link
        rel="stylesheet"
        href="{{ asset('css/app.css') }}"
    />      ````````
</head>
<body>
    <div class="w-4/5 mx-auto">
        <div class="pt-10">
            <a href="{{ URL::previous() }}"
               class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                < Back to previous page
            </a>
        </div>
            <p class="text-left sm:text-center text-2xl sm:text-4xl md:text-5xl font-bold text-gray-900 py-10 sm:py-20">
                {{$posts->body}}
            </p>
        <div class="block lg:flex flex-row">
            <form action="{{route('post.edit',$posts->id)}}" method="get">
                <div class="py-10 sm:py-20">
                    <button type="submit" class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400">
                        edit post
                    </button>
                </div>
            </form>
             <form action="{{route('post.delete',$posts->id)}}" method="post">
                 @csrf
                 @method('delete')
                 <div class="py-10 sm:py-20">
                   <button type="submit" class="primary-btn inline text-base sm:text-xl bg-green-500 py-4 px-4 shadow-xl rounded-full transition-all hover:bg-green-400">
                       delete post
                   </button>
                 </div>
             </form>
        </div>


    </div>
    </body>
</html>
