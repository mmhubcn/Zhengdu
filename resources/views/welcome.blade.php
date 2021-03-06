<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            margin: 2rem;
            font-family: sans-serif;
        }

        button.is-active {
            background: black;
            color: white;
        }

        .ProseMirror {
            padding: 0.5rem 1rem;
            margin: 1rem 0;
            border: 1px solid #ccc;
        }

    </style>
</head>

<body class="antialiased">
    <div class="bg-white lg:pb-12">
        <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
            <header class="flex justify-between items-center py-4 md:py-8">
                <!-- logo - start -->
                <a href="/" class="inline-flex items-center text-black-800 text-2xl md:text-3xl font-bold gap-2.5"
                    aria-label="logo">
                    <svg width="95" height="94" viewBox="0 0 95 94" class="w-6 h-auto text-indigo-500"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M96 0V47L48 94H0V47L48 0H96Z" />
                    </svg>

                    Flowrift
                </a>
                <!-- logo - end -->

                <!-- nav - start -->
                <nav class="hidden lg:flex gap-12">
                    <a href="#"
                        class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100">Home</a>
                    <a href="#" class="inline-flex items-center text-indigo-500 text-lg font-semibold gap-1">
                        Features

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#"
                        class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100">Pricing</a>
                    <a href="#"
                        class="text-gray-600 hover:text-indigo-500 active:text-indigo-700 text-lg font-semibold transition duration-100">About</a>
                </nav>
                <!-- nav - end -->

                <!-- buttons - start -->
                @if (Route::has('login'))
                    <div class="hidden lg:flex flex-col sm:flex-row sm:justify-center lg:justify-start gap-2.5 -ml-8">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="inline-block focus-visible:ring ring-indigo-300 text-gray-500 hover:text-indigo-500 active:text-indigo-600 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 py-3">Sign
                                in</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="inline-block focus-visible:ring ring-indigo-300 text-gray-500 hover:text-indigo-500 active:text-indigo-600 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-4 py-3">Sign
                                in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="inline-block bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 focus-visible:ring ring-indigo-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">Sign
                                    up</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <button type="button"
                    class="inline-flex items-center lg:hidden bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold rounded-lg gap-2 px-2.5 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd" />
                    </svg>

                    Menu
                </button>
                <!-- buttons - end -->
            </header>
            <main>
                <div class="bg-white py-6 sm:py-8 lg:py-12">
                    <div x-data="setupEditor('<p>Hello World! :-)</p>')" x-init="() => init($refs.element)">

                        <template x-if="editor">
                          <div class="menu inline-flex items-center">
                            <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleBold().run()" :class="{ 'is-active': editor.isActive('bold') }">
                                bold
                              </button>
                              <button class="bg-indigo-500 rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleItalic().run()" :class="{ 'is-active': editor.isActive('italic') }">
                                italic
                              </button>
                              <button class="bg-indigo-500" @click="editor.chain().focus().toggleStrike().run()" x-bind:class="{ 'bg-indigo-500': editor.isActive('strike') }">
                                strike
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleCode().run()" :class="{ 'is-active': editor.isActive('code') }">
                                code
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().unsetAllMarks().run()">
                                clear marks
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().clearNodes().run()">
                                clear nodes
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().setParagraph().run()" :class="{ 'is-active': editor.isActive('paragraph') }">
                                paragraph
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleHeading({ level: 1 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }">
                                h1
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleHeading({ level: 2 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }">
                                h2
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleHeading({ level: 3 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }">
                                h3
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleHeading({ level: 4 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 4 }) }">
                                h4
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleHeading({ level: 5 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 5 }) }">
                                h5
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleHeading({ level: 6 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 6 }) }">
                                h6
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleBulletList().run()" :class="{ 'is-active': editor.isActive('bulletList') }">
                                bullet list
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleOrderedList().run()" :class="{ 'is-active': editor.isActive('orderedList') }">
                                ordered list
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleCodeBlock().run()" :class="{ 'is-active': editor.isActive('codeBlock') }">
                                code block
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().toggleBlockquote().run()" :class="{ 'is-active': editor.isActive('blockquote') }">
                                blockquote
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().setHorizontalRule().run()">
                                horizontal rule
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().setHardBreak().run()">
                                hard break
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().undo().run()">
                                undo
                              </button>
                              <button class="bg-white rounded-l border text-gray-600 hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50 inline-flex items-center px-2 py-1 border-r border-gray-200" @click="editor.chain().focus().redo().run()">
                                redo
                              </button>
                          </div>
                        </template>
                    
                        <div x-ref="element"></div>
                        <div x-text="content"></div>
                      </div>
                </div>
            </main>
            <footer class="bg-white">
                <div class="bg-indigo-500 py-6">
                    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
                        <div class="flex flex-col md:flex-row justify-between items-center gap-2">
                            <div class="text-center md:text-left mb-3 md:mb-0">
                                <span class="text-gray-100 font-bold uppercase tracking-widest">Newsletter</span>
                                <p class="text-indigo-200">Subscribe to our newsletter</p>
                            </div>

                            <form class="w-full md:max-w-md flex gap-2">
                                <input placeholder="Email"
                                    class="w-full flex-1 bg-indigo-400 text-white placeholder-indigo-100 border border-white focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />

                                <button
                                    class="inline-block bg-white hover:bg-gray-100 focus-visible:ring ring-indigo-300 text-indigo-500 active:text-indigo-600 text-sm md:text-base font-semibold text-center rounded outline-none transition duration-100 px-8 py-2">Send</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="pt-12 lg:pt-16">
                    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-12 lg:gap-8 mb-16">
                            <div class="col-span-full lg:col-span-2">
                                <!-- logo - start -->
                                <div class="lg:-mt-2 mb-4">
                                    <a href="/"
                                        class="inline-flex items-center text-black-800 text-xl md:text-2xl font-bold gap-2"
                                        aria-label="logo">
                                        <svg width="95" height="94" viewBox="0 0 95 94"
                                            class="w-5 h-auto text-indigo-500" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M96 0V47L48 94H0V47L48 0H96Z" />
                                        </svg>

                                        Flowrift
                                    </a>
                                </div>
                                <!-- logo - end -->

                                <p class="text-gray-500 sm:pr-8 mb-6">Filler text is dummy text which has no meaning
                                    however looks very similar to real text</p>

                                <!-- social - start -->
                                <div class="flex gap-4">
                                    <a href="#" target="_blank"
                                        class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
                                        <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                        </svg>
                                    </a>

                                    <a href="#" target="_blank"
                                        class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
                                        <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                        </svg>
                                    </a>

                                    <a href="#" target="_blank"
                                        class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
                                        <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                        </svg>
                                    </a>

                                    <a href="#" target="_blank"
                                        class="text-gray-400 hover:text-gray-500 active:text-gray-600 transition duration-100">
                                        <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                        </svg>
                                    </a>
                                </div>
                                <!-- social - end -->
                            </div>

                            <!-- nav - start -->
                            <div>
                                <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Products</div>

                                <nav class="flex flex-col gap-4">
                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Overview</a>
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Solutions</a>
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Pricing</a>
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Customers</a>
                                    </div>
                                </nav>
                            </div>
                            <!-- nav - end -->

                            <!-- nav - start -->
                            <div>
                                <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Company</div>

                                <nav class="flex flex-col gap-4">
                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">About</a>
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Investor
                                            Relations</a>
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Jobs</a>
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Press</a>
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Blog</a>
                                    </div>
                                </nav>
                            </div>
                            <!-- nav - end -->

                            <!-- nav - start -->
                            <div>
                                <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Support</div>

                                <nav class="flex flex-col gap-4">
                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Contact</a>
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Documentation</a>
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Chat</a>
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">FAQ</a>
                                    </div>
                                </nav>
                            </div>
                            <!-- nav - end -->

                            <!-- nav - start -->
                            <div>
                                <div class="text-gray-800 font-bold tracking-widest uppercase mb-4">Legal</div>

                                <nav class="flex flex-col gap-4">
                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Terms
                                            of Service</a>
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Privacy
                                            Policy</a>
                                    </div>

                                    <div>
                                        <a href="#"
                                            class="text-gray-500 hover:text-indigo-500 active:text-indigo-600 transition duration-100">Cookie
                                            settings</a>
                                    </div>
                                </nav>
                            </div>
                            <!-- nav - end -->
                        </div>

                        <div class="text-gray-400 text-sm text-center border-t py-8">?? 2021 - Present Flowrift. All
                            rights reserved.</div>
                    </div>
                </div>
            </footer>
</body>
<script src="{{ asset('js/tiptap.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</html>
