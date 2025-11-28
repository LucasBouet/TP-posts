<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie — Posts</title>
    <link href="/assets/styles/home.css" rel="stylesheet">
    </head>
    <body class="bg-blue-50 text-slate-900">
    <header class="max-w-6xl mx-auto p-4">
    <nav class="flex items-center justify-between">
        <a href="/" class="flex items-center gap-3">
        <div class="cursor-pointer w-12 h-12 rounded-xl bg-linear-to-br from-blue-500 to-blue-700 shadow-lg flex items-center justify-center text-white font-bold text-lg">G</div>
            <div>
                <h1 class="text-lg font-semibold">Galerie</h1>
                <p class="text-xs text-slate-500">Feed d'images</p>
            </div>
        </a>
        <div class="flex items-center gap-3">
            <button id="admin" class="cursor-pointer border border-blue-300 text-blue-700 px-4 py-2 rounded-lg">Admin</button>
            <button id="publier" class="cursor-pointer bg-linear-to-r from-blue-500 to-blue-400 text-white px-4 py-2 rounded-lg shadow-md">Ajouter un post</button>
        </div>
    </nav>


    <div class="mt-6 grid md:grid-cols-2 bg-blue-100/40 rounded-xl p-6 shadow-md gap-6">
        <div>
            <h2 class="text-2xl font-bold">Découvre les meilleurs posts de l'univers</h2>
            <p class="text-slate-600 mt-2">Grace a notre super site vous etes desormais capable d'upload vos meilleurs images afin de les partager au monde entier et ce, de facon super secure !</p>
            <div class="flex gap-3 mt-4">
                <button id="publier2" class="cursor-pointer bg-linear-to-r from-blue-500 to-blue-400 text-white px-4 py-2 rounded-lg shadow">Nouveau post</button>
                <button id="admin2" class="cursor-pointer border border-blue-300 text-blue-700 px-4 py-2 rounded-lg">Admin</button>
            </div>
        </div>


        <div class="relative h-48 bg-linear-to-b from-blue-100 to-blue-200 rounded-xl overflow-hidden flex items-center justify-center">
            <svg class="absolute inset-0 w-full h-full" viewBox="0 0 600 220" preserveAspectRatio="none">
                <path d="M0,120 C120,200 240,40 360,100 C480,160 600,60 600,60 L600,220 L0,220 Z" fill="rgba(38,128,255,0.15)" />
                <path d="M0,140 C100,200 220,70 340,120 C460,170 600,80 600,80 L600,220 L0,220 Z" fill="rgba(38,128,255,0.08)" />
            </svg>
        </div>
    </div>
    </header>