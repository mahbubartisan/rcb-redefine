@php
    $settings = App\Models\Settings::with("siteLogo")->first();
@endphp
<!-- Sidebar -->
<aside
    class="hidden w-64 flex-col overflow-hidden border-r border-gray-200 bg-white transition-all duration-300 dark:border-[#132337] dark:bg-[#132337] dark:shadow-2xl lg:flex">
    <!-- Logo and Brand Name -->
    <a href="{{ route("dashboard") }}">
        <div class="flex items-center justify-center">
            <img src="{{ asset(@$settings->siteLogo?->path ?? "rcb-logo.jpeg") }}" alt="{{ $settings->site_name }}"
                class="object-fit h-full w-48" />
        </div>
    </a>
    <!-- Sidebar Navigation with Scroll -->
    <nav class="flex flex-1 flex-col space-y-4 overflow-y-auto p-4">
        <ul class="space-y-2.5">
            <!-- Dashboard -->
            <div>
                <a href="{{ route("dashboard") }}"
                    class="{{ request()->routeIs("dashboard") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                    <span aria-hidden="true">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                        </svg>
                    </span>
                    <span>Dashboard</span>
                </a>
            </div>

            <!-- Location -->
            @canany([
                "view district",
                "create district",
                "edit district",
                "delete district",
                "view thana",
                "create
                thana",
                "edit thana",
                "delete thana"
                ])
                <div x-data="{ open: {{ request()->routeIs("district", "thana") ? "true" : "false" }} }">
                    <a href="#" @click.prevent="open = !open"
                        class="flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-600"
                        :class="open ||
                            {{ request()->routeIs("district", "thana") ? true : false }} ?
                            'bg-blue-50 text-blue-600 dark:bg-[#233A57] dark:text-blue-600' :
                            'text-gray-400 hover:text-blue-600'">
                        <span aria-hidden="true">
                            <svg class="mr-1 h-5 w-5 transition-colors"
                                :class="open ||
                                    {{ request()->routeIs("district", "thana") ? true : false }} ?
                                    'text-blue-600' : 'text-gray-400 dark:text-gray-100'"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                            </svg>
                        </span>
                        <span class="ml-2"
                            :class="open ||
                                {{ request()->routeIs("district", "thana") ? true : false }} ?
                                'text-blue-600' :
                                'text-gray-400 hover:text-blue-500 dark:text-gray-100'">
                            Location
                        </span>
                        <span aria-hidden="true" class="ml-auto">
                            <svg class="h-3.5 w-3.5 transform transition-transform"
                                :class="(open ||
                                    {{ request()->routeIs("district", "thana") ? true : false }}
                                ) ?
                                'text-blue-600 rotate-180' : 'text-gray-400 dark:text-gray-100'"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div x-show="open" class="mt-2 space-y-2" role="menu" aria-label="Components" style="display: none">
                        <ul class="ml-2">
                            <!-- Country -->
                            @canany(["view district", "create district", "edit district", "delete district"])
                                <li
                                    class="{{ request()->routeIs("district") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                    <span
                                        class="{{ request()->routeIs("district") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                    </span>
                                    <a href="{{ route("district") }}" @click="open = true"
                                        class="{{ request()->routeIs("district") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                        District
                                    </a>
                                </li>
                            @endcanany

                            <!-- Thana -->
                            @canany(["view thana", "create thana", "edit thana", "delete thana"])
                                <li
                                    class="{{ request()->routeIs("thana") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                    <span
                                        class="{{ request()->routeIs("thana") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                    </span>
                                    <a href="{{ route("thana") }}" @click="open = true"
                                        class="{{ request()->routeIs("thana") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                        Thana
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </div>
                </div>
            @endcanany

            <!-- User -->
            @canany(["view user", "create user", "edit user", "delete user"])
                <div>
                    <a href="{{ route("user") }}"
                        class="{{ request()->routeIs("user") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                        </span>
                        <span>Users</span>
                    </a>
                </div>
            @endcanany

            <!-- Role -->
            @canany(["view role", "create role", "edit role", "delete role", "view permission", "create permission",
                "edit permission", "delete permission"])
                <div x-data="{ open: {{ request()->routeIs("role", "permission", "create.role", "edit.role") ? "true" : "false" }} }">
                    <a href="#" @click.prevent="open = !open"
                        class="flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-600"
                        :class="open ||
                            {{ request()->routeIs("role", "permission", "create.role", "edit.role") ? true : false }} ?
                            'bg-blue-50 text-blue-600 dark:bg-[#233A57] dark:text-blue-600' :
                            'text-gray-400 hover:text-blue-600'">
                        <span aria-hidden="true">
                            <svg class="mr-1 h-5 w-5 transition-colors"
                                :class="open ||
                                    {{ request()->routeIs("role", "permission", "create.role", "edit.role") ? true : false }} ?
                                    'text-blue-600' : 'text-gray-400 dark:text-gray-100'"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4" />
                                <path d="M14.5 5.5l4 4" />
                                <path d="M12 8l-5 -5l-4 4l5 5" />
                                <path d="M7 8l-1.5 1.5" />
                                <path d="M16 12l5 5l-4 4l-5 -5" />
                                <path d="M16 17l-1.5 1.5" />
                            </svg>
                        </span>
                        <span class="ml-2"
                            :class="open ||
                                {{ request()->routeIs("role", "permission", "create.role", "edit.role") ? true : false }} ?
                                'text-blue-600' :
                                'text-gray-400 hover:text-blue-500 dark:text-gray-100'">
                            Role & Permissions
                        </span>
                        <span aria-hidden="true" class="ml-auto">
                            <svg class="h-3.5 w-3.5 transform transition-transform"
                                :class="(open ||
                                    {{ request()->routeIs("role", "permission", "create.role", "edit.role") ? true : false }}
                                ) ?
                                'text-blue-600 rotate-180' : 'text-gray-400 dark:text-gray-100'"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>

                    </a>
                    <div x-show="open" class="mt-2 space-y-2" role="menu" aria-label="Components"
                        style="display: none">
                        <ul class="ml-2">
                            <!-- Role -->
                            @canany(["view role", "create role", "edit role", "delete role"])
                                <li
                                    class="{{ request()->routeIs("role", "create.role", "edit.role") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                    <span
                                        class="{{ request()->routeIs("role", "create.role", "edit.role") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                    </span>
                                    <a href="{{ route("role") }}" @click="open = true"
                                        class="{{ request()->routeIs("role", "create.role", "edit.role") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                        Roles
                                    </a>
                                </li>
                            @endcanany
                            <!-- Permission -->
                            @canany(["view permission", "create permission", "edit permission", "delete permission"])
                                <li
                                    class="{{ request()->routeIs("permission") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                    <span
                                        class="{{ request()->routeIs("permission") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                    </span>
                                    <a href="{{ route("permission") }}" @click="open = true"
                                        class="{{ request()->routeIs("permission") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                        Permissions
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </div>
                </div>
            @endcanany

            <!-- Player -->
            @canany(["view player", "create player", "edit player", "delete player"])
                <div>
                    <a href="{{ route("player") }}"
                        class="{{ request()->routeIs("player", "create.player", "edit.player") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0">
                                </path>
                            </svg>
                        </span>
                        <span>Player</span>
                    </a>
                </div>
            @endcanany

            <!-- Team -->
            @canany(["view team", "create team", "edit team", "delete team"])
                <div>
                    <a href="{{ route("team") }}"
                        class="{{ request()->routeIs("team", "create.team", "edit.team") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 7h10v10h-10z" />
                                <path d="M6 10h4" />
                                <path d="M8 10v4" />
                                <path d="M8.104 17c.47 2.274 2.483 4 4.896 4a5 5 0 0 0 5 -5v-7h-5" />
                                <path d="M18 18a4 4 0 0 0 4 -4v-5h-4" />
                                <path d="M13.003 8.83a3 3 0 1 0 -1.833 -1.833" />
                                <path d="M15.83 8.36a2.5 2.5 0 1 0 .594 -4.117" />
                            </svg>
                        </span>
                        <span>Team</span>
                    </a>
                </div>
            @endcanany

            <!-- Tournament -->
            @canany(["view tournament", "create tournament", "edit tournament", "delete tournament"])
                <div>
                    <a href="{{ route("tournament") }}"
                        class="{{ request()->routeIs("tournament", "create.tournament", "edit.tournament") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M15 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M6 15v-1a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v1" />
                                <path d="M12 9l0 3" />
                            </svg>
                        </span>
                        <span>Tournament</span>
                    </a>
                </div>
            @endcanany

            <!-- Match -->
            @canany(["view match", "create match", "edit match", "delete match"])
                <div>
                    <a href="{{ route("match") }}"
                        class="{{ request()->routeIs("match", "create.match", "edit.match") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M2 12c0 5.523 4.477 10 10 10s10 -4.477 10 -10s-4.477 -10 -10 -10s-10 4.477 -10 10" />
                                <path
                                    d="M14 14.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75" />
                                <path d="M7 9l2 6l2 -6" />
                            </svg>
                        </span>
                        <span>Match</span>
                    </a>
                </div>
            @endcanany

            <!-- Squad -->
            @canany(["view squad", "create squad", "edit squad", "delete squad"])
                <div>
                    <a href="{{ route("squad") }}"
                        class="{{ request()->routeIs("squad", "create.squad", "edit.squad") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                            </svg>
                        </span>
                        <span>Squad</span>
                    </a>
                </div>
            @endcanany

            <!-- Score -->
            @canany(["view score", "create score", "edit score", "delete score"])
                <div>
                    <a href="{{ route("score") }}"
                        class="{{ request()->routeIs("score", "create.score", "edit.score", "match.result") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 5m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                <path d="M12 5v2" />
                                <path d="M12 10v1" />
                                <path d="M12 14v1" />
                                <path d="M12 18v1" />
                                <path d="M7 3v2" />
                                <path d="M17 3v2" />
                                <path d="M15 10.5v3a1.5 1.5 0 0 0 3 0v-3a1.5 1.5 0 0 0 -3 0z" />
                                <path d="M6 9h1.5a1.5 1.5 0 0 1 0 3h-.5h.5a1.5 1.5 0 0 1 0 3h-1.5" />
                            </svg>
                        </span>
                        <span>Scoreboard</span>
                    </a>
                </div>
            @endcanany

            <!-- Be A Player -->
            @canany(["view register player", "delete register player"])
                <div>
                    <a href="{{ route("register-player") }}"
                        class="{{ request()->routeIs("register-player", "view.register-player") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M11.105 18.79l-1 .992a4.159 4.159 0 0 1 -6.038 -5.715l.157 -.166l8.282 -8.401l1.5 1.5l3.45 -3.391a2.08 2.08 0 0 1 3.057 2.815l-.116 .126l-3.391 3.45l1.5 1.5l-3.668 3.617" />
                                <path d="M10.5 7.5l6 6" />
                                <path d="M14 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            </svg>
                        </span>
                        <span>Be A Player</span>
                    </a>
                </div>
            @endcanany

            <!-- News -->
            @canany(["view news", "create news", "edit news", "delete news"])
                <div>
                    <a href="{{ route("news") }}"
                        class="{{ request()->routeIs("news", "create.news", "edit.news") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" />
                                <path d="M8 8l4 0" />
                                <path d="M8 12l4 0" />
                                <path d="M8 16l4 0" />
                            </svg>
                        </span>
                        <span>News</span>
                    </a>
                </div>
            @endcanany

            <!-- Gallery -->
            @canany(["view gallery", "create gallery", "edit gallery", "delete gallery"])
                <div x-data="{ open: {{ request()->routeIs("gallery", "create.gallery", "edit.gallery", "video") ? "true" : "false" }} }">
                    <a href="#" @click.prevent="open = !open"
                        class="flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-600"
                        :class="open ||
                            {{ request()->routeIs("gallery", "create.gallery", "edit.gallery", "video") ? true : false }} ?
                            'bg-blue-50 text-blue-600 dark:bg-[#233A57] dark:text-blue-600' :
                            'text-gray-400 hover:text-blue-600'">
                        <span aria-hidden="true">
                            <svg class="mr-1 h-5 w-5 transition-colors"
                                :class="open ||
                                    {{ request()->routeIs("gallery", "create.gallery", "edit.gallery", "video") ? true : false }} ?
                                    'text-blue-600' : 'text-gray-400 dark:text-gray-100'"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                <path
                                    d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
                                <path d="M17 7h.01" />
                                <path d="M7 13l3.644 -3.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644" />
                                <path d="M15 12l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l2.644 2.644" />
                            </svg>
                        </span>
                        <span class="ml-2"
                            :class="open ||
                                {{ request()->routeIs("gallery", "create.gallery", "edit.gallery", "video") ? true : false }} ?
                                'text-blue-600' :
                                'text-gray-400 hover:text-blue-500 dark:text-gray-100'">
                            Gallery
                        </span>
                        <span aria-hidden="true" class="ml-auto">
                            <svg class="h-3.5 w-3.5 transform transition-transform"
                                :class="(open ||
                                    {{ request()->routeIs("gallery", "create.gallery", "edit.gallery", "video") ? true : false }}
                                ) ?
                                'text-blue-600 rotate-180' : 'text-gray-400 dark:text-gray-100'"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>

                    </a>
                    <div x-show="open" class="mt-2 space-y-2" role="menu" aria-label="Components"
                        style="display: none">
                        <ul class="ml-2">
                            <!-- Photo -->
                            @canany(["view gallery", "create gallery", "edit gallery", "delete gallery"])
                                <li
                                    class="{{ request()->routeIs("gallery", "create.gallery", "edit.gallery") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                    <span
                                        class="{{ request()->routeIs("gallery", "create.gallery", "edit.gallery") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                    </span>
                                    <a href="{{ route("gallery") }}" @click="open = true"
                                        class="{{ request()->routeIs("gallery", "create.gallery", "edit.gallery") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                        Photo
                                    </a>
                                </li>
                            @endcanany

                            <!-- Video -->
                            @canany(["view video", "create video", "edit video", "delete video"])
                                <li
                                    class="{{ request()->routeIs("video") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                    <span
                                        class="{{ request()->routeIs("video") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                    </span>
                                    <a href="{{ route("video") }}" @click="open = true"
                                        class="{{ request()->routeIs("video") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                        Video
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </div>
                </div>
            @endcanany

            <!-- Faq -->
            @canany(["view faq", "create faq", "edit faq", "delete faq"])
                <div>
                    <a href="{{ route("faq") }}"
                        class="{{ request()->routeIs("faq", "create.faq", "edit.faq") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12.802 2.165l5.575 2.389c.48 .206 .863 .589 1.07 1.07l2.388 5.574c.22 .512 .22 1.092 0 1.604l-2.389 5.575c-.206 .48 -.589 .863 -1.07 1.07l-5.574 2.388c-.512 .22 -1.092 .22 -1.604 0l-5.575 -2.389a2.036 2.036 0 0 1 -1.07 -1.07l-2.388 -5.574a2.036 2.036 0 0 1 0 -1.604l2.389 -5.575c.206 -.48 .589 -.863 1.07 -1.07l5.574 -2.388a2.036 2.036 0 0 1 1.604 0z" />
                                <path d="M12 16v.01" />
                                <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" />
                            </svg>
                        </span>
                        <span>Faq</span>
                    </a>
                </div>
            @endcanany

            <!-- Sponsors -->
            @canany(["view sponsor", "create sponsor", "edit sponsor", "delete sponsor"])
                <div>
                    <a href="{{ route("sponsor") }}"
                        class="{{ request()->routeIs("sponsor", "create.sponsor", "edit.sponsor") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                <path
                                    d="M12 6l-3.293 3.293a1 1 0 0 0 0 1.414l.543 .543c.69 .69 1.81 .69 2.5 0l1 -1a3.182 3.182 0 0 1 4.5 0l2.25 2.25" />
                                <path d="M12.5 15.5l2 2" />
                                <path d="M15 13l2 2" />
                            </svg>
                        </span>
                        <span>Sponsors</span>
                    </a>
                </div>
            @endcanany

            <!-- Contact Us -->
            @canany(["view contact", "delete contact"])
                <div>
                    <a href="{{ route("contact") }}"
                        class="{{ request()->routeIs("contact", "view.contact") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
                                <path d="M10 16h6" />
                                <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M4 8h3" />
                                <path d="M4 12h3" />
                                <path d="M4 16h3" />
                            </svg>
                        </span>
                        <span>Contact Us</span>
                    </a>
                </div>
            @endcanany

            <!-- About -->
            @canany(["view about", "create about", "edit about"])
                <div>
                    <a href="{{ route("about") }}"
                        class="{{ request()->routeIs("about", "create.about", "edit.about") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }} flex items-center space-x-3 rounded-md p-2 text-sm dark:hover:text-blue-600">
                        <span aria-hidden="true">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M12 9v4" />
                                <path d="M12 16v.01" />
                            </svg>
                        </span>
                        <span>About</span>
                    </a>
                </div>
            @endcanany

            <!-- Settings -->
            @canany([
                "view slider",
                "create slider",
                "edit slider",
                "delete slider",
                "view settings",
                "create settings",
                "edit settings",
                "delete settings",
                "view role icon",
                "create role icon",
                "edit role icon",
                "delete role
                icon"
                ])
                <div x-data="{ open: {{ request()->routeIs("slider", "create.slider", "edit.slider", "role.icon") ? "true" : "false" }} }">
                    <a href="#" @click.prevent="open = !open"
                        class="flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-600 dark:text-gray-100 dark:hover:text-blue-600"
                        :class="open ||
                            {{ request()->routeIs("slider", "create.slider", "edit.slider", "role.icon") ? true : false }} ?
                            'bg-blue-50 text-blue-600 dark:bg-[#233A57] dark:text-blue-600' :
                            'text-gray-400 hover:text-blue-600'">
                        <span aria-hidden="true">
                            <svg class="mr-1 h-5 w-5 transition-colors"
                                :class="open ||
                                    {{ request()->routeIs("slider", "create.slider", "edit.slider", "role.icon") ? true : false }} ?
                                    'text-blue-600' : 'text-gray-400 dark:text-gray-100'"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </span>
                        <span class="ml-2"
                            :class="open ||
                                {{ request()->routeIs("slider", "create.slider", "edit.slider", "role.icon") ? true : false }} ?
                                'text-blue-600' :
                                'text-gray-400 hover:text-blue-500 dark:text-gray-100'">
                            Settings
                        </span>
                        <span aria-hidden="true" class="ml-auto">
                            <svg class="h-3.5 w-3.5 transform transition-transform"
                                :class="(open ||
                                    {{ request()->routeIs("slider", "create.slider", "edit.slider", "role.icon") ? true : false }}
                                ) ?
                                'text-blue-600 rotate-180' : 'text-gray-400 dark:text-gray-100'"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>

                    </a>
                    <div x-show="open" class="mt-2 space-y-2" role="menu" aria-label="Components"
                        style="display: none">
                        <ul class="ml-2">
                            <!-- Role Icon -->
                            @canany(["view role icon", "create role icon", "edit role icon", "delete role icon"])
                                <li
                                    class="{{ request()->routeIs("role.icon") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                    <span
                                        class="{{ request()->routeIs("role.icon") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                    </span>
                                    <a wire:navigate href="{{ route("role.icon") }}" @click="open = true"
                                        class="{{ request()->routeIs("role.icon") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                        Role Icon
                                    </a>
                                </li>
                            @endcanany

                            <!-- Slider -->
                            @canany(["view slider", "create slider", "edit slider", "delete slider"])
                                <li
                                    class="{{ request()->routeIs("slider", "create.slider", "edit.slider") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                    <span
                                        class="{{ request()->routeIs("slider", "create.slider", "edit.slider") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                    </span>
                                    <a wire:navigate href="{{ route("slider") }}" @click="open = true"
                                        class="{{ request()->routeIs("slider", "create.slider", "edit.slider") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                        Slider
                                    </a>
                                </li>
                            @endcanany

                            <!-- Site Settings -->
                            @canany(["view settings", "create settings", "edit settings", "delete settings"])
                                <li
                                    class="{{ request()->routeIs("settings", "create.settings", "edit.settings") ? "text-blue-600 dark:text-blue-600" : "text-gray-400 dark:text-gray-100" }} group flex items-center rounded-md p-2 text-sm text-gray-400 hover:text-blue-500">
                                    <span
                                        class="{{ request()->routeIs("settings", "create.settings", "edit.settings") ? "text-blue-500" : "text-gray-400 group-hover:text-blue-500" }} mr-2 list-item list-inside list-disc text-sm">
                                    </span>
                                    <a wire:navigate href="{{ route("settings") }}" @click="open = true"
                                        class="{{ request()->routeIs("settings", "create.settings", "edit.settings") ? "text-blue-600" : "group-hover:text-blue-500" }} flex-grow">
                                        Site Settings
                                    </a>
                                </li>
                            @endcanany
                        </ul>
                    </div>
                </div>
            @endcanany
            {{-- @canany(["view settings", "create settings", "edit settings", "delete settings"])
                <div>
                    <a wire:navigate href="{{ route("settings") }}"
                        class="flex items-center space-x-3 p-2 text-sm rounded-md dark:hover:text-blue-600
                                    {{ request()->routeIs("settings", "create.settings", "edit.settings") ? "bg-blue-50 dark:bg-[#233A57] text-blue-600 dark:text-blue-600" : "text-gray-400 hover:text-blue-600 dark:text-gray-100" }}">
                        <span aria-hidden="true">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </span>
                        <span> Settings </span>
                    </a>
                </div>
            @endcanany --}}
        </ul>
    </nav>
</aside>
