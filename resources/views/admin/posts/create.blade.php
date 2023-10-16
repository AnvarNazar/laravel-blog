<x-admin-layout>
    <x-slot:title>Create Post</x-slot:title>
    <x-slot:scripts>
        @vite('resources/js/editor.js')
    </x-slot:scripts>
    <form id="post-edit-form" x-data="{}" method="POST" @submit="save">
        <div>
            <label for="title">Title</label>
            <input id="title" type="text" name="title" placeholder="Post title" x-model="$store.post.title"/>
        </div>
        <div>
            <label for="slug">Slug</label>
            <input id="slug" type="text" name="slug" placeholder="post-slug" x-model="$store.post.slug">
        </div>
        <label for="editorjs">Content</label>
        <div id="editorjs"></div>
        <div>
            <label for="published">Published</label>
            <input id="published" type="checkbox" name="published" x-model="$store.post.is_published">
        </div>
        <input type="submit" name="save" value="save">
    </form>
</x-admin-layout>
