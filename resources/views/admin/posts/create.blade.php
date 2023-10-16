<x-admin-layout>
    <x-slot:title>Create Post</x-slot:title>
    <x-slot:scripts>
        @vite('resources/js/editor.js')
    </x-slot:scripts>
    <form id="post-edit-form" x-data="{ postId: null }">
        @csrf
        <div>
            <label for="title">Title</label>
            <input id="title" type="text" name="title" placeholder="Post title"/>
        </div>
        <div>
            <label for="slug">Slug</label>
            <input id="slug" type="text" name="slug" placeholder="post-slug">
        </div>
        <label for="editorjs">Content</label>
        <div id="editorjs"></div>
        <div>
            <label for="published">Published</label>
            <input id="published" type="checkbox" name="published">
        </div>
        <input type="button" name="save" value="save">
    </form>
</x-admin-layout>
