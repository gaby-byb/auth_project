<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-zinc-950 text-zinc-100">
    <main class="mx-auto flex min-h-screen w-full max-w-5xl items-center px-6 py-12">
        <div class="w-full">
            @if ($errors->any())
                <div class="mb-6 rounded-lg border border-red-500/40 bg-red-500/10 p-4 text-sm text-red-100">
                    <ul class="list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @auth
                <section class="grid gap-6 md:grid-cols-[1fr_1.4fr]">
                    <div class="rounded-lg border border-zinc-800 bg-zinc-900 p-6 shadow-xl">
                        <p class="text-sm font-medium uppercase tracking-wide text-emerald-300">Logged in</p>
                        <h1 class="mt-3 text-3xl font-semibold text-white">You're in.</h1>
                        <p class="mt-3 text-zinc-400">Create a post or log out when you're done.</p>

                        <form action="/logout" method="POST" class="mt-6">
                            @csrf
                            <button type="submit" class="rounded-md bg-zinc-100 px-4 py-2 text-sm font-semibold text-zinc-950 transition hover:bg-white">
                                Logout
                            </button>
                        </form>
                    </div>

                    <div class="rounded-lg border border-zinc-800 bg-zinc-900 p-6 shadow-xl">
                        <h2 class="text-2xl font-semibold text-white">Create Post</h2>
                        <form action="/create-post" method="POST" class="mt-5 space-y-4">
                            @csrf
                            <input
                                type="text"
                                name="title"
                                placeholder="Post title"
                                class="w-full rounded-md border border-zinc-700 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-500 focus:border-emerald-400"
                            >
                            <textarea
                                name="body"
                                placeholder="Body content..."
                                rows="6"
                                class="w-full resize-none rounded-md border border-zinc-700 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-500 focus:border-emerald-400"
                            ></textarea>
                            <button type="submit" class="w-full rounded-md bg-emerald-400 px-4 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-emerald-300">
                                Save Post
                            </button>
                        </form>
                    </div>

                    <div class="rounded-lg border border-zinc-800 bg-zinc-900 p-6 shadow-xl">
                        <h2 class="text-2xl font-semibold text-white">All Posts</h2>
                        @foreach ($posts as $post)
                        <article>
                            <h3 class="text-lg font-semibold text-white"
                            >{{ $post['title'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-zinc-300">
                                {{ $post['body'] }}
                            </p>
                            <div class="mt-4 flex items-center justify-between border-t border-zinc-800 pt-3">
                                <span class="text-xs text-zinc-500">
                                    {{ $post->created_at->diffForHumans() }}
                                </span>
                                <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                                    
                                </button>
                                <form action="/delete-post/{{ $post->id }}" method="POST">
                                    @csrf
                                    @method('DELETEs')
                                    <button>Delete</button>
                                </form>

                            </div>
                        </article>
                    
                        @endforeach
                    </div>
                </section>
     
       
            @else
                <section class="mx-auto grid max-w-4xl gap-6 md:grid-cols-2">
                    <div class="rounded-lg border border-zinc-800 bg-zinc-900 p-6 shadow-xl">
                        <h1 class="text-2xl font-semibold text-white">Login</h1>
                        <form action="/login" method="POST" class="mt-5 space-y-4">
                            @csrf
                            <input
                                type="text"
                                name="loginname"
                                placeholder="Name"
                                class="w-full rounded-md border border-zinc-700 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-500 focus:border-sky-400"
                            >
                            <input
                                type="password"
                                name="loginpassword"
                                placeholder="Password"
                                class="w-full rounded-md border border-zinc-700 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-500 focus:border-sky-400"
                            >
                            <button type="submit" class="w-full rounded-md bg-sky-400 px-4 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-sky-300">
                                Login
                            </button>
                        </form>
                    </div>

                    <div class="rounded-lg border border-zinc-800 bg-zinc-900 p-6 shadow-xl">
                        <h2 class="text-2xl font-semibold text-white">Register</h2>
                        <form action="/register" method="POST" class="mt-5 space-y-4">
                            @csrf
                            <input
                                type="text"
                                name="name"
                                placeholder="Name"
                                class="w-full rounded-md border border-zinc-700 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-500 focus:border-emerald-400"
                            >
                            <input
                                type="text"
                                name="email"
                                placeholder="Email"
                                class="w-full rounded-md border border-zinc-700 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-500 focus:border-emerald-400"
                            >
                            <input
                                type="password"
                                name="password"
                                placeholder="Password"
                                class="w-full rounded-md border border-zinc-700 bg-zinc-950 px-4 py-3 text-sm text-white outline-none transition placeholder:text-zinc-500 focus:border-emerald-400"
                            >
                            <button type="submit" class="w-full rounded-md bg-emerald-400 px-4 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-emerald-300">
                                Register
                            </button>
                        </form>
                    </div>
                </section>
            @endauth
        </div>
    </main>
</body>
</html>
